@extends('layouts.adminecole')
@section('content')
<div class="card mt-5">

    <div class="card-header">
        <h4 class="text-left mb-1"> Programme de la {{ $salle->name }} <strong>/></strong> Niveau <strong>/></strong> {{ $salle->classe->name }} </h4>
    </div>
    <input type="hidden" name="classe_id" value="{{ $salle->id}}">
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-hover table-sm">
                <thead class="">
                    <tr>
                        <th> Matiere </th>
                        <th> Coefficient </th>
                        <th> Enseignant </th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programme_ecole->lpes as $lpe)
                    <tr>
                        <td> {{ $lpe->matiere->name }} </td>>
                        <td> {{ $lpe->coefficient }} </td>>
                        <td> {{ $lpe->enseignant?$lpe->enseignant->name:"Aucun" }} </td>>
                        <td> <button data-lpe="{{ $lpe->id }}" data-toggle="modal" data-target="#panier" class="btn btn-default btn-xs btn-edit"><i class="fa fa-edit"></i></button> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Ajouter un prof </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('superadmin.programmes-national.store')}}" method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <input type="hidden" name="" data-salle_id="{{ $salle->id }}" value="{{ $salle->id }}" class="salle">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-sm table-programme">
                            <thead>
                                <tr>
                                    <th>Matieres</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <label classe="mt-1" for="">Choix du prof</label>
                        <select class="form-control profs"> <option> choix </option> </select>
                    </div>
                </div>
                <button class="btn btn-default mt-2 btn-save" id="btn-save">Enrégistrer <i class="fa fa-save"></i> </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/programmeecole.js') }}"></script>
@endsection
