@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Configuration Professeur
@endsection

@section('content')

<div class="container mt-4">
    <div class="card-header text-center mb-4">
        <h2>CONFIGURATION PROFESSEUR</h2>
    </div>
    <form action="/responsablescolarite/profs" method="post" enctype="multipart/form-data">
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
                            <button class="btn btn-default verifier1">VERIFIER</button>
                            <button class="btn btn-default suivant1">SUIVANT</button>
                            <button class="btn btn-success terminer1">TERMINER</button>
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
                                <input type="date" id="" name="date_naiss" class="form-control col-md date_naiss" required>
                            </div>
                            <div class="col">
                                <label for="">Lieu de naissance</label>
                                <input type="text" id="" name="lieu_naiss" class="form-control col-md lieu_naiss" required>
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
                            <button class="btn btn-default verifier2">VERIFIER</button>
                            <button class="btn btn-default suivant2">SUIVANT</button>
                            <button class="btn btn-success terminer2">TERMINER</button>
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
                <h4>ETAPE 3: NOUVEL ENREGISTREMENT</h4>
            </div>
            <div class="card-body col-md-8">
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
                <div class="form-group mt-1">
                    <label for="">Image</label>
                    <input type="file" id="" name="image" class="form-control col-md image" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-success terminer3"> ENREGISTRER</button>
                </div>
            </div>
        </div>
        <!--/etape3-->
    </form>
</div>

<script src="{{asset('js/configProf.js')}}"></script>

@endsection
