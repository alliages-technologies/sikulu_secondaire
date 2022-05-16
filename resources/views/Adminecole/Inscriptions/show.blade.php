@extends('layouts.adminecole')
@section('content')
<style>
    .card-primary.card-outline{
        border-top: 3px solid #243e55;
    }
</style>
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header" style="background-color: #243e55;color: white;">
            <h4 class="text-left">Information sur {{$inscription->name}} <i class="fa fa-user"></i> </h4>
        </div>
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                          <div class="col-md-3">
                              <div class="card card-primary card-outline">
                              <div class="card-body box-profile">
                                  <div class="text-center">
                                  <img class="profile-user-img img-fluid img-circle"src="{{ asset($inscription->eleve->image_uri) }}" alt="User profile picture">
                                  </div>
                                  <h3 class="profile-username text-center">{{ $inscription->name }}</h3>

                                  <p class="text-muted text-center"> {{ $inscription->date_naissance }} </p>

                                  <ul class="list-group list-group-unbordered mb-3">
                                  <li class="list-group-item">
                                      <b>Nom complet</b> <a class="float-right"> {{ $inscription->name }} </a>
                                  </li>
                                  <li class="list-group-item">
                                      <b>Classe</b> <a class="float-right"> {{ $inscription->salle->classe->name }} </a>
                                  </li>
                                  <li class="list-group-item">
                                      <b>Age</b> <a class="float-right"> {{ ($inscription->eleve->age) }} ans</a>
                                  </li>
                                  </ul>

                                  <a href="#" class="btn btn-default btn-block" id="btn-modifier"><b>...</b></a>
                              </div>
                              </div>
                          </div>

                          <div class="col-md-9">
                              <div class="card">
                                  <div class="card-header" style="background-color: #243e55; color: white; box-shadow: 8px 4px 6px 1px #717070;">
                                      <h5 id="h5" style="letter-spacing: 1px;"> Information sur mon profile <i class="fa fa-user"></i> </h5>
                                  </div>
                              <div class="card-body" id="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card" style="height:  ;">
                                            <div class="card-body">
                                                <fieldset>
                                                    <legend>Informations sur les parents</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="fonction">Nom du père</label>
                                                            {{ $inscription->eleve->nom_pere }}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="salaire">Teléphone : </label>
                                                            {{ $inscription->eleve->tel_pere }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label for="contrat" class="">Nom de la mère</label>
                                                            {{ $inscription->eleve->nom_mere }}
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
                                                    <legend>Informations sur le tuteur</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="fonction">Nom du tuteur </label>
                                                            {{ $inscription->eleve->nom_tuteur }}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="salaire"> Teléphone </label>
                                                            {{ $inscription->eleve->tel_tuteur }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label for="contrat" class="">Email</label>

                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              </div>
                              </div>
                          </div>
                          </div>
                      </div>
                  </div>
                </div>
              </section>

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
        </div>
    </div>
</div>
@endsection
