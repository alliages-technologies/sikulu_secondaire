@extends('layouts.prof')


@section('title')
{{auth()->user()->name}} | Acceuil
@endsection

@section('content')

<div class="container menu mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h2><i class="fa fa-th"></i> ACCEUIL</h2>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center p-4">
                @foreach ($ecoles as $ecole)
                    <a href="/profs/ecoles/{{ $ecole->ecole->token }}" class="col-md-3 m-2">
                        <i class="fa fa-building"></i>
                        <p>{{ $ecole->ecole->name }}</p>
                    </a>
                @endforeach
                <a href="/deconnexion" class="col-md-3 m-2">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
