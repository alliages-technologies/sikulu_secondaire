@extends('layouts.responsablescolarite')


@section('title')
Directeur des Etudes | Acceuil
@endsection

@section('content')
<div class="container menu mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h2>D A S H B O A R D</h2>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center p-4">
                <a style="color: red" href="/deconnexion" class="col-md-3 m-2">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
