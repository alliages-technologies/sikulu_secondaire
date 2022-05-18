@extends('layouts.adminecole')


@section('title')
Admin Ecole | Paramétrage
@endsection

@section('content')

<div class="container text-center mt-4 menu">
    <h1>PARAMETRAGE</h1>
    <div class="row d-flex justify-content-center p-4">
        <a href="" class="col-md-3 m-2">
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
        <a href="{{ route('adminecole.tranches.index') }}" class="col-md-3 m-2">
            <i class="fa fa-clock"></i>
            <p>Tranche Horaire</p>
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
