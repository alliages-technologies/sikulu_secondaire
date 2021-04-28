@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-left">Information sur {{$inscription->eleve->prenom}} <i class="fa fa-user-graduate"></i> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <b> Information sur l'élêve <i class="fa fa-user"></i> </b>
                        </div>
                        <div class="card-body">
                            <label for="">Nom :</label>
                            {{$inscription->eleve->nom}}</br>
                            <label for="">Prénom(s) :</label>
                            {{$inscription->eleve->prenom}}</br>
                            <label for="">Date de naissance :</label>

                            @if(setlocale(LC_TIME, "fr_FR","French") && $date = strftime("%A %d %B %G", strtotime($inscription->eleve->date_naiss)))
                            {{$date}}</br>
                            @else
                            @endif
                            <label for="">Lieu de naissance :</label>
                            {{$inscription->eleve->lieu_naiss}}</br>
                            <label for="">Adresse :</label>
                            {{$inscription->eleve->adresse}}</br>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <b>Information sur son niveau <i class="fa fa-info"></i></b>
                        </div>
                        <div class="card-body">
                            <label for="">Classe :</label>
                            {{$inscription->classe_id?$inscription->classe->name:""}}</br>
                            <label for="">Code de la classe :</label>
                            {{$inscription->classe_id?$inscription->classe->code:""}}</br>
                            <label for="">Série :</label>
                            {{$inscription->classe->serie->name}}</br>
                            @if($inscription->classe->examen== 1)
                            <label for=""><span class="badge badge-warning p-1">Classe d'examen...!</span></label></br>
                            @else
                            <label for=""><span class="badge badge-success p-1">Classe de passage...!</span></label></br>
                            @endif
                            @if(setlocale(LC_TIME, "fr_FR","French") && $date = strftime("%A %d %B %G", strtotime($inscription->created_at)))
                            <label for="">Inscrit :</label>
                            {{$date}}
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div class="card">
                        <img class="cardimg" src="{{asset($inscription->eleve->image_uri)}}" alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <b>Information sur les parents <i class="fa fa-male"></i><i class="fa fa-female"></i></b>
                        </div>
                        <div class="card-body">
                            <label for="">Nom du Père :</label>
                            {{$inscription->eleve->nom_pere}}
                            <div class="float-right">
                                <label for="">Tél :</label>
                                {{$inscription->eleve->tel_pere}}
                            </div></br>
                            <label for="">Nom de la Mère :</label>
                            {{$inscription->eleve->nom_mere}}
                            <div class="float-right">
                                <label for="">Tél :</label>
                                {{$inscription->eleve->tel_mere}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header"> <b>Information sur Tuteur</b> <i class="fa fa-male"></i></div>
                        <div class="card-body">
                            <label for="">Nom et Prénom(s) :</label>
                            {{$inscription->eleve->nom_tuteur}}</br>
                            <label for="">Numéro de Tél :</label>
                            {{$inscription->eleve->tel_tuteur}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> <b>Frais scolaires</b> <i class="fa fa-money"></i> </div>
                        <div class="card-body">
                            <label for="">Montant d'inscription :</label>
                            {{number_format($inscription->classe->montant_inscri)}} XAF</br>
                            @if($inscription->classe->montant_frais!=0)
                            <label for="">Montant frais d'examen :</label>
                            {{number_format($inscription->classe->montant_frais)}} XAF
                            @else
                            <label for="">Montant frais d'examen :</label>
                            {{number_format($inscription->classe->montant_frais)}} XAF
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
