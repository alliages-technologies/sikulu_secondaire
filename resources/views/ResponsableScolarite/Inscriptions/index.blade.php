@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Inscriptions
@endsection

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>
                LISTE DES INSCRIPTIONS
                <a href="/home" style="float: right" class="btn btn-sm btn-default ml-2">RETOUR</a>
                <a href="{{ route('responsablescolarite.inscriptions.create') }}" class="btn btn-sm btn-default float-right"><i class="fa fa-user-plus"></i> </a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th> DATE </th>
                    <th> CLASSE </th>
                    <th> NOM(S) & PRENOM(S) </th>
                    <th> <i class="fa fa-gear"></i> </th>
                </thead>
                <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        @if(setlocale(LC_TIME, "fr_FR","French") && $date = strftime("%A %d %B %G", strtotime($inscription->created_at)))
                        <td> {{$date}} </td>
                        @else
                        <td> Date non pris en compte </td>
                        @endif
                        <td> {{$inscription->classe_id?$inscription->classe->name:""}} </td>
                        <td> {{$inscription->eleve_id?$inscription->eleve->nom:""}} {{$inscription->eleve_id?$inscription->eleve->prenom:""}} </td>
                        <td> <a href="{{ route('responsablescolarite.inscriptions.show', $inscription->token) }}" class="btn btn-sm"> <i class="fa fa-eye"></i> </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $inscriptions->links() }}
        </div>
    </div>
</div>

@endsection
