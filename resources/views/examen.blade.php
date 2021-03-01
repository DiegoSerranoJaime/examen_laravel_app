@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/examen/{{ $id_ex }}">
        @csrf

        @foreach($preguntas as $key => $pregunta)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-9">
                            <label class="form-check-label">{{$pregunta->nombre}}</label>
                        </div>
                        <div class="col-auto">
                            <p>{{ $pregunta->puntos }} puntos</p>
                        </div>
                    </div>

                    @foreach($pregunta->respuestas as $respuesta)
                        <div class="form-check ml-4">
                            <label class="form-check-label">
                                <input type="radio" name="answer{{ $key }}" value="{{ $respuesta->id }}" class="form-check-input">
                                {{ $respuesta->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Enviar formulario</button>
    </form>
</div>
@endsection
