<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamenController extends Controller
{
    //

    public function index($id) {
        $preg = DB::table('preguntas')
                    ->join('examenes_preguntas', 'preguntas.id', '=', 'examenes_preguntas.id_pregunta')
                    ->select('preguntas.*', 'examenes_preguntas.puntos', 'examenes_preguntas.id AS id_a')
                    ->where('examenes_preguntas.id_examen', $id)
                    ->get();

        // $res = DB::table('respuestas')
        //             ->join('respuestas_examenes', 'respuestas.id', '=', 'respuestas_examenes.id_respuesta')
        //             ->join('examenes_preguntas', 'respuestas_examenes.id_ep', '=', 'examenes_preguntas.id')
        //             ->select('respuestas.nombre', 'respuestas_examenes.id', 'respuestas_examenes.id_ep')
        //             ->where('examenes_preguntas.id_examen', $id)
        //             ->get();

        return view('examen', ['preguntas' => $preg, 'id_ex' => $id]);
    }

    public static function getAnswers($id_examen, $id_pregunta) {
        $datos = DB::table('respuestas')
                    ->join('respuestas_examenes', 'respuestas.id', '=', 'respuestas_examenes.id_respuesta')
                    ->join('examenes_preguntas', 'respuestas_examenes.id_ep', '=', 'examenes_preguntas.id')
                    ->select('respuestas.nombre as nam', 'respuestas_examenes.id')
                    ->where('examenes_preguntas.id_examen', $id_examen)
                    ->where('examenes_preguntas.id_pregunta', $id_pregunta)
                    ->get();

        return $datos;
    }
}
