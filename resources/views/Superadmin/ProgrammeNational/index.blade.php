@extends('layouts.superadmin')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Programme-National </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-hover table-sm">
                <thead class="">
                    <th> Classe </th>
                    <th> Enseignement </th>
                    <th> <i class="fa fa-cog"></i> </th>
                </thead>
                <tbody>
                    @foreach($programmenationals as $programmenational)
                    <tr>
                        <td> {{$programmenational->classe->name}} </td>
                        <td> {{$programmenational->enseignement->name}} </td>
                        <td> <a href="{{ route('superadmin.programmenationals.show',$programmenational->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $programmenationals->links() }}
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
                        <form action="{{route('superadmin.programmenationals.store')}}" method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select name="classe_id" id="" class="form-control classe_id">
                            <option value="">Choix de la classe</option>
                            @foreach ($classes as $classe)
                            <option data-classe_id="{{ $classe->id }}" value="{{ $classe->id }}">{{ $classe->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="enseignement_id" id="" class="form-control enseignement_id">
                            <option value="">Choix de l'enseignement</option>
                            @foreach ($enseignements as $enseignement)
                            <option data-enseignement_id="{{ $enseignement->id }}" value="{{ $enseignement->id }}">{{ $enseignement->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-8">
                        <select name="matiere_id" id="" class="form-control matiere_id">
                            <option value="">Choix de la matiere</option>
                            @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" data-matiere_id="{{ $matiere->id }}" data-matiere="{{ $matiere->name }}">{{ $matiere->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control coefficient" name="coefficient" placeholder="Coefficient">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-default btn-add"><i class="fa fa-plus-square"></i></button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-sm table-programme">
                            <thead>
                                <tr>
                                    <th>Matiere</th>
                                    <th>Coéfficient</th>
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
<script src="{{ asset('js/programmenational.js') }}"></script>
@endsection
