@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Historique
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2> HISTORIQUE DES PAIEMENTS DES FRAIS D'ECOLAGE</h2>
        </div>
        <div class="card-body">
            <div class="container menu">
                <div class="row d-flex justify-content-center p-4">
                    @foreach ($salles as $salle)
                        <a href="{{route('responsablefinances.historique.salle', $salle->token)}}" class="col-md-3 m-2">
                            <i class="fa fa-door-open"></i>
                            <p>{{$salle->name}} | {{$salle->classe->name}}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer">
            {{$salles->links()}}
        </div>
    </div>
</div>


<script src="{{asset('js/historiquePaiements.js')}}"></script>
@endsection
