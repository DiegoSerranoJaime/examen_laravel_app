@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/profesor/cursos" class="btn btn-primary mb-4">Volver</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $key => $alumno)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="{{ route('alumno', ['id_curso' => $curso, 'id_alumno' => $alumno->id]) }}">{{ $alumno->name }}</a></td>
                    <td>{{ $alumno->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
