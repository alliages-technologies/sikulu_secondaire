@extends('layouts.responsablescolarite')

@section('title')
Responsable Scolarité | Eleve
@endsection

@section('content')

<style>
    .card-primary.card-outline{
        border-top: 3px solid darkblue;
    }
</style>

<div class="container mt-5 col-md-10">
    <div class="card">
        <h1 class="m-4"> INFORMATIONS SUR L'ELEVE</h1>
        <hr>
        <section class="content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"src="{ asset($inscription->eleve->image_uri) }}" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">
                                    {{ $inscription->name }}
                                    <p class="text-muted text-center"> {{ $inscription->eleve->age }} ans</p>
                                </h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Classe:</b> <span class="float-right">{{ ($inscription->classe->name) }}</span> <br>
                                        <b>Adresse:</b> <span class="float-right">{{ ($inscription->eleve->adresse) }}</span>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-default btn-block" id="btn-modifier"><b><i class="fa fa-info"></i></b></a>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <div class="col-md-9">
                        <div class="card-body" id="card-body">
                            <h5 id="h5" style="letter-spacing: 1px;"> INFORMATIONS PERSONNELLES</h5>
                            <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend><h6>INFORMATIONS SUR LES PARENTS</h6></legend>
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="fonction">Père:</label>
                                            {{ $inscription->eleve->nom_pere }}
                                        </div>
                                        <div class="col-md">
                                            <label for="salaire"> <i class="fa fa-phone"></i> </label>
                                            {{ $inscription->eleve->tel_pere }}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md">
                                            <label for="contrat" class="">Mère</label>
                                            {{ $inscription->eleve->nom_mere }}
                                        </div>
                                        <div class="col-md">
                                            <label for="salaire"> <i class="fa fa-phone"></i> </label>
                                            {{ $inscription->eleve->tel_mere }}
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        <div class="col-md-6">
                            <fieldset>
                                <legend><h6>INFORMATIONS SUR LE TUTEUR</h6></legend>
                                <div class="row">
                                    <div class="col-md">
                                        <label for="fonction">Nom:</label>
                                        {{ $inscription->eleve->nom_tuteur }}
                                    </div>
                                    <div class="col-md">
                                        <label for="salaire"> <i class="fa fa-phone"></i> </label>
                                        {{ $inscription->eleve->tel_tuteur }}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <label for="contrat" class="">Email:</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


<script>
    $(document).ready(function () {

        //$('#card-body').hide();
        $('#btn-modifier').click(function (e) {
            e.preventDefault();
            var h5 = '';
            //$('#h5').html("");
            //$('#h5').append(h5);
            $('#card-body').toggle(900);
        });
    });
</script>


@endsection
