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
                                    @else
                                        <td class="text-center">
                                    @endif
                                        <input disabled="disabled" type="radio" class="form-check-input">
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
                            @else
                                <label class="form-check-label">
                            @endif
                                <input type="radio" disabled class="form-check-input">
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
