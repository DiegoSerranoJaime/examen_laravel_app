<?php
    use \App\Http\Controllers\ExamenController;
?>

@extends('layouts.app')

@section('content')
<div class="container">
   @foreach($preguntas as $pregunta)
        <p>{{$pregunta->nombre}}</p>

        @foreach(ExamenController::getAnswers($id_ex, $pregunta->id) as $respuesta)
            <p>{{ $respuesta->nam }}</p>
        @endforeach
   @endforeach
</div>
@endsection
