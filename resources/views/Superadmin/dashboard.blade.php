@extends('layouts.superadmin')


@section('title')
Superadmin | Dashboard
@endsection

@section('content')

<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-bar-chart"></i>
            <p>Statistiques</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-building"></i>
            <p>Etablissement</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-users"></i>
            <p>R.H</p>
        </a>
        <a href="{{ route('superadmin.programmes-national.index') }}" class="col-md-3 m-2">
            <i class="fa fa-globe"></i>
            <p>Programme National</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-user-plus"></i>
            <p>Réinscriptions</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-graduation-cap"></i>
            <p>Scolarité</p>
        </a>
        <a href="" class="col-md-3 m-2">
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
            <i class="fa fa-money"></i>
            <p>Finances</p>
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
        <a href="{{route('superadmin.parametres.index')}}" class="col-md-3 m-2">
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
