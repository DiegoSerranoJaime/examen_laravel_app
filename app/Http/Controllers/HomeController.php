<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['examenesNoComp' => $this->noCompletados(), 'examenesComp' => $this->completados()]);
    }

    private function noCompletados(){

        //EXAMENES NO COMPLETADOS
        $idUsuario = auth()->user()->id;
        $examenesNoComp = DB::select('SELECT * FROM examenes WHERE id NOT IN (SELECT id_examen FROM examenes_completados WHERE id_alumno = ?)',[$idUsuario]);

        return $examenesNoComp;
    }

    private function completados(){

        //EXAMENES COMPLETADOS
        $idUsuario = auth()->user()->id;
        $examenesComp = DB::select('SELECT examenes.* FROM examenes INNER JOIN examenes_completados ON examenes.id = examenes_completados.id_examen
        WHERE examenes_completados.id_alumno = ?',[$idUsuario]);

        return $examenesComp;
    }
}
