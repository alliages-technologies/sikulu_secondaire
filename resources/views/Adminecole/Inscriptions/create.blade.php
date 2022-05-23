@extends('layouts.adminecole')


@section('title')
Admin Ecole | Inscription
@endsection

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2><i class="fa fa-user-graduate"></i> NOUVELLE INSCRIPTION</h2>
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
                                        <legend>Informations Personnelles</legend>
                                        <div class="row mt-1">
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
                                            <div class="col-md-12">
                                                <label for="adresse">Adresse</label>
                                                <input type="text" class="form-control" id="adresse" name="adresse" required>
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
                                        <legend>Informations Administrative</legend>
                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <label for="">Salle</label>
                                                <select name="salle_id" id="" class="form-control">
                                                    <option value="">CHOIX</option>
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

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Montant des frais d'examen</label>
                                                <input type="number" class="form-control" name="montant_frais" placeholder="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="image">Image</label>
                                                <input class="form-control" type="file" class="" id="image" name="image_uri" |size:5000>
                                            </div>
                                        </fieldset>
                                    </div>
                            </div>
                            <button class="btn btn-default btn-lg suivant"><i class="fa fa-hand-point-down"></i></button>
                        </div>
                    </div>

                    <div class="row info-parent">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Informations sur les Parents</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="npere">Nom du père</label>
                                                <input type="text" class="form-control" id="npere" name="nom_pere" placeholder="" required>
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
                                                <input type="number" class="form-control" id="tmere" name="tel_mere" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body tuteur">
                                    <fieldset>
                                        <legend>Informations sur le Tuteur</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ntuteur">Nom du Tuteur</label>
                                                <input type="text" class="form-control nom_tuteur" id="ntuteur" name="nom_tuteur" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ttuteur">Tel du Tuteur</label>
                                                <input type="number" class="form-control tel_tuteur" id="ttuteur" name="tel_tuteur" required>
                                            </div>
                                        </div>
                                        <div class="row pass-email-tuteur">
                                            <div class="col-md-6">
                                                <label for="">Mot de Passe</label>
                                                <input type="password" class="form-control" id="" name="password" >
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ttuteur">Email Tuteur</label>
                                                <input type="email" class="form-control" id="ttuteur" name="email" >
                                            </div>
                                        </div>
                                        <div class="row mt-4 row-btn-verifier">
                                            <div class="col-md-12">
                                                <button class="btn btn-default btn-verifier"><i class="fa fa-search"></i> Verification du tuteur</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <button class="btn btn-default btn-lg precedent"><i class="fa fa-hand-point-up"></i></button>
                        </div>
                    </div>
                    <button class="btn btn-success btn-save"><i class="fa fa-save"></i> ENREGISTRER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/inscription.js') }}"></script>

@endsection
