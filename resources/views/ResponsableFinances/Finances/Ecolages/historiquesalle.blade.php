@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Historique des paiements de la salle
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>HISTORIQUE DES PAIEMENTS | {{$salle->classe->name}} </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ELEVE</th>
                        <th>FRAIS MENSUEL</th>
                        <th>MOIS PAYES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscriptions as $inscription)
                    <tr>
                        <td> <a href="{{route('responsablefinances.historique.piements.eleve', $inscription->token)}}">{{$inscription->eleve->name}}</a> </td>
                        <td>{{$inscription->montant_frais}} XAF</td>
                        <td>{{$inscription->ecolages->count()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$inscriptions->links()}}
        </div>
    </div>
</div>

@endsection
