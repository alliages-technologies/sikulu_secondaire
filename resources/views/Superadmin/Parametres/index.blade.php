@extends('layouts.superadmin')


@section('title')
Superadmin | Paramètres
@endsection

@section('content')

<div class="menu container text-center mt-4">
    <div class="card">
        <div class="card-header">
            <h1>PARAMETRES</h1>
        </div>
        <div class="card-body row d-flex justify-content-center">
            <a href="{{route('superadmin.enseignements.index')}}" class="col-md-3 m-2">
                <i class="fa fa-pencil-square"></i>
                <p>Types d'Enseignements</p>
            </a>
            <a href="{{route('superadmin.series.index')}}" class="col-md-3 m-2">
                <i class="fa fa-folder"></i>
                <p>Séries</p>
            </a>
            <a href="{{route('superadmin.niveaux.index')}}" class="col-md-3 m-2">
                <i class="fa fa-folder"></i>
                <p>Niveaux</p>
            </a>
            <a href="{{route('superadmin.classes.index')}}" class="col-md-3 m-2">
                <i class="fa fa-folder"></i>
                <p>Classes</p>
            </a>
            <a href="{{route('superadmin.matieres.index')}}" class="col-md-3 m-2">
                <i class="fa fa-folder"></i>
                <p>Matières</p>
            </a>
            <a href="{{route('superadmin.ecoles.index')}}" class="col-md-3 m-2">
                <i class="fa fa-building"></i>
                <p>Ecoles</p>
            </a>
            <a href="/home" class="col-md-3 m-2">
                <i class="fa fa-arrow-left"></i>
                <p>Retour</p>
            </a>
        </div>
    </div>
</div>

@endsection
