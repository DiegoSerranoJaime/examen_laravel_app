@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('alumno', ['id_curso' => $curso, 'id_alumno' => $alumno]) }}" class="btn btn-primary mb-4">Volver</a>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row d-flex justify-content-between px-3">
                    <h4>
                        {{ $examen->nombre }}
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
                    @if($pregunta->subordinada == 1)
                    <h6>{{$pregunta->nombre}}</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                @foreach($pregunta->respuestas as $nombre_respuestas)
                                    <th scope="col">{{ $nombre_respuestas->name }}</th>
                                @endforeach
                                <th scope="col">Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pregunta->preguntas_sub as $key2 => $pregunta_sub)
                            <tr>
                                <th scope="row">{{ $pregunta_sub->nombre }}</th>
                                @foreach($pregunta_sub->respuestas as $respuesta)

                                    @if($respuesta->correcta == 1)
                                        <td class="text-center bg-success">
                                    @elseif($pregunta_sub->respuesta_seleccionada == $respuesta->id)
                                        <td class="text-center bg-danger">
                                    @else
                                        <td class="text-center">
                                    @endif
                                        @if($pregunta_sub->respuesta_seleccionada == $respuesta->id)
                                            <input disabled="disabled" type="radio" class="form-check-input" checked>
                                        @else
                                            <input disabled="disabled" type="radio" class="form-check-input">
                                        @endif
                                    </td>
                                @endforeach
                                <td>{{ $pregunta_sub->puntos }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
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
                            @if($respuesta->correcta == 1)
                                <label class="form-check-label bg-success">
                            @elseif($pregunta->respuesta_seleccionada == $respuesta->id)
                                <label class="form-check-label bg-danger">
                            @else
                                <label class="form-check-label">
                            @endif
                                @if($pregunta->respuesta_seleccionada == $respuesta->id)
                                    <input type="radio" disabled class="form-check-input" checked>
                                @else
                                    <input type="radio" disabled class="form-check-input">
                                @endif
                                {{ $respuesta->name }}
                            </label>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@endsection
