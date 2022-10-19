@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Paiement Ecolage
@endsection

@section('content')

<style>
    tr{
        font-size: 25px;
    }
</style>

<div class="container mt-4">
    <div class="card">
        <h1 class="card-header text-center" style="text-transform: uppercase"> FRAIS D'ECOLAGE | {{$inscription->name}} <h1>
            <div class="card-body">
                <h4 class="ml-2 mb-2">INFORMATION SUR L'ELEVE</h4>
                <div class="row mt-1 mb-3">
                    <div class="col-md-4">
                        <img style="width: 215px;height: 215px;" src="{{asset($inscription->eleve->image_uri)}}" alt="" srcset="">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-6" style="font-size: 20px;letter-spacing: 1px;background-color: #17a2b8;
                    color: white;
                    border-radius: 1pc 1pc 1pc 1pc;
                    box-shadow: 2px 3px 4px 0px rgb(237, 237, 237);">
                        NOM(s) : {{$inscription->eleve->nom}} <br>
                        PRENOM(S) : {{$inscription->eleve->prenom}} <br>
                        DATE NAISSANCE : {{$inscription->eleve->date_naiss}} <br>
                        LIEU NAISSANCE : {{$inscription->eleve->lieu_naiss}} <br>
                        AGE : {{$inscription->eleve->age}} ans <br>
                        SALE : {{$inscription->salle->name}} | {{$inscription->salle->abb}} <br>
                        NIVEAU : {{$inscription->salle->classe->name}} <br>
                        NOM DU TUTEUR : {{$inscription->eleve->nom_tuteur}} <br>
                        TEL DU TUTEUR : {{$inscription->eleve->tel_tuteur}}
                    </div>
                </div>
                <h4> FRAIS SCOLAIRES PAR MOIS : <strong style="    color: #000000;
                    font-weight: bold;"> {{number_format($inscription->montant_inscri,0,'','.')}} XAF </strong> </h4>
                <div id="" class="card ">
                    <div class="card-header">
                        <button class="btn btn-outline-dark float-right"> HISTORIQUE <i class="fa fa-eye"></i> </button>
                        <h3>EFFECTUER LE PAIEMENT</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <form action="/responsablefinances/ecolages-eleve-paiement-store" method="post"  class="form-row">
                            @csrf
                            <input name="inscription_id" type="hidden" value="{{$inscription->id}}">
                            <div class="col-4">
                                <input type="number" name="montant" id="montant" placeholder="Montant" class="form-control" required>
                            </div>
                            <div class="col-8 d-flex">
                                <select name="mois" class="form-control" required>
                                    <option value="">Choix</option>
                                    @foreach ($mois as $month)
                                    <option value="{{$month->id}}">{{$month->name}}</option>
                                    @endforeach
                                </select>
                                <button id="confirmer" class="btn btn-md btn-success ml-4 confirmer">CONFIRMER</button>
                            </div>
                            <div class="col">
                            </div>
                        </form>
                    </div>

                <div class=" text-">
                    <h4 class="ml-2">HISTORIQUE DE PAIEMENTS</h4>
                    <table class="table table-bordered table-striped table-sm ">
                        <thead>
                            <tr>
                                <th>MOIS</th>
                                <th>MONTANT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ecolages as $ecolage)
                            <tr>
                                <td> {{$ecolage->moi->name}} </td>
                                <td> {{number_format($ecolage->montant,0,'','.')}} XAF </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
    </div>
</div>

<script>
$("button").click(function (e) {
    e.preventDefault();
    console.log(1);
    $.ajax({
        type: "post",
        url: "/responsablefinances/ecolages-eleve-paiement-store",
        data: {
            inscription_id:inscription_id,
            montant: $('#montant').val(),
            mois: $('#mois').val(),
            "_token": $('input[name="_token"]').val()
        },
        dataType: "json",
        success: function (response) {
            alert("PAIEMENT EFFECTUE AVEC SUCCES");
            window.location.replace("/responsablefinances/ecolages/facture/paiement");
        }
    });
});
</script>
@endsection
