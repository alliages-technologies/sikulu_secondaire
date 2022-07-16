@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Fiche de paiements
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                {{$inscription->eleve->name}}
                <a href="{{route('responsablefinances.historique.paiements')}}" style="float: right;" class="btn btn-sm btn-default"> HISTORIQUE DES PAIMENTS</a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>MONTANT</th>
                        <th>MOIS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscription->ecolages as $ecolage)
                    <tr>
                        <td>{{$ecolage->created_at->format('d/m/Y')}}</td>
                        <td>{{$ecolage->montant}} XAF</td>
                        <td>{{$ecolage->month}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
