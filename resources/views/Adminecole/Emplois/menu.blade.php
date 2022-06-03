@extends('layouts.adminecole')


@section('title')
Admin Ecole | Emplois du temps
@endsection

@section('content')
<<<<<<< HEAD

<div class="container mt-4">
    <div class="card menu">
        <div class="card-header">
            <h2>GESTION DES EMPLOIS DU TEMPS</h2>
        </div>
        <div class="card-body ">
            <div class="row d-flex justify-content-center p-1">
                @foreach ($salles as $salle)
                <a href="{{ route('adminecole.index',$salle->id) }}" class="col-md-3 m-2">
                    <i class="fa fa-door-open"></i>
                    <p>{{ $salle->name }} | {{$salle->classe->name}}</p>
                </a>
                <input type="hidden" name="id" value="{{ $salle->id}}">
                @endforeach
=======
<div class="card mt-5 menu">
    <div class="card-header">
        <h4 class="text-left mb-1"> Programme /> Salles </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <div class="container text-center">
                <div class="row d-flex justify-content-center p-1">
                    @foreach ($salles as $salle)
                    <a href="{{ route('adminecole.index',$salle->token) }}" class="col-md-3 m-2">
                        <i class="fa fa-door-open"></i>
                        <p>{{ $salle->name }}</p>
                    </a>
                    <input type="hidden" name="id" value="{{ $salle->id}}">
                    @endforeach
                </div>
>>>>>>> dfdc58834e23de13978ce6b4101534a53903c34f
            </div>
        </div>
    </div>
</div>

@endsection
