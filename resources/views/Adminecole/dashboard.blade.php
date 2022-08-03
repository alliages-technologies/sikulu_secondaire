@extends('layouts.adminecole')


@section('title')
Admin Ecole | Acceuil
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Acceuil</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Acceuil</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        <a style="color: red" href="/deconnexion" class="col-md-3 m-2">
            <i class="fa fa-power-off"></i>
            <p>Déconnexion</p>
        </a>
    </div>
</div>
@endsection

