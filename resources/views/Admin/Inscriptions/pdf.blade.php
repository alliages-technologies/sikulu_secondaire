@extends('layouts.admin')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="text-left">Reçu de l'élêve {{$inscription->eleve->prenom}} <i class="fa fa-user-graduate"></i> </h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <b> Reçu de paiement </b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Nom :</label>
                                    {{$inscription->eleve->nom}}</br>
                                    <label for="" class="">Prénom(s) :</label>
                                    {{$inscription->eleve->prenom}}</br>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Date de naissance :</label>
                                    @if(setlocale(LC_TIME, "fr_FR","French") && $date = strftime("%A %d %B %G", strtotime($inscription->eleve->date_naiss)))
                                    {{$date}}</br>
                                    @else
                                    @endif
                                    <label for="" class="">Lieu de naissance :</label>
                                    {{$inscription->eleve->lieu_naiss}}</br>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Adresse :</label>
                                    {{$inscription->eleve->adresse}}</br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="">Classe :</label>
                                    {{$inscription->classe_id?$inscription->classe->name:""}}</br>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Série :</label>
                                    {{$inscription->classe->serie->name}}</br>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Montant :</label>
                                    {{number_format($inscription->classe->montant_inscri)}} XAF</br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($inscription->classe->montant_frais!=0)
                                    <label for="">Montant frais d'examen :</label>
                                    {{number_format($inscription->classe->montant_frais)}} XAF
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-1 mb-5">
                                <div class="col-md-6">
                                    <label for="">Validé par :</label>
                                    {{Auth::user()->name}}
                                </div>
                                <div class="col-md-6">
                                    <label for="">Date & Heure le validation :</label>
                                    {{($inscription->created_at)->format('d/m/Y à H:m:s')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="cardimg" src="{{asset($inscription->eleve->image_uri)}}" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </div>
       <a href="/inscriptions/pdf/{{$eleve->id}}/{{$inscription->id}}" class="btn btn-primary float-right">Imprimer le reçu <i class="fa fa-print"></i> </a>
</div>
@endsection
