@extends('layouts.prof')
@section('content')
@csrf
<h4 class="text-center mt-4" style="letter-spacing: 2px">Notes /> {{ $salle->name }}</h4>
<input type="hidden" class="ligne_ecole_programme_id" value="{{ $ligne_programme_ecole }}" name="ligne_ecole_programme_id">

<div class="container">
    <h4>Saisie des notes de la {{ $salle->classe->name }} </h4>
    <table class="table table-striped table-bordered table-sm mt-4 table-notes">
        <thead>
            <tr>
                <th>Date de naissance</th>
                <th>Nom & Prénom (Eleve)</th>
                <th>Note/20</th>
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
    <div class="row">
        <div class="col-md 12">
            <select name="" id="" class="form-control trimestre_id">
                <option value="">Selectionner le trimestre</option>
                @foreach ($trimestre_ecoles as $trimestre_ecole)
                <option value="{{ $trimestre_ecole->trimestre->id }}">{{ $trimestre_ecole->trimestre->name }} ({{ $trimestre_ecole->trimestre->abb }})</option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-default btn-save mt-2 float-right">Enregistrer <i class="fa fa-save"></i></button>
</div>
<script src="{{ asset('js/note.js') }}"></script>
@endsection
