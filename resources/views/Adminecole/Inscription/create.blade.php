@extends('layouts.adminecole')
@section('content')
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="text-left">Inscription d'un élêve <i class="fa fa-user-graduate"></i></h3>
        </div>
        <div class="card-body">
            <div class="">
                <form action="{{ route('adminecole.inscriptions.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="annee_id" value="{{$annee_acad->id}}">
                    <div class="row info-a">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Informations n°1</legend>
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
                                            <div class="form-group col-md-6">
                                                <label for="image">Image</label>
                                                <input class="form-control-file" type="file" class="" id="image" name="image_uri" |size:5000>
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
                                        <legend>Informations n°2</legend>
                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <label for="">Salle</label>
                                                <select name="salle_id" id="" class="form-control">
                                                    <option value="">choix</option>
                                                    @foreach ($salles as $salle)
                                                    <option value="{{ $salle->id }}"> {{ $salle->abb }} / {{ $salle->classe->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Montant inscription</label>
                                                <input type="number" class="form-control" name="montant_inscri" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <label for="">Montant des frais d'examen</label>
                                                <input type="number" class="form-control" name="montant_frais" placeholder="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="npere">Nom du père</label>
                                                <input type="text" class="form-control" id="npere" name="nom_pere" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tpere">Tel du père</label>
                                                <input type="text" class="form-control" id="tpere" name="tel_pere" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nmere">Nom de la mère</label>
                                                <input type="text" class="form-control" id="nmere" name="nom_mere" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <button class="btn btn-default btn-lg suivant"><i class="fa fa-hand-point-down"></i></button>
                        </div>
                    </div>

                    <div class="row info-b">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Informations n°3</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tmere">Tel de la mère</label>
                                                <input type="number" class="form-control" id="tmere" name="tel_mere" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ntuteur">Nom du Tuteur</label>
                                                <input type="text" class="form-control" id="ntuteur" name="nom_tuteur" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <label for="ttuteur">Tel du Tuteur</label>
                                                <input type="number" class="form-control" id="ttuteur" name="tel_tuteur" required>
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
                                        <legend>Informations n°4</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tmere">Mot de Passe</label>
                                                <input type="password" class="form-control" id="tmere" name="password" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ttuteur">Email Tuteur</label>
                                                <input type="email" class="form-control" id="ttuteur" name="email" required>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <label for="ntuteur">Validez les informations</label>
                                                <button class="btn btn-success">Enrégistrer <i class="fa fa-save"></i></button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <button class="btn btn-default btn-lg precedent"><i class="fa fa-hand-point-up"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/inscription.js') }}"></script>
@endsection
