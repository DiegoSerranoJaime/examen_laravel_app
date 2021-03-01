@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row d-flex justify-content-between px-3">
                <h4>
                    {{$examen->nombre}}
                </h4>
                <h5>
                    @if($nota >= 5.00)
                    <span class="badge badge-success">
                    @else
                    <span class="badge badge-danger">
                    @endif
                        Nota: {{$nota}}
                    </span>
                </h5>

            </div>
            <div class="row d-flex justify-content-between">
                <div class="col">
                    {{$examen->asignatura}}
                </div>
                <div class="col-auto">
                    La nota máxima mostrada es sobre 10
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

                <p class="ml-2">Respuesta/s correcta/s</p>
                @foreach($pregunta->respuesta_correcta as $respuesta)
                    <div class="alert alert-success ml-4" role="alert">
                        {{ $respuesta->nombre }}
                    </div>
                @endforeach

                <p class="ml-2">Respuesta/s Seleccionada/s</p>
                @foreach($pregunta->respuesta_seleccionada as $respuesta)
                    @if($respuesta->correcta == 1)
                        <div class="alert alert-success ml-4" role="alert">
                    @elseif($respuesta->correcta == null)
                        <div class="alert alert-warning ml-4" role="alert">
                    @else
                        <div class="alert alert-danger ml-4" role="alert">
                    @endif
                            {{ $respuesta->nombre }}
                        </div>
                @endforeach

            </div>
        </div>
    @endforeach
</div>
@endsection
