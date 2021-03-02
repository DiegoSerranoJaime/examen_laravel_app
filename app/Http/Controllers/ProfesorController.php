<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function index() {
        return view('profesor.profesor');
    }


    // Método para obtener todos los examenes
    public function getExamenes() {
        $examenes = DB::table('examenes')
                        ->join('users_cursos', 'examenes.id_profesor_curso', '=', 'users_cursos.id_usuario')
                        ->join('cursos', 'users_cursos.id_curso', '=', 'cursos.id')
                        ->select('examenes.*', 'cursos.nombre AS nombre_curso')
                        ->where('examenes.id_profesor_curso', auth()->user()->id)
                        ->get();


        return view('profesor.examenes-profesor', ['examenes' => $examenes]);
    }

    // Método para obtener el examen
    public function getExamen($id) {
        $preg = DB::table('preguntas')
                    ->join('examenes_preguntas', 'preguntas.id', '=', 'examenes_preguntas.id_pregunta')
                    ->select('preguntas.*', 'examenes_preguntas.puntos', 'examenes_preguntas.id AS id_a')
                    ->where('examenes_preguntas.id_examen', $id)
                    ->get();

        foreach ($preg->all() as $pregunta) {
            $pregunta->respuestas = $this->getAnswers($id, $pregunta->id_a);
        }

        return view('profesor.examen-profesor', ['preguntas' => $preg, 'examen' => $this->examen($id)]);
    }

    private function getAnswers($id_examen, $id_pregunta) {
        $datos = DB::table('respuestas')
                    ->join('respuestas_examenes', 'respuestas.id', '=', 'respuestas_examenes.id_respuesta')
                    ->join('examenes_preguntas', 'respuestas_examenes.id_ep', '=', 'examenes_preguntas.id')
                    ->select('respuestas.nombre as name', 'respuestas_examenes.id', 'respuestas_examenes.correcta')
                    ->where('examenes_preguntas.id_examen', $id_examen)
                    ->where('examenes_preguntas.id_pregunta', $id_pregunta)
                    ->get();

        return $datos;
    }


    // Método para obtener los cursos
    public function getCursos(){
        $cursos = DB::table('users')
                        ->select('cursos.nombre', 'cursos.id')
                        ->join('users_cursos','users_cursos.id_usuario',"=",'users.id')
                        ->join('cursos', 'cursos.id', '=', 'users_cursos.id_curso')
                        ->where('users.id', auth()->user()->id)
                        ->get();

        return view('profesor.cursos-profesor', ['cursos' => $cursos]);
    }


    // Método para obtener todos los alumnos del curso del profesor
    public function getAlumnosCurso($id){
        $alumnosCurso = DB::table('users')
                            ->join('users_cursos', 'users.id', '=', 'users_cursos.id_usuario')
                            ->select('users.id', 'users.name', 'users.email')
                            ->where('users.tipo', 'alumno')
                            ->where('users_cursos.id_curso', $id)
                            ->get();

        return view('profesor.curso', ['alumnos' => $alumnosCurso, 'curso' => $id]);
    }


    // Método para obtener el alumno
    public function getAlumno($id_curso, $id_alumno){
        $alumno = DB::table('users')
                    ->where('id', $id_alumno)
                    ->where('tipo', 'alumno')
                    ->first();

        $examanesCom = DB::select("SELECT examenes.id, examenes.nombre, examenes.asignatura
                                        FROM examenes
                                        WHERE examenes.id IN (SELECT id_examen
                                                                FROM examenes_completados
                                                                WHERE id_alumno = ?)", [$id_alumno]);

        return view('profesor.alumno', ['alumno' => $alumno, 'examenes' => $examanesCom, 'curso' => $id_curso]);
    }


    // Método para obtener el examen del alumno
    public function getExamenAlumno($id_curso, $id_alumno, $id_examen) {
        $preg = DB::table('preguntas')
                    ->join('examenes_preguntas', 'preguntas.id', '=', 'examenes_preguntas.id_pregunta')
                    ->select('preguntas.*', 'examenes_preguntas.puntos', 'examenes_preguntas.id as id_a')
                    ->where('examenes_preguntas.id_examen', $id_examen)
                    ->get();

        foreach ($preg->all() as $pregunta) {
            $pregunta->respuesta_correcta = $this->getCorrectAnswers($pregunta->id_a);
            $pregunta->respuesta_seleccionada = $this->getSetAnswers($pregunta->id_a, $id_alumno);
        }

        return view('profesor.examen-alumno', [
            'preguntas' => $preg,
            'nota' => $this->calcNota($id_examen, $id_alumno),
            'examen' => $this->examen($id_examen),
            'curso' => $id_curso,
            'alumno' => $id_alumno
        ]);
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

    private function getSetAnswers($id_ep, $id_alumno) {
        $res = DB::table('respuestas')
            ->join('respuestas_examenes','respuestas.id','=','respuestas_examenes.id_respuesta')
            ->join('resultados_alumnos', 'respuestas_examenes.id', '=', 'resultados_alumnos.id_res_ex')
            ->select('respuestas.nombre', 'respuestas_examenes.correcta')
            ->where('respuestas_examenes.id_ep', $id_ep)
            ->where('resultados_alumnos.id_usuario', $id_alumno)
            ->get();

        $res = count($res) == 0 ? [(object)['nombre' => 'No se ha seleccionado respuesta', 'correcta' => null]] : $res ;

        return $res;
    }

    private function calcNota($id_examen, $id_alumno) {
        $total = DB::table('examenes_preguntas')
                    ->join('respuestas_examenes', 'examenes_preguntas.id', '=', 'respuestas_examenes.id_ep')
                    ->where('respuestas_examenes.correcta', 1)
                    ->sum('examenes_preguntas.puntos');

        $seleccionado = DB::table('examenes_preguntas')
                    ->join('respuestas_examenes', 'examenes_preguntas.id', '=', 'respuestas_examenes.id_ep')
                    ->join('resultados_alumnos', 'resultados_alumnos.id_res_ex', '=', 'respuestas_examenes.id')
                    ->where('resultados_alumnos.id_usuario', $id_alumno)
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
