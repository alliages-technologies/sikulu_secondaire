@extends('layouts.prof')


@section('content')
@csrf
<input type="hidden" class="ligne_ecole_programme_id" value="{{ $ligne_programme_ecole }}" name="ligne_ecole_programme_id">

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h2>SAISIE DES NOTES DE LA <strong>{{$salle->classe->name}}</strong> </h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm  table-notes">
                <thead>
                    <tr>
                        <th>DATE DE NAISSANCE</th>
                        <th>ELEVES</th>
                        <th>NOTES /20</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscriptions as $inscription)
                    <tr data-ligne_inscription="{{ $inscription->id }}">
                        <td>{{ $inscription->eleve->date_naiss }}</td>
                        <td>{{ $inscription->eleve->name }}</td>
                        <td contenteditable="true"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <select name="" id="" class="form-control trimestre_id">
                <option value="">Sélectionner le trimestre pour enregistrer les notes saisies</option>
                @foreach ($trimestre_ecoles as $trimestre_ecole)
                <option value="{{ $trimestre_ecole->trimestre->id }}">{{ $trimestre_ecole->trimestre->name }} ({{ $trimestre_ecole->trimestre->abb }})</option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-default btn-save float-right mt-2"><i class="fa fa-save"></i> ENREGISTRER</button>
</div>

@endsection
