@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Ecolages
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES FRAIS D'ECOLAGE
                <a href="/home" style="float: right;" class="btn btn-sm btn-default">RETOUR</a>
            </h2>
        </div>
        <div class="card-body menu row d-flex justify-content-center p-4">
            <a href="{{route('responsablefinances.ecolages.create')}}" class="col-md-3 m-2">
                <i class="fa fa-plus-circle"></i>
                <p>EFFECTUER UN PAIEMENT</p>
            </a>
            <a href="{{route('responsablefinances.historique.paiements')}}" class="col-md-3 m-2">
                <i class="fa fa-list"></i>
                <p>HISTORIQUE DES PAIEMENTS</p>
            </a>
        </div>
    </div>
</div>

@endsection
