@extends('layouts.adminecole')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Liste des inscriptions <i class="fa fa-users"></i> </h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th> Date d'inscription </th>
                    <th> Nom(s) & Prénom(s) </th>
                    <th> Classe </th>
                    <th> Action (s) </th>
                </thead>
                <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        @if(setlocale(LC_TIME, "fr_FR","French") && $date = strftime("%A %d %B %G", strtotime($inscription->created_at)))
                        <td> {{$date}} </td>
                        @else
                        <td> Date non pris en compte </td>
                        @endif
                        <td> {{$inscription->eleve_id?$inscription->eleve->nom:""}} {{$inscription->eleve_id?$inscription->eleve->prenom:""}} </td>
                        <td> {{$inscription->classe_id?$inscription->classe->name:""}} </td>
                        <td> <a href="{{ route('adminecole.inscriptions.show', $inscription->id) }}" class="btn btn-default btn-sm"> <i class="fa fa-eye"></i> </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $inscriptions->links() }}
            <a href="{{ route('adminecole.inscriptions.create') }}" class="btn btn-default float-right mr-2"> Inscription <i class="fa fa-user-plus"></i> </a>
        </div>
    </div>
</div>

@endsection
