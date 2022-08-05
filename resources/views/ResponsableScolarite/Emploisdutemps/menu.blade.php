@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Emplois du temps
@endsection

@section('content')

<div class="container mt-4">
    <div class="card menu">
        <div class="card-header">
            <h2>
                GESTION DES EMPLOIS DU TEMPS
            </h2>
        </div>
        <div class="card-body ">
            <div class="row d-flex justify-content-center p-1">
                @foreach ($salles as $salle)
                <a href="{{ route('responsablescolarite.emploistemps.index', $salle->token) }}" class="col-md-3 m-2">
                    <i class="fa fa-door-open"></i>
                    <p>{{ $salle->name }} | {{$salle->classe->name}}</p>
                </a>
                <input type="hidden" name="id" value="{{ $salle->id}}">
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
