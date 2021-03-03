@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/examen/{{ $id_ex }}">
        @csrf

        @foreach($preguntas as $key => $pregunta)
            <div class="card mb-4">
                <div class="card-body">
                    @if($pregunta->subordinada == 1)
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
                                    <td class="text-center"><input type="radio" name="answer{{ $key }}-{{ $key2 }}" value="{{ $respuesta->id }}" class="form-check-input"></td>
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
                            <label class="form-check-label">
                                <input type="radio" name="answer{{ $key }}" value="{{ $respuesta->id }}" class="form-check-input">
                                {{ $respuesta->name }}
                            </label>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Enviar formulario</button>
    </form>
</div>
@endsection
