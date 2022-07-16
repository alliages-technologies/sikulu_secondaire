@extends('layouts.superadmin')


@section('title')
Superadmin | Acceuil
@endsection

@section('content')

<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        <a href="" class="col-md-3 m-2">
            <i class="fa fa-bar-chart"></i>
            <p>Statistiques</p>
        </a>
        <a href="{{route('superadmin.ecoles.index')}}" class="col-md-3 m-2">
            <i class="fa fa-building"></i>
            <p>Etablissements</p>
        </a>

        <a href="{{ route('superadmin.programmes-national.index') }}" class="col-md-3 m-2">
            <i class="fa fa-globe"></i>
            <p>Programme National</p>
        </a>
   
        <a href="{{route('superadmin.parametres.index')}}" class="col-md-3 m-2">
            <i class="fa fa-cog"></i>
            <p>Paramètres</p>
        </a>
        <a style="color: red" href="/deconnexion" class="col-md-3 m-2">
            <i class="fa fa-power-off"></i>
            <p>Déconnexion</p>
        </a>
    </div>
</div>

@endsection
