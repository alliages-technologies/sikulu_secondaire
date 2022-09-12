@extends('layouts.superadmin')


@section('title')
Superadmin | Programmes Nationals
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES PROGRAMMES NATIONAUX
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-sm btn-default float-right"> <i class="fa fa-plus-circle"></i> </a>
            </h2>
        </div>
        <div class="card-body ">
            <table class="table table-sm table-bordered table-striped">
                <thead class="">
                    <th> CLASSE </th>
                    <th> TYPE D'ENSEIGNEMENT </th>
                    <th> <i class="fa fa-cog"></i> </th>
                </thead>
                <tbody>
                @foreach($programmes_national as $programme)
                    <tr>
                        <td> {{$programme->classe->name}} </td>
                        <td> {{$programme->enseignement->name}} </td>
                        <td> <a href="{{ route('superadmin.programmes-national.show',$programme->id) }}" class="btn btn-sm"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $programmes_national->links() }}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">NOUVEAU PROGRAMME</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('superadmin.programmes-national.store')}}" method="post" class="mb-4">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <select name="classe_id" id="" class="form-control classe_id">
                                <option>Choix de la classe</option>
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
                    <div class="form-row mt-2">
                        <div class="col">
                            <select name="matiere_id" id="" class="form-control matiere_id">
                                <option value="">Choix de la matiere</option>
                                @foreach ($matieres as $matiere)
                                <option value="{{ $matiere->id }}" data-matiere_id="{{ $matiere->id }}" data-matiere="{{ $matiere->name }}">{{ $matiere->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control coefficient" name="coefficient" placeholder="Coefficient">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button id="btn-add" class="btn btn-default"><i class="fa fa-plus-circle"></i></button>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-sm table-programme">
                                <thead>
                                    <tr>
                                        <th>MATIERE</th>
                                        <th>COEFFICIENT</th>
                                        <th><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!---->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mt-2" id="btn-save">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/programmenational.js') }}"></script>
@endsection
