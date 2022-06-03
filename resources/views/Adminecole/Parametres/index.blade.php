@extends('layouts.adminecole')


@section('title')
Admin Ecole | Paramétrage
@endsection

@section('content')

<div class="container text-center mt-4 menu">
    <div class="card">
        <div class="card-header">
            <h1>PARAMETRES</h1>
        </div>
        <div class="card-body row d-flex justify-content-center p-4">
            <a href="{{ route('adminecole.utilisateurs.index') }}" class="col-md-3 m-2">
                <i class="fa fa-users"></i>
                <p>Utilisateurs</p>
            </a>
            <a href="{{ route('adminecole.salles.index') }}" class="col-md-3 m-2">
                <i class="fa fa-door-open"></i>
                <p>Salles</p>
            </a>
            <a href="{{ route('adminecole.tranches.index') }}" class="col-md-3 m-2">
                <i class="fa fa-clock"></i>
                <p>Tranches Horaires</p>
            </a>
            <a href="{{ route('adminecole.matieres.index') }}" class="col-md-3 m-2">
                <i class="fa fa-archive"></i>
                <p>Matières</p>
            </a>
            <a href="{{ route('adminecole.trimestre.index') }}" class="col-md-3 m-2">
                <i class="fa fa-file"></i>
                <p>Trimestres</p>
            </a>
            <a href="#" class="col-md-3 m-2">
                <i class="fa fa-file-text"></i>
                <p>Cours</p>
            </a>
        </div>
    </div>
</div>

@endsection
