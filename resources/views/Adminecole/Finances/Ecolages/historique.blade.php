@extends('layouts.adminecole')


@section('title')
Admin Ecole | Historique des paiements
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                HISTORIQUE DES PAIEMENTS
                <a href="{{route('adminecole.ecolages.index')}}" style="float: right;" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> RETOUR</a>
            </h2>
        </div>
        <div class="card-body">
            <div class="container menu">
                <div class="row d-flex justify-content-center p-4">
                    @foreach ($salles as $salle)
                        <a href="{{route('adminecole.historique.salle', $salle->token)}}" class="col-md-3 m-2">
                            <i class="fa fa-home"></i>
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
