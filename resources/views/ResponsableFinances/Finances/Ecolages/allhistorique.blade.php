@extends('layouts.form')


@section('title')
Responsable Finances | Historique global ecolage
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2> HISTORIQUE GLOBAL DES PAIEMENTS DES FRAIS D'ECOLAGE </h2>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <select name="salle_id" id="salle_id" class="form-control" required>
                        <option>SELECTIONNEZ LA SALLE DE CLASSE</option>
                        @foreach ($salles as $salle)
                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="selectionEleve" class="col">
                    <select name="inscriptions" id="inscriptions" class="form-control">
                        <!-- options -->
                    </select>
                </div>
                <div class="col">
                    <select name="month" id="month" class="form-control">
                        <option>SELECTINNEZ LE MOIS</option>
                        @foreach ($mois as $month)
                        <option value="{{$month->id}}">{{$month->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="resultats" class="mt-4">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <th>DATE</th>
                        <th>MONTANT</th>
                        <th>MOIS</th>
                        <th id="eleveSelected">ELEVE</th>
                    </thead>
                    <tbody id="historiquePaiements">
                        <!---->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="{{asset('js/historiqueGlobalEcolage.js')}}"></script>
@endsection
