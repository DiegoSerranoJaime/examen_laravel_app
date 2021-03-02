@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/profesor/curso/{{ $curso }}" class="btn btn-primary mb-4">Volver</a>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row px-3">
                    <div class="col">
                        <h4>
                            Nombre: {{ $alumno->name }}
                        </h4>
                    </div>
                    <div class="col">
                        <h4>
                            Email: {{ $alumno->email }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row px-3">
                    <h4>
                        Examenes completados
                    </h4>
                </div>
                <div class="row">
                    @foreach($examenes as $examen)
                        <div class="col-12">
                            <p><a href="{{ route('alumno.examen', ['id_curso' => $curso, 'id_alumno' => $alumno->id, 'id_examen' => $examen->id]) }}">{{$examen->asignatura}} > {{ $examen->nombre }}</a></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
