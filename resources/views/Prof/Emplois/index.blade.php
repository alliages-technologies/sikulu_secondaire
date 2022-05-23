@extends('layouts.prof')
@section('content')

<h4 class="text-center mt-4" style="letter-spacing: 2px">Emploi du temps /> Salles</h4>

<div class="container">

    <table class="table table-striped table-bordered table-sm mt-4  ">
        <thead>
            <tr>
                <th>Salle</th>
                <th>Classe</th>
                <th>Matière</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ligne_programme_ecoles as $ligne_programme_ecole)
            <tr>
                <td>{{ $ligne_programme_ecole->programmeecole->salle->name }}</td>
                <td> {{ $ligne_programme_ecole->programmeecole->salle->classe->name }}</td>
                <td>{{ $ligne_programme_ecole->matiere->name }}</td>
                <td><a href="/profs/emploi-by-salle/{{ $ligne_programme_ecole->programmeecole->salle->token }}/{{ $ligne_programme_ecole->id }}" class="btn btn-default btn-xs col-md-3 m-2"><i class="fa fa-eye"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
