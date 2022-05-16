@extends('layouts.adminecole')
@section('content')

<style>
    tr td {
        letter-spacing: 0px;
    }
    tr th {
        letter-spacing: 0px;
    }
</style>

<input type="hidden" name="salle_id" class="salle_id" value="{{ $salle }}">
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Emploi du Temps </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-hover table-sm">
                <thead class="">
                    <th> Date </th>
                    <th> Désignation </th>
                    <th> <i class="fa fa-cog"></i> </th>
                </thead>
                <tbody>
                    @foreach($emploie_temps as $emploie_temp)
                    <tr>
                        <td> {{$emploie_temp->created_at->format('Y-m-d')}}</td>
                        <td> {{ $emploie_temp->name }} </td>
                        <td> <a href="{{ route('adminecole.emploies.show',$emploie_temp->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-default float-right">Nouveau <i class="fa fa-plus-square"></i> </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Nouveau Programme </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('adminecole.emploies.store')}}" method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-5">
                        <select name="tranche_id" id="" class="form-control tranche_id">
                            <option value="">Choix de la tranche horaire</option>
                            @foreach ($tranches as $tranche)
                            <option data-tranche="{{ $tranche->name }}" value="{{ $tranche->id }}">{{ $tranche->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select name="programme_ecole_ligne_id" id="" class="form-control programme_ecole_ligne_id">
                            <option value="">Choix de la matière</option>
                        @foreach ($programme_ligne_ecoles as $lpe)
                            <option data-matiere="{{ $lpe->matieren }}" data-prof="{{ $lpe->prof }}" value="{{ $lpe->id }}">{{ $lpe->matiere->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-default btn-add"><i class="fa fa-plus-square"></i></button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-sm table-emploi-temp">
                            <thead>
                                <tr>
                                    <th>Tranche Horaire</th>
                                    <th>Matière</th>
                                    <th>Prof</th>
                                    <th><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-default mt-2 btn-save" id="btn-save">Enrégistrer <i class="fa fa-save"></i> </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="{{ asset('js/emploie.js') }}"></script>
@endsection
