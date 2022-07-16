@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Paiement Ecolage
@endsection

@section('content')

<div class="container mt-4 card-header">
    <h1>PAIEMENT DES FRAIS D'ECOLAGE</h1>
</div>
<div class="container mt-4 d-flex justify-content-center">
    <form action="">
        @csrf
        <!--Sélection de la salle-->
        <div id="etape1" class="card">
            <div class="card-header">
                <h2>SELECTION DE LA SALLE</h2>
            </div>
            <div id="" class="card-body d-flex justify-content-center">
                <div class="form-group">
                    <select name="selectSalle" id="selectSalle" class="form-control" required>
                        <option value="">SELECTIONNEZ LA SALLE DE CLASSE</option>
                        @foreach ($salles as $salle)
                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!--Affichage des élèves de la salle sélectionnée-->
        <div id="etape2" class="card">
            <div class="card-header">
                <h3>ELEVES DE LA SALLE SELECTIONNEE</h3>
            </div>
                <div id="" class="card-body d-flex justify-content-center">
                <div class="form-group">
                    <select name="resultats" id="resultats" class="form-control" required>
                        <!--Options-->
                    </select>
                </div>
                </div>
            <!--Historique des paiements-->
            <div id="historique" class="card-footer">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            HISTORIQUE
                            <button style="float: right;" id="btn-payer" class="btn btn-sm btn-success">PAYER</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>MONTANT</th>
                                   <th>MOIS</th>
                               </tr>
                           </thead>
                            <tbody id="paiements">
                                <!--Contenu de l'historique de paiements de l'élève selectionné(e)-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Le Paiement-->
        <div id="etape3" class="card">
            <div class="card-header">
                <h4>EFFECTUER LE PAIEMENT</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <div class="form-row">
                    <div class="col">
                        <input type="number" name="montant" id="montant" placeholder="Montant" class="form-control" required>
                    </div>
                    <div class="col">
                        <select name="moi_id" id="mois" class="form-control" required>
                            <option value="">SELECTIONNEZ LE MOIS</option>
                            @foreach ($mois as $month)
                            <option value="{{$month->id}}">{{$month->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <button id="confirmer" class="btn btn-md btn-success">CONFIRMER</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script src="{{asset('js/ecolagePaiement.js')}}"></script>

@endsection
