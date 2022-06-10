@extends('layouts.adminecole')


@section('title')
Admin Ecole | Horaires Salle
@endsection

@section('content')

<style>
    tr td {
        letter-spacing: 0px;
    }
    tr th {
        letter-spacing: 0px;
    }
</style>

<div class="container mt-4">
    <input type="hidden" name="salle_id" class="salle_id" value="{{ $salle }}">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES HORAIRES DE LA SALLE
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-sm btn-default float-right"> <i class="fa fa-plus-square"></i> </a>
            </h2>
        </div>
        <div class="card-body ">
            <div class="container-fluid">
                <table class="table table-bordered table-hover table-sm">
                    <thead class="">
                        <th> DATE </th>
                        <th> DESIGNATION </th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </thead>
                    <tbody>
                        @foreach($emploie_temps as $emploie_temp)
                        <tr>
                            <td> {{$emploie_temp->created_at->format('d/m/Y')}}</td>
                            <td> {{ $emploie_temp->name }} </td>
                            <td> <a href="{{ route('adminecole.emploies.show', $emploie_temp->token) }}"><i class="fa fa-eye"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                <form action="{{route('adminecole.emploies.store')}}" method="post" class="mb-4">
                    @csrf
                <div class="form-row mt-2">
                    <div class="col">
                        <label for="">Horaire</label>
                        <select name="tranche_id" id="" class="form-control tranche_id">
                            <option value="">Choix de la tranche horaire</option>
                            @foreach ($tranches as $tranche)
                            <option data-tranche="{{ $tranche->name }}" value="{{ $tranche->id }}">{{ $tranche->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="">Matière</label>
                        <select name="programme_ecole_ligne_id" id="" class="form-control programme_ecole_ligne_id">
                            <option value="">Choix de la matière</option>
                            @foreach ($programme_ligne_ecoles as $lpe)
                            <option data-matiere="{{ $lpe->matieren }}" data-prof="{{ $lpe->prof }}" value="{{ $lpe->id }}">{{ $lpe->matiere->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-default btn-add"><i class="fa fa-plus-square"></i></button>
                </div>
                <div class="mt-4">
                    <div class="">
                        <table class="table table-bordered table-striped table-sm table-emploi-temp">
                            <thead>
                                <tr>
                                    <th>Horaires</th>
                                    <th>Matières</th>
                                    <th>Profs</th>
                                    <th><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!---->
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-default mt-2 btn-save" id="btn-save">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="{{ asset('js/emploie.js') }}"></script>
@endsection
