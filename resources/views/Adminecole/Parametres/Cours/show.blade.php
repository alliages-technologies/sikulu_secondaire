@extends('layouts.adminecole')


@section('title')
Admin Ecole | Programme {{ $programmeecole->salle->name }}
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES COURS DE LA {{ $programmeecole->salle->classe->name }}
                <input type="hidden" name="classe_id" value="">
                <button class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#nouveauCours"> <i class="fa fa-plus-circle"></i> NOUVEAU COURS </button>
            </h2>
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
                    @foreach ($pels as $lpe)
                    <tr>
                        <td> {{ $lpe->matiere->name }} </td>
                        <td> {{ $lpe->coefficient }} </td>
                        <td> {{ $lpe->enseignant?$lpe->enseignant->name:"Aucun" }} </td>
                        <td> <button type="button" data-toggle="modal" data-target="#exampleModal" data-lpe="{{ $lpe->id }}"  class="btn btn-default btn-xs btn-edit"><i class="fa fa-edit"></i></button> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal ajout d'un cours -->
<div class="modal fade" id="nouveauCours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">NOUVEAU COURS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('adminecole.cours.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="programme_ecole_id" value="{{ $programmeecole->id }}">
                    <div class="form-group">
                        <label for="">Matière</label>
                        <select name="matiere_id" id="" class="form-control" required>
                            <option value="">choix de la Matière</option>
                            @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}">{{ $matiere->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Enseignant</label>
                        <select name="enseignant_id" id="" class="form-control" required>
                            <option value="">choix de l'enseignant</option>
                            @foreach ($prof_ecoles as $prof_ecole)
                            <option value="{{ $prof_ecole->prof->id }}">{{ $prof_ecole->prof->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Coéfficient</label>
                        <input name="coefficient" type="number" class="form-control" placeholder="saisie du coéfficient" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">ANNULER</button>
                    <button type="submit" class="btn btn-sm btn-success">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="hidden" name="" data-salle_id="{{ $programmeecole->salle->id }}" value="{{ $programmeecole->salle->id }}" class="salle">
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
                             @foreach ($prof_ecoles as $prof_ecole )
                             <option value="{{ $prof_ecole->prof->id }}"> {{ $prof_ecole->prof->name }} </option>
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
