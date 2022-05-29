@extends('layouts.prof')


@section('title')
{{Auth::user()->name}} | {{$ecole->name}}
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }} <strong>|</strong> {{ $ecole->name }}</h3>
        </div>
        <div class="card-body menu">
            <div class="row d-flex justify-content-center p-4">
                <a href="" class="col-md-3 m-2">
                    <i class="fa fa-bar-chart"></i>
                    <p>Statistiques</p>
                </a>
                <a href="{{ route('profs.emploi_temps.index') }}" class="col-md-3 m-2">
                    <i class="fa fa-calendar"></i>
                    <p>Emploi du temps</p>
                </a>
                <a href="{{ route('profs.notes.index') }}" class="col-md-3 m-2">
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
    </div>
</div>

@endsection
