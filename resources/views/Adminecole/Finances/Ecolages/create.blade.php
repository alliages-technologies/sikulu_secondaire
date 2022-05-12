@extends('layouts.adminecole')


@section('title')
Admin Ecole | Paiement Ecolage
@endsection

@section('content')

<div class="container mt-4">
    <form action="">
        @csrf
        <div class="card">
            <div class="card-header">
                <h2>PAIEMENT DES FRAIS D'ECOLAGE</h2>
            </div>
            <div id="selectionSalle" class="card-body d-flex justify-content-center">
                <div class="form-group">
                    <select id="selectSalle" name="" id="" class="form-control">
                        <option value="">SELECTIONNEZ LA SALLE</option>
                        @foreach ($salles as $salle)
                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-2">
                    <button id="valider" class="btn btn-md btn-success" >VALIDER</button>
                </div>
            </div>

            <div id="affichageEleve" class="card-body d-flex justify-content-center">
                <span id="resultat"></span>
            </div>
        </div>
    </form>
</div>

<script src="{{asset('js/ecolagePaiement.js')}}"></script>

@endsection
