@extends('layouts.adminecole')


@section('title')
Admin Ecole | Historique des paiements
@endsection

@section('content')

<div class="container mt-4 col-md-8">
    <div class="card">
        <div class="card-header">
            <h2>HISTORIQUE DES PAIEMENTS</h2>
        </div>
        <div class="card-body">
            <table id="" class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>MONTANT</th>
                        <th>MOIS</th>
                        <th>ELEVE</th>
                        <th>DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salles as $salle)
                        @foreach ($salle->inscriptions as $inscription)
                        @foreach ($inscription->ecolages as $ecolage)
                        <tr>
                            <td>{{$ecolage->montant}}</td>
                            <td>{{$ecolage->month}}</td>
                            <td>{{$ecolage->inscription->eleve->name}}</td>
                            <td>{{$ecolage->created_at->format('d/m/Y')}}</td>
                        </tr>
                        @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            {{$salles->links()}}
        </div>
    </div>
</div>

<script src="{{asset('xxx/js/historiquePaiements.js')}}"></script>

@endsection
