@extends('layouts.admin');
@section('content')
<div class="container-fluid">
    <div class="card mt-5 card-dark">
        <div class="card-header">
            <h3 class="text-left">Enrégistrement d'un élêve <i class="fa fa-user-graduate"></i></h3>
        </div>
        <div class="card-body cb">
            <div class="">
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
                        <div class="col-md-3 mt-4">
                            <label for="image">Image</label>
                            <input type="file" class="" id="image" name="image_uri" |size:5000>
                        </div>
                    </div>
                </div>
                    <button class="btn btn-success mt-3">Enrégistrer <i class="fa fa-save"></i></button>
                    <i type="button" class="fa fa-cog fa-spin float-right mt-3 fa-2x" data-toggle="modal" data-target="#exampleModal"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Information <i class="fa fa-info"></i></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> Pour éffectuer une inscription veuillez remplir attentivement tous les champs de façon
                                    respective, après celà il y aura un autre formulaire pour finaliser l'inscription.
                                    Merci...! <i class="fa fa-smile-wink"></i>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
