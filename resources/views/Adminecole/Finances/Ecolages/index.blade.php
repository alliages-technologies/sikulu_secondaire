@extends('layouts.adminecole')


@section('title')
Admin Ecole | Ecolages
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>GESTION DES FRAIS D'ECOLAGE</h2>
        </div>
        <div class="card-body">
            <a href="{{route('adminecole.ecolages.create')}}" class="btn btn btn-success">EFFECUER UN PAIEMENT <i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>

@endsection
