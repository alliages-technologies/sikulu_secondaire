@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Acceuil
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h1>
                GESTION DES FINANCES
            </h1>
        </div>
        <div class="card-body menu">
            <div class="row d-flex justify-content-center p-4">
                <a href="{{route('responsablefinances.ecolages.index')}}" class="col-md-3 m-2">
                    <i class="fa fa-list"></i>
                    <p>Ecolages</p>
                </a>
                <a href="{{route('responsablefinances.depenses.index')}}" class="col-md-3 m-2">
                    <i class="fa fa-coins"></i>
                    <p>Dépenses</p>
                </a>
                <a href="{{route('responsablefinances.entrees.index')}}" class="col-md-3 m-2">
                    <i class="fa fa-arrow-down"></i>
                    <p>Autres Entrées</p>
                </a>
                <a href="{{route('responsablefinances.suivi.index')}}" class="col-md-3 m-2">
                    <i class="fa fa-th"></i>
                    <p>Suivi des paiements</p>
                </a>
                <a href="/deconnexion" class="col-md-3 m-2">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
