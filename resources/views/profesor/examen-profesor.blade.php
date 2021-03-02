@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/profesor/examenes" class="btn btn-primary mb-4">Volver</a>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row px-3">
                    <h4>
                        {{$examen->nombre}}
                    </h4>
                </div>
                <div class="row">
                    <div class="col">
                        {{$examen->asignatura}}
                    </div>
                </div>
            </div>
        </div>
        @foreach($preguntas as $key => $pregunta)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <div class="col-9">
                            <h5>{{$pregunta->nombre}}</h5>
                        </div>
                        <div class="col-auto">
                            <p>{{ $pregunta->puntos }} puntos</p>
                        </div>
                    </div>

                    @foreach($pregunta->respuestas as $respuesta)
                        <div class="ml-2">

                            @if($respuesta->correcta == 1)

                            <div class="alert alert-success" role="alert">

                            @else

                            <div class="pl-4">

                            @endif
                                {{ $respuesta->name }}
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
