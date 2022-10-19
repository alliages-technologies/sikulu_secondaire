@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Paiement Ecolage
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <h1 class="card-header text-center">PAIEMENT DES FRAIS D'ECOLAGE<h1>
            <div class="card-body">
                <div class="container text-center">
                    <div class="row d-flex justify-content-center p-1">
                        @foreach ($salles as $salle)

                        <a href="{{route('responsablefinances.ecolages.inscriptions.salles',$salle->token)}}" class="col-md-3 m-2" style="font-size: 20px;">
                            <i class="fa fa-building"></i>
                            <p> {{$salle->name}} | {{$salle->classe->name}} </p>
                        </a>
                        @endforeach
                    </div>
            </div>
    </div>
</div>

@endsection
