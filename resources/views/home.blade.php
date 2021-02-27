@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card mt-4 float-left" style=" width:49%; ">
                <div class="card-header">
                   <span>Examenes pendientes</span>
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($examenesNoComp as $examen)
                            <p><a href="">{{ $examen->nombre }}</a></p>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="card mt-4 float-right"  style=" width:49%;">
                <div class="card-header">
                   <span>Examenes completados</span>
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($examenesComp as $examen)
                            <p><a href="">{{ $examen->nombre }}</a></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
