@extends('layouts.admin');
@section('content')
<div class="card mt-5">
    <div class="card-header">
        @foreach($annee_acads as $annee_acad)
        <h4 class="text-left mb-1"> Liste de tous les élêves de l'année scolaire {{$annee_acad->annee1}}-{{$annee_acad->annee2}} </h4>
        @endforeach
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th> Nom et Prénom(s) </th>
                    <th> Classe </th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscriptions as $inscription)
                <tr>
                    <td> {{$inscription->eleve->nom}} {{$inscription->eleve->prenom}} </td>
                    <td> <a class="" href="/eleves/classe/{{$inscription->classe->id}}"> {{$inscription->classe->name}} {{$inscription->classe->serie->name}} </a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
