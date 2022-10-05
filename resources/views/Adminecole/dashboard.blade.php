@extends('layouts.adminecole')


@section('title')
Admin Ecole | Acceuil
@endsection
@php
    $ecole = App\Models\Ecole::find(Auth::user()->ecole_id);
@endphp
@section('content')
<img src="{{asset($ecole->image_uri)}}" alt="" srcset="">
<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        <a style="color: red" href="/deconnexion" class="col-md-3 m-2">
            <i class="fa fa-power-off"></i>
            <p>Déconnexion</p>
        </a>
    </div>
</div>
@endsection

