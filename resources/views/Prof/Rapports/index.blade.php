@extends('layouts.prof')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>RAPPORT DE COURS <i class="fa fa-edit"></i></h2>
            <a href="" data-toggle="modal" data-target="#consulter" class="btn btn-sm btn-default float-right ml-2"> <i class="fa fa-edit"></i> </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm mt-4  ">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>SALLE</th>
                        <th>MATIERE</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rapport_cours as $rapport_cour)
                    <tr>
                        <td> {{$rapport_cour->created_at}} </td>
                        <td> {{$rapport_cour->salle->classe->name}} / {{$rapport_cour->salle->name}} </td>
                        <td> {{ $rapport_cour->pel->matiere->name }} </td>
                        <td> <a href="/profs/rapport-ecole-show/{{$ecole->token}}/{{$rapport_cour->id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="consulter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">Rapport de cour <i class="fa fa-edit"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('profs.rapports.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" placeholder="Titre" required>
                                </div>
                                <div class="col-md-6">
                                    <select name="appuie_id" id="" class="form-control">
                                        <option value="">Appuie de cours</option>
                                        @foreach ($appuie_cours as $appuie_cour)
                                            <option value="{{$appuie_cour->id}}">{{$appuie_cour->objet}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <select name="programme_ecole_ligne_id" id="" class="form-control" required>
                                        <option value="">Choix de la matiere</option>
                                        @foreach ($pes as $pe)
                                            @foreach ($pe->lpes->where('enseignant_id',$prof->id) as $pel)
                                            <option data-programme_ecole_ligne_id="{{$pel->id}}" value="{{$pel->id}}"> {{$pel->programmeecole->salle->name}} ({{$pel->programmeecole->salle->classe->niveau->abb}} {{$pel->programmeecole->salle->classe->name}}) / {{$pel->matieren}} </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="detail" id="" cols="30" rows="10" placeholder="Détail sur du cours"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default mt-3 btn-search"> <i class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
