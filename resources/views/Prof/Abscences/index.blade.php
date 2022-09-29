@extends('layouts.prof')


@section('title')
PROF | Salles
@endsection

@section('content')
@if ($errors->any())
    <div
        class="alert alert-info"> {{$errors->first()}}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-door-open"></i> | GESTION DES ABSCENCES
                <a href="" data-toggle="modal" data-target="#consulter" class="btn btn-sm btn-default float-right ml-2"> <i class="fa fa-eye"></i> </a>
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-sm btn-default float-right"> <i class="fa fa-pen"></i> </a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th>SALLE</th>
                    <th>CLASSE</th>
                    <th>ELEVES</th>
                    <th>COURS</th>
                    <th>DATE</th>
                </thead>
                <tbody>
                    @foreach ($abscences as $abscence)
                    <tr>
                        <td>{{ $abscence->salle->name }}</td>
                        <td>{{ $abscence->salle->classe->niveau->abb }}</td>
                        <td>{{ $abscence->inscription->eleve->name }}</td>
                        <td>{{ $abscence->pel->matiere->name }}</td>
                        <td>{{ $abscence->jour }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $abscences->links() }}
</div>


<!-- Abscences -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">Sélection des abscents</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('profs.abscences.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <select name="salle_id" id="" class="form-control salle">
                                        <option value="">Choix de la salle et du cours</option>
                                        @foreach ($pes as $pe)
                                        @foreach ($pe->lpes->where('enseignant_id',$prof->id) as $pel)
                                        <option data-programme_ecole_ligne_id="{{$pel->id}}" value="{{$pel->programmeecole->salle->id}}"> {{$pel->programmeecole->salle->name}} ({{$pel->programmeecole->salle->classe->niveau->abb}} {{$pel->programmeecole->salle->classe->name}}) / {{$pel->matieren}} </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <input type="date" name="jour" id="jour" class="form-control jour">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <table class="table table-sm table-bordered abscences">
                                        <thead>
                                            <tr>
                                                <th>Nom & Prénom</th>
                                                <th><b style="color: red" class="fa fa-check"></b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button class="btn btn-success mt-3 btn-save">ENREGISTRER </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Abscences recherche -->
<div class="modal fade" id="consulter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">Consultation des abscences <i class="fa fa-search"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('surveillants.recherche')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <input type="date" name="day" id="day" class="form-control day">
                                </div>
                                <div class="col-md-6">
                                    <select name="classe" id="" class="form-control classe">
                                        <option value="">Choix de la salle</option>
                                        @foreach ($salles as $salle)
                                        <option value="{{$salle->id}}"> {{$salle->name}} ({{$salle->classe->niveau->abb}}) </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default mt-3 btn-search"> <i class="fa fa-search"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
