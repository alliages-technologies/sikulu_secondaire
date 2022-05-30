@extends('layouts.adminecole')


@section('title')
Admin Ecole | Programmes Scolaire
@endsection

@section('content')

<div class="container mt-5">
    <div class="card menu">
        <div class="card-header">
            <h2>GESTION DES PROGRAMMES</h2>
        </div>
        <div class="card-body ">
            <div class="container text-center">
                <div class="row d-flex justify-content-center p-1">
                    @foreach ($salles as $salle)
                    <a href="{{ route('adminecole.menu',$salle->token) }}" class="col-md-3 m-2">
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
