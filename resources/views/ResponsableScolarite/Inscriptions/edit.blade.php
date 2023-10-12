@extends('layouts.responsablescolarite')
@section('content')
    <div class="container mt-4" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">MODIFICATION DE L'ELEVE</h5>
            </div>
            <form action="{{route('responsablescolarite.inscriptions.update',$inscription->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row info-a">
                    <div class="col-md-6">
                        <div class="card-body">
                            <fieldset>
                                <legend><h6>INFORMATIONS PERSONNELLES</h6></legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="{{$inscription->eleve->nom}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{$inscription->eleve->prenom}}" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="dn">Date de Naissance</label>
                                        <input type="date" class="form-control" id="dn" name="date_naiss" value="{{$inscription->eleve->date_naiss}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ln">Lieu de Naissance</label>
                                        <input type="text" class="form-control" id="ln" name="lieu_naiss" value="{{$inscription->eleve->lieu_naiss}}" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" name="adresse" value="{{$inscription->eleve->adresse}}" required>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <fieldset>
                                <legend><h6>INFORMATIONS ADMINISTRATIVES</h6></legend>
                                <div class="row">
                                    {{-- <div class="col-md-6">
                                        <label for="">Salle</label>
                                        <select name="salle_id" id="" class="form-control">
                                            <option value="">CHOIX</option>
                                            @foreach ($salles as $salle)
                                            <option value="{{ $salle->id }}"> {{ $salle->abb }} / {{ $salle->niveau->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <label for="">Frais Mensuel</label>
                                        <input type="number" class="form-control" name="montant_inscri" placeholder="" value="{{$inscription->montant_inscri}}" required>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="">Montant inscription</label>
                                        <input type="number" class="form-control" name="montant_frais" placeholder="" value="{{$inscription->montant_frais}}" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <label for="image">Image</label>
                                        <input class="form-control" type="file" class="" id="image" name="image_uri" |size:5000>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <div class="row info-">
                    <div class="col-md-6">
                    <div class="card-body">
                        <fieldset>
                            <legend><h6>INFORMATIONS SUR LES PARENTS</h6></legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="npere">Nom du père</label>
                                    <input type="text" class="form-control" id="npere" name="nom_pere" placeholder="" value="{{$inscription->eleve->nom_pere}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tpere">Tel du père</label>
                                    <input type="text" class="form-control" id="tpere" name="tel_pere" value="{{$inscription->eleve->tel_pere}}" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="nmere">Nom de la mère</label>
                                    <input type="text" class="form-control" id="nmere" name="nom_mere" value="{{$inscription->eleve->nom_mere}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tmere">Tel de la mère</label>
                                    <input type="text" class="form-control" id="tmere" name="tel_mere" value="{{$inscription->eleve->tel_mere}}" required>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="card-body tuteur">
                            <fieldset>
                                <legend><h6>INFORMATIONS SUR LE TUTEUR</h6></legend>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ntuteur">Nom</label>
                                        <input type="text" class="form-control nom_tuteur" id="ntuteur" name="nom_tuteur" value="{{$inscription->eleve->nom_tuteur}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ttuteur">Téléphone</label>
                                        <input type="number" class="form-control tel_tuteur" id="ttuteur" name="tel_tuteur" value="{{$inscription->eleve->tel_tuteur}}" required>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="">Mot de Passe</label>
                                        <input type="password" class="form-control" id="" name="password" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ttuteur">Email</label>
                                        <input type="email" class="form-control" id="ttuteur" name="email_tuteur" value="{{$inscription->eleve->email_tuteur}}" required>
                                    </div>
                                </div>
                            </fieldset>
                            <label for="" class="mt-2">Classe Actuelle</label>
                            <input type="text" disabled class="form-control mb-2" name="" value="{{ $inscription->salle->name }} / {{ $inscription->salle->classe->name }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Classe</label>
                                    <select name="salle_id" id="" class="form-control" required>
                                        <option value="">CHOIX</option>
                                        @foreach ($salles as $salle)
                                        <option value="{{ $salle->id }}"> {{ $salle->abb }} / {{ $salle->classe->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">ENREGISTRER <i class="fa fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
