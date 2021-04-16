@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-5">
    <div class="card card-dark">
        <div class="card-header">
            <h4 class="text-left">Information sur {{$inscription->eleve->prenom}} <i class="fa fa-user-graduate"></i> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-dark">
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

                <div class="col-md-2">
                    <div class="card">
                        <img class="cardimg" src="{{asset($inscription->eleve->image_uri)}}" alt="" srcset="">
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row mt-2">
                <div class="col-md-5">
                    <div class="card card-dark">
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
                    <div class="card card-dark">
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
                    <div class="card card-dark">
                        <div class="card-header"> <b>Frais scolaires</b> <i class="fa fa-money"></i> </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
