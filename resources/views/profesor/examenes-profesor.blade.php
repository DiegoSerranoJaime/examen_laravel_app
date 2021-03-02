@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/profesor" class="btn btn-primary mb-4">Volver</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Examen</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Curso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($examenes as $key => $examen)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><a href="/profesor/examen/{{ $examen->id }}">{{ $examen->nombre }}</a></td>
                        <td>{{ $examen->asignatura }}</td>
                        <td>{{ $examen->nombre_curso }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
