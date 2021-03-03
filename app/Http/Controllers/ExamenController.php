<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{
    //

    public function index($id) {
        if ($this->checkCompleteTest($id)) {
            return redirect('/home');
        }

        $preg = DB::table('preguntas')
                    ->join('examenes_preguntas', 'preguntas.id', '=', 'examenes_preguntas.id_pregunta')
                    ->select('preguntas.*', 'examenes_preguntas.puntos', 'examenes_preguntas.id AS id_a', 'examenes_preguntas.subordinada')
                    ->where('examenes_preguntas.id_examen', $id)
                    ->where('examenes_preguntas.id_preg_padre', null)
                    ->get();

        foreach ($preg->all() as $pregunta) {
            $pregunta->respuestas = $this->getAnswers($pregunta->id_a);

            if ($pregunta->subordinada == 1) {
                $pregunta->preguntas_sub = $this->getPreguntasSubordinadas($pregunta->id);
            }
        }

        return view('examen', ['preguntas' => $preg, 'id_ex' => $id]);
    }

    private function getPreguntasSubordinadas($id_pregunta) {
        $preg = DB::table('preguntas')
                    ->join('examenes_preguntas', 'preguntas.id', '=', 'examenes_preguntas.id_pregunta')
                    ->select('preguntas.*', 'examenes_preguntas.puntos', 'examenes_preguntas.id AS id_a', 'examenes_preguntas.subordinada')
                    ->where('examenes_preguntas.id_preg_padre', $id_pregunta)
                    ->get();

        foreach ($preg->all() as $pregunta) {
            $pregunta->respuestas = $this->getAnswers($pregunta->id_a);
        }

        return $preg;
    }

    private function getAnswers($id_ep) {
        $datos = DB::table('respuestas')
                    ->join('respuestas_examenes', 'respuestas.id', '=', 'respuestas_examenes.id_respuesta')
                    ->join('examenes_preguntas', 'respuestas_examenes.id_ep', '=', 'examenes_preguntas.id')
                    ->select('respuestas.nombre as name', 'respuestas_examenes.id')
                    ->where('respuestas_examenes.id_ep', $id_ep)
                    ->get();

        return $datos;
    }

    public function create($id_examen, Request $request) {

        foreach($request->all() AS $index => $field) {
            if($index != '_token') {
                DB::insert('INSERT INTO resultados_alumnos (id_res_ex, id_usuario) VALUES (?, ?)', [$field  , auth()->user()->id]);
            }
        }

        DB::insert('INSERT INTO examenes_completados (id_examen, id_alumno) VALUES (?, ?)', [$id_examen, auth()->user()->id]);

        return redirect('/home');
    }

    private function checkCompleteTest($id_examen) {
        $data = DB::table('examenes_completados')
                    ->where('id_examen', $id_examen)
                    ->where('id_alumno', auth()->user()->id)
                    ->first();

        if ($data) {
            return true;
        }

        return false;
    }

    public function completeTest($id_examen) {
        $preg = DB::table('preguntas')
                    ->join('examenes_preguntas', 'preguntas.id', '=', 'examenes_preguntas.id_pregunta')
                    ->select('preguntas.*', 'examenes_preguntas.puntos', 'examenes_preguntas.id AS id_a')
                    ->where('examenes_preguntas.id_examen', $id_examen)
                    ->get();

        foreach ($preg->all() as $pregunta) {
            $pregunta->respuesta_correcta = $this->getCorrectAnswers($pregunta->id_a);
            $pregunta->respuesta_seleccionada = $this->getSetAnswers($pregunta->id_a);
        }

        return view('examenCompletado', ['preguntas' => $preg, 'nota' => number_format($this->calcNota($id_examen),2), 'examen' => $this->examen($id_examen)]);
    }

    private function getCorrectAnswers($id_ep) {
        $res = DB::table('respuestas')
                    ->join('respuestas_examenes','respuestas.id','=','respuestas_examenes.id_respuesta')
                    ->select('respuestas.nombre')
                    ->where('respuestas_examenes.correcta', 1)
                    ->where('respuestas_examenes.id_ep', $id_ep)
                    ->get();

        return $res;
    }

    private function getSetAnswers($id_ep) {
        $res = DB::table('respuestas')
            ->join('respuestas_examenes','respuestas.id','=','respuestas_examenes.id_respuesta')
            ->join('resultados_alumnos', 'respuestas_examenes.id', '=', 'resultados_alumnos.id_res_ex')
            ->select('respuestas.nombre', 'respuestas_examenes.correcta')
            ->where('respuestas_examenes.id_ep', $id_ep)
            ->where('resultados_alumnos.id_usuario', auth()->user()->id)
            ->get();

        $res = count($res) == 0 ? [(object)['nombre' => 'No se ha seleccionado respuesta', 'correcta' => null]] : $res ;

        return $res;
    }

    private function calcNota($id_examen) {
        $total = DB::table('examenes_preguntas')
                    ->join('respuestas_examenes', 'examenes_preguntas.id', '=', 'respuestas_examenes.id_ep')
                    ->where('respuestas_examenes.correcta', 1)
                    ->sum('examenes_preguntas.puntos');

        $seleccionado = DB::table('examenes_preguntas')
                    ->join('respuestas_examenes', 'examenes_preguntas.id', '=', 'respuestas_examenes.id_ep')
                    ->join('resultados_alumnos', 'resultados_alumnos.id_res_ex', '=', 'respuestas_examenes.id')
                    ->where('resultados_alumnos.id_usuario', auth()->user()->id)
                    ->where('respuestas_examenes.correcta', 1)
                    ->sum('examenes_preguntas.puntos');

        $calculo = ($seleccionado * 10) / $total;

        return $calculo;
    }

    private function examen($id_examen) {
        $examen = DB::table('examenes')
                    ->select('examenes.nombre', 'examenes.asignatura')
                    ->where('examenes.id', $id_examen)
                    ->first();

        return $examen;
    }
}
