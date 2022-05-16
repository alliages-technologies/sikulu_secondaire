@extends('layouts.Parent')
@section('content')
<h4 class="text-center mt-4 mb-4" style="letter-spacing: 1px; box-shadow: 25px 1px 1px 1px darkblue;">Bienvenue Mr   (Mme) {{ Auth::user()->name }} à l'école {{ $ecole->name }}</h4>
<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        <a href="{{ route('parents.inscriptions.index') }}" class="col-md-3 m-2">
            <i class="fa fa-users"></i>
            <p>Mes enfants</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-calendar"></i>
            <p>Emploi du temps</p>
        </a>
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-edit"></i>
            <p>Notes</p>
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
            <p>Mes paiements</p>
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
        <a href="" class="col-md-3 m-2">
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
