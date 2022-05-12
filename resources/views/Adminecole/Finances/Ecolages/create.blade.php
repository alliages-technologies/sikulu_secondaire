@extends('layouts.adminecole')


@section('title')
Admin Ecole | Paiement Ecolage
@endsection

@section('content')

<div class="container mt-4">
    <form action="">
        @csrf
        <div id="selectionSalle" class="card">
            <div class="card-header">
                <h2>PAIEMENT DES FRAIS D'ECOLAGE</h2>
            </div>
            <div id="" class="card-body d-flex justify-content-center">
                <div class="form-group">
                    <select name="selectSalle" id="selectSalle" class="form-control">
                        <option value="">SELECTIONNEZ LA SALLE DE CLASSE</option>
                        @foreach ($salles as $salle)
                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group ml-2">
                    <button id="rechercher" class="btn btn-md btn-success" >RECHERCHER</button>
                </div>
            </div>
        </div>
        <div id="etape1" class="card">
            <div class="card-header">
                <h4>ETAPE 1</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <table class="table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ELEVES DE LA SALLE SELECTIONNEE</th>
                        </tr>
                    </thead>
                    <tbody id="resultats"></tbody>
                </table>
            </div>
        </div>
    </form>
</div>

<script src="{{asset('js/ecolagePaiement.js')}}"></script>

@endsection
