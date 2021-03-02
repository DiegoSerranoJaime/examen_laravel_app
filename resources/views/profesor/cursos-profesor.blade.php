@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/profesor" class="btn btn-primary mb-4">Volver</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Curso</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $key => $curso)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="/profesor/curso/{{ $curso->id }}">{{ $curso->nombre }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
