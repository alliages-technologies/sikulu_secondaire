@extends('layouts.adminecole')


@section('title')
Admin Ecole | Programmes {{ $salle->name }}
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Programme {{ $salle->name }} | {{ $salle->classe->name }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Acceuil</a></li>
            <li class="breadcrumb-item active">Programme Scolaire</li>
            </ol>
        </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container mt-5">
    <div class="menu">
        <div class="container text-center">
            <div class="row d-flex justify-content-center p-1">
                <a href="{{ route('adminecole.programmes-ecole.show', $salle->token) }}" class="col-md-3 m-2">
                    <i class="fa fa-folder"></i>
                    <p>Programme </p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
