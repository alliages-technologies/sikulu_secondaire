@extends('layouts.superadmin')


@section('title')
Superadmin | Acceuil
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
