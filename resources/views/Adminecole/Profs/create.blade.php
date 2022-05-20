@extends('layouts.adminecole')

@section('title')
Admin Ecole | Configuration Professeur
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>CONFIGURATION PROFESSEUR</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <!--etape1-->
                <div class="card etape1">
                    <div class="card-header">
                        <h4>ETAPE 1: VERIFICATION PAR NUMERO DE TELEPHONE</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="left col-md-5">
                                <div class="form-group">
                                    <label for="">Numéro de téléphone</label>
                                    <input type="number" id="" name="phone" placeholder="242 xx xxx xx xx" class="form-control col-md-10 phone" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-info verifier1">VERIFIER</button>
                                    <button class="btn btn-sm btn-primary suivant1">SUIVANT</button>
                                    <button class="btn btn-sm btn-success terminer1">TERMINER</button>
                                </div>
                            </div>
                            <div class="right col-md-7 d-flex justify-content-center text-center">
                                <p class="p1">
                                    <!--Resultat de la vérification-->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--etape2-->
                <div class="card etape2">
                    <div class="card-header">
                        <h4>ETAPE 2: VERIFICATION AVEC LES INFORMATIONS PERSONNELLES</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="left col-md-7">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Nom</label>
                                        <input type="text" id="" name="nom" class="form-control col-md nom" required>
                                    </div>
                                    <div class="col">
                                        <label for="">Prénom</label>
                                        <input type="text" id="" name="prenom" class="form-control col-md prenom" required>
                                    </div>
                                </div>
                                <div class="form-row mt-1">
                                    <div class="col">
                                        <label for="">Date de naissance</label>
                                        <input type="date" id="" name="date_naiss" class="form-control col-md" required>
                                    </div>
                                    <div class="col">
                                        <label for="">Lieu de naissance</label>
                                        <input type="text" id="" name="lieu_naiss" class="form-control col-md" required>
                                    </div>
                                </div>
                                <div class="form-row mt-1">
                                    <div class="col">
                                        <label for="">Adrese</label>
                                        <input type="text" id="" name="adresse" class="form-control col-md adresse" required>
                                    </div>
                                </div>
                                <div class="form-row mt-1">
                                    <div class="col">
                                        <label for="">Dernier Diplome</label>
                                        <select name="diplome_id" id="" class="form-control col-md diplome_id" required>
                                            <option value="">Selectionnez le diplome</option>
                                            @foreach ($diplomes as $diplome)
                                            <option value="{{$diplome->id}}">{{$diplome->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <button class="btn btn-sm btn-info verifier2">VERIFIER</button>
                                    <button class="btn btn-sm btn-primary suivant2">SUIVANT</button>
                                    <button class="btn btn-sm btn-success terminer2">TERMINER</button>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <p class="text-center p2">
                                    <!--Contenu-->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--etape3-->
                <div class="card etape3">
                    <div class="card-header">
                        <h4>ETAPE 3</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="">Email</label>
                                        <input type="email" id="" name="email" class="form-control col-md email" required>
                                    </div>
                                    <div class="col">
                                        <label for="">Mot de passe</label>
                                        <input type="text" id="" name="password" class="form-control col-md password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!--label for="">Image</label>
                                    <input type="file" id="" name="" class="form-control col-md"-->
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-success terminer3">TERMINER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/etape3-->
            </form>
        </div>
    </div>
</div>

<script src="{{asset('js/configProf.js')}}"></script>

@endsection
