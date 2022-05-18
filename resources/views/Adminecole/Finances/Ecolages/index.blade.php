@extends('layouts.adminecole')


@section('title')
Admin Ecole | Ecolages
@endsection

@section('content')

<div class="container mt-4 col-md-8">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES FRAIS D'ECOLAGE
                <a href="{{route('adminecole.finances.index')}}" style="float: right;" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> RETOUR</a>
            </h2>
        </div>
        <div class="card-body">
            <a href="{{route('adminecole.ecolages.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> EFFECUER UN PAIEMENT</a>
            <a href="{{route('adminecole.historique.paiements')}}" class="btn btn-info"><i class="fa fa-list"></i> HISTORIQUE DES PAIEMENTS</a>
        </div>
    </div>
</div>

@endsection
