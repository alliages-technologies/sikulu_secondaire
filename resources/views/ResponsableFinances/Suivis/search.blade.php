@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Suivi des paiements
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>
                Paiements allant du {{$dateDebut}} au {{$dateFin}}
            </h1>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>MONTANT</th>
                        <th>TYPE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paiements as $paiement)
                    <tr>
                        <td>{{$paiement->created_at->format('d/m/Y')}}</td>
                        @if ($paiement->type=="ECOLAGE")
                        <td><a href="#"><strong>{{$paiement->ecolage->montant}}</strong> XAF</a></td>
                        @elseif($paiement->type=="DEPENSE")
                        <td><a style="color: gray" href="{{route('responsablefinances.depenses.show', $paiement->depense->token)}}"><strong>{{$paiement->depense->montant}}</strong> XAF</a></td>
                        @elseif($paiement->type=="AUTRE ENTREE")
                        <td><a style="color: green" href="{{route('responsablefinances.entrees.show', $paiement->entree->token)}}"><strong>{{$paiement->entree->montant}}</strong> XAF</a></td>
                        @endif
                        <td>{{$paiement->type}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
