@extends('layouts.adminecole')


@section('content')
@csrf

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h4> <strong> MODIFICATION </strong> DES NOTES DU <strong> {{ $trimestre_ecole->trimestre->name }} </strong> DE LA <strong>{{$salle->classe->name}}</strong> </h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm  table-notes">
                <thead>
                    <tr>
                        <th>DATE DE NAISSANCE</th>
                        <th>ELEVES</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscriptions as $inscription)
                    <tr>
                        <td>{{ $inscription->eleve->date_naiss }}</td>
                        <td>{{ $inscription->eleve->name }}</td>
                        <td> <a href="/adminecole/notes/inscription/{{$salle->token}}/{{$inscription->id}}/{{$trimestre_ecole->id}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
