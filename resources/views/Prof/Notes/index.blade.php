@extends('layouts.prof')


@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>GESTION DES NOTES</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm mt-4  ">
                <thead>
                    <tr>
                        <th>SALLE</th>
                        <th>CLASSE</th>
                        <th>MATIERE</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ligne_programme_ecoles as $ligne_programme_ecole)
                    <tr>
                        <td>{{ $ligne_programme_ecole->programmeecole->salle->name }}</td>
                        <td> {{ $ligne_programme_ecole->programmeecole->salle->classe->name }}</td>
                        <td>{{ $ligne_programme_ecole->matiere->name }}</td>
                        <td><a href="/profs/notes-by-inscription/{{ $ligne_programme_ecole->programmeecole->salle->token }}/{{ $ligne_programme_ecole->id }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
