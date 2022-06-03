@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Dashboard
@endsection

@section('content')

<div class="container menu mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h1><i class="fa fa-coins"></i> GESTION DES FINANCES</h1>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center p-4">
                <a href="{{route('responsablefinances.ecolages.index')}}" class="col-md-3 m-2">
                    <i class="fa fa-list-alt"></i>
                    <p>Ecolages</p>
                </a>
                <a href="{{route('responsablefinances.depenses.index')}}" class="col-md-3 m-2">
                    <i class="fa fa-list-alt"></i>
                    <p>Dépenses</p>
                </a>
                <a href="{{route('responsablefinances.entrees.index')}}" class="col-md-3 m-2">
                    <i class="fa fa-download"></i>
                    <p>Autres Entrées</p>
                </a>
                <a href="/deconnexion" class="col-md-3 m-2">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection
