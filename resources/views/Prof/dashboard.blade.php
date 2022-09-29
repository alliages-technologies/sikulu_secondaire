@extends('layouts.prof')


@section('title')
{{Auth::user()->name}} | Acceuil
@endsection

@section('content')
<div class="container menu mt-4">
    <div class="card">
        <div class="card-header">
            <h2>ECOLES</h2>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center p-4">
                @foreach ($ecoles as $ecole)
                    <a href="/profs/ecoles/{{ $ecole->ecole->token }}/{{ $ecole->ecole->id }}" class="col-md-3 m-2">
                        <i class="fa fa-building"></i>
                        <p>{{ $ecole->ecole->name }}</p>
                    </a>
                @endforeach

            </div>
            <div class="d-flex justify-content-center p-4">
                <a href="/deconnexion" class="col-md-3 m-2" style="color: red">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
