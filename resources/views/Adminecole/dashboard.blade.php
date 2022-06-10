@extends('layouts.adminecole')


@section('title')
Admin Ecole | Acceuil
@endsection

@section('content')

<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-bar-chart"></i>
            <p>Statistiques</p>
        </a>
        <a href="{{ route('adminecole.programmes-ecole.index') }}" class="col-md-3 m-2">
            <i class="fa fa-building"></i>
            <p>Programme Scolaire</p>
        </a>
        <a href="{{ route('adminecole.inscriptions.index') }}" class="col-md-3 m-2">
            <i class="fa fa-user-plus"></i>
            <p>Inscriptions</p>
        </a>
        <a href="{{ route('adminecole.reinscriptions') }}" class="col-md-3 m-2">
            <i class="fa fa-user-plus"></i>
            <p>Réinscriptions</p>
        </a>
        <a href="{{ route('adminecole.scolarite.menu') }}" class="col-md-3 m-2">
            <i class="fa fa-graduation-cap"></i>
            <p>Scolarité</p>
        </a>
        <a href="{{ route('adminecole.emploie.salle') }}" class="col-md-3 m-2">
            <i class="fa fa-calendar"></i>
            <p>Emploi du temps</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-file"></i>
            <p>Avancements</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-file-text"></i>
            <p>QCM</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-truck"></i>
            <p>Logistique</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-book"></i>
            <p>E-Bibliothèque</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-info"></i>
            <p>Infos</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-list"></i>
            <p>Réglement interieur</p>
        </a>
        <a href="{{ route('adminecole.parametres.index') }}" class="col-md-3 m-2">
            <i class="fa fa-cog"></i>
            <p>Paramètres</p>
        </a>
        <a href="/deconnexion" class="col-md-3 m-2">
            <i class="fa fa-power-off"></i>
            <p>Déconnexion</p>
        </a>
    </div>
</div>

@endsection

