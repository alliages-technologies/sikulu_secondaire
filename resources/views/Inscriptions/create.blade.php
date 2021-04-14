@extends('layouts.admin');
@section('content')
<h4 class="text-center"> Création d'un nouveau Membre </h4>
<div class="container">
    <h3 class="text-center m-4">Enrégistrement d'un élêve</h3>
    <form action="/inscriptions/eleve" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id">
    <div class="">
        <div class="row">
            <div class="col-md-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="col-md-3">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="col-md-3">
                <label for="dn">Date de Naissance</label>
                <input type="date" class="form-control" id="dn" name="date_naiss" required>
            </div>
            <div class="col-md-3">
                <label for="ln">Lieu de Naissance</label>
                <input type="text" class="form-control" id="ln" name="lieu_naiss" required>
            </div>

        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="col-md-3">
                <label for="npere">Nom du père</label>
                <input type="text" class="form-control" id="npere" name="nom_pere" required>
            </div>
            <div class="col-md-3">
                <label for="tpere">Tel du père</label>
                <input type="text" class="form-control" id="tpere" name="tel_pere" required>
            </div>
            <div class="col-md-3">
                <label for="nmere">Nom de la mère</label>
                <input type="text" class="form-control" id="nmere" name="nom_mere" required>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-3">
                <label for="tmere">Tel de la mère</label>
                <input type="text" class="form-control" id="tmere" name="tel_mere" required>
            </div>
            <div class="col-md-3">
                <label for="ntuteur">Nom du Tuteur</label>
                <input type="text" class="form-control" id="ntuteur" name="nom_tuteur" required>
            </div>
            <div class="col-md-3">
                <label for="ttuteur">Tel du Tuteur</label>
                <input type="text" class="form-control" id="ttuteur" name="tel_tuteur" required>
            </div>
            <div class="col-md-3">
                <label for="image">Image</label>
                <input type="file" class="" id="image" name="image_uri" |size:5000>
            </div>
        </div>
    </div>
        <input type="submit" class="btn btn-success mt-4" value="Enregistrer">
    </form>
</div>
@endsection
