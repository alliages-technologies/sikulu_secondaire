@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Acceuil
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h1>
                D A S H B O A R D
            </h1>
        </div>
        <div class="card-body menu">
            <div class="row d-flex justify-content-center p-4">
                <a style="color: red" href="/deconnexion" class="col-md-3 m-2">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
