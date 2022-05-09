@extends('layouts.superadmin')


@section('content')

<div class="menu container text-center mt-4">
    <h1>PARAMETRAGE</h1>
    <div class="row d-flex justify-content-center p-4">
        <a href="{{route('superadmin.enseignements.index')}}" class="col-md-3 m-2">
            <i class="fa fa-book"></i>
            <p>Enseignements</p>
        </a>
        <a href="{{route('superadmin.series.index')}}" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>Séries</p>
        </a>
        <a href="{{route('superadmin.niveaux.index')}}" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>Niveaux</p>
        </a>
        <a href="{{route('superadmin.classes.index')}}" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>Classes</p>
        </a>
        <a href="{{route('superadmin.matieres.index')}}" class="col-md-3 m-2">
            <i class="fa fa-archive"></i>
            <p>Matières</p>
        </a>
        <a href="{{route('superadmin.ecoles.index')}}" class="col-md-3 m-2">
            <i class="fa fa-building"></i>
            <p>Ecoles</p>
        </a>
        <a href="/deconnexion" class="col-md-3 m-2">
            <i class="fa fa-power-off"></i>
            <p>Déconnexion</p>
        </a>
    </div>
</div>

@endsection