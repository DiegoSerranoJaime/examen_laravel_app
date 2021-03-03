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

        if (auth()->user()->tipo == 'alumno') {
            return view('home',['examenesNoComp' => $this->noCompletados(), 'examenesComp' => $this->completados()]);
        } elseif (auth()->user()->tipo == 'profesor') {
            return redirect('/profesor');
        }
    }

    private function noCompletados(){

        //EXAMENES NO COMPLETADOS
        $curso = $this->curso();
        $idUsuario = auth()->user()->id;
        $examenesNoComp = DB::select('SELECT * FROM examenes WHERE id NOT IN (SELECT id_examen FROM examenes_completados WHERE id_alumno = ?)
        AND id_profesor_curso IN (SELECT id FROM users_cursos WHERE id_curso = ?)', [$idUsuario, $curso->id_curso]);

        return $examenesNoComp;
    }

    private function curso() {
        $curso = DB::table('users_cursos')
        ->select('users_cursos.id_curso')
        ->where('id_usuario', auth()->user()->id)
        ->first();

        return $curso;
    }

    private function completados(){
        //EXAMENES COMPLETADOS
        $idUsuario = auth()->user()->id;
        $examenesComp = DB::select('SELECT examenes.* FROM examenes INNER JOIN examenes_completados ON examenes.id = examenes_completados.id_examen
        WHERE examenes_completados.id_alumno = ?',[$idUsuario]);

        return $examenesComp;
    }
}
