@extends('layouts.adminecole')


@section('title')
Admin Ecole | Programmes Scolaire
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES PROGRAMMES
                <a href="/home" style="float: right" class="btn btn-sm btn-default"> RETOUR</a>
            </h2>
        </div>
        <div class="card-body menu">
            <div class="text-center">
                <div class="row d-flex justify-content-center p-1">
                    @foreach ($salles as $salle)
                    <a href="{{ route('adminecole.menu', $salle->token) }}" class="col-md-3 m-2">
                        <i class="fa fa-door-open"></i>
                        <p>{{ $salle->name }}</p>
                    </a>
                    <input type="hidden" name="id" value="{{ $salle->token}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
