@extends('layouts.adminecole')


@section('title')
Admin Ecole | Ecolages
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>GESTION DES FRAIS D'ECOLAGE</h2>
            <a href="{{route('adminecole.ecolages.create')}}" class="btn btn-sm btn-success"><div class="fa fa-plus"></div></a>
        </div>
    </div>
</div>

@endsection
