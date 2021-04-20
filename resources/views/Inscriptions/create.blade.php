@extends('layouts.admin');
@section('content')
<div class="container-fluid">
    <div class="card card-sm mt-5">
        <div class="card-header">
            <h3 class="text-left">Inscription d'un élêve <i class="fa fa-user-graduate"></i></h3>
        </div>
        <div class="card-body">
            <div class="">
                <form action="/inscriptions/eleve" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($annee_acad as $a)
                    <input type="hidden" name="anneeacad_id" value="{{$a->id}}">
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Informations Personnelles</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nom">Nom</label>
                                                <input type="text" class="form-control" id="nom" name="nom" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="prenom">Prénom</label>
                                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="dn">Date de Naissance</label>
                                                <input type="date" class="form-control" id="dn" name="date_naiss" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ln">Lieu de Naissance</label>
                                                <input type="text" class="form-control" id="ln" name="lieu_naiss" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="adresse">Adresse</label>
                                                <input type="text" class="form-control" id="adresse" name="adresse" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="image">Image</label>
                                                <input class="form-control" type="file" class="" id="image" name="image_uri" |size:5000>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Informations sur les parents et le tuteur</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="npere">Nom du père</label>
                                                <input type="text" class="form-control" id="npere" name="nom_pere" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tpere">Tel du père</label>
                                                <input type="text" class="form-control" id="tpere" name="tel_pere" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nmere">Nom de la mère</label>
                                                <input type="text" class="form-control" id="nmere" name="nom_mere" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tmere">Tel de la mère</label>
                                                <input type="text" class="form-control" id="tmere" name="tel_mere" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ntuteur">Nom du Tuteur</label>
                                                <input type="text" class="form-control" id="ntuteur" name="nom_tuteur" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ttuteur">Tel du Tuteur</label>
                                                <input type="text" class="form-control" id="ttuteur" name="tel_tuteur" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Information administrative</legend>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                <label for="">Classe</label>
                                                    <select name="classe_id" id="" class="form-control" required>
                                                        <option value="">Classe</option>
                                                        @foreach($classes as $classe)
                                                        <option value="{{$classe->id}}"> {{$classe->name}} {{$classe->serie_id?$classe->serie->name:""}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Montant inscription</label>
                                                    <input type="number" class="form-control" name="montant_inscri" placeholder="Montant de l'inscription..." required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Montant des frais d'examen</label>
                                                    <input type="number" class="form-control" name="montant_frais" placeholder="Montant des frais...">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Validez les informations</legend>
                                        <button class="btn btn-success mb-2">Enrégistrer <i class="fa fa-save"></i></button>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
