@extends('layouts.adminecole')


@section('content')

<div class="container text-center mt-4">
    <h1>PARAMETRAGE</h1>
    <div class="row d-flex justify-content-center p-4">
        <a href="{{ route('adminecole.salles.index') }}" class="col-md-3 m-2">
            <i class="fa fa-door-open"></i>
            <p>Salles</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>Séries</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>Niveaux</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>...</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-archive"></i>
            <p>Matières</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-building"></i>
            <p>Ecoles</p>
        </a>
        <a href="#" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>Cours</p>
        </a>
        <a href="/deconnexion" class="col-md-3 m-2">
            <i class="fa fa-power-off"></i>
            <p>Déconnexion</p>
        </a>
    </div>
</div>
@endsection
