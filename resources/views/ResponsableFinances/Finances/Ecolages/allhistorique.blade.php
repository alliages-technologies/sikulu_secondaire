@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Suivi des paiements
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                HISTORIQUE GLOBAL DES PAIEMENTS DES FRAIS D'ECOLAGE
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>MONTANT</th>
                        <th>ELEVE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($paiements as $paiement)
                        <td>{{$paiement->ecolage->created_at->format('d/n/Y')}}</td>
                        <td>{{$paiement->ecolage->montant}} XAF</td>
                        <td>{{$paiement->ecolage->inscription->eleve->name}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <div>
            </div>
        </div>
    </div>
</div>
@endsection
