@extends('layouts.adminecole')


@section('title')
Admin Ecole | Programme
@endsection

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2> Programme de la {{ $salle->name }} <strong>|</strong> {{ $salle->classe->name }} </h2>
            <input type="hidden" name="classe_id" value="{{ $salle->id}}">
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th> MATIERE </th>
                        <th> COEFFICIENT </th>
                        <th> ENSEIGNANT </th>
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
                <h3 class="modal-title" id="exampleModalLabel">MODIFICATION PROF</h3>
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
                                    <th>MATIERE</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <label classe="mt-1" for="" name="prof_id">CHOIX DU PROF</label>
                        <select class="form-control profs">
                             <option>SELECTIONNEZ LE PROF</option>
                             @foreach ($pes as $pe )
                             <option value="{{ $pe->prof_id }}"> {{ $pe->prof->name }} </option>
                             @endforeach
                         </select>
                    </div>
                </div>
                <button class="btn btn-success mt-2 btn-save" id="btn-save"> <i class="fa fa-save"></i> </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/programmeecole.js') }}"></script>

@endsection
