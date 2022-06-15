@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Suivi des paiements
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>
                SUIVI DES PAIEMENTS
                <form action="{{route('responsablefinances.suivi.search')}}" method="post" class="form-row mt-2 col-md-4">
                    @csrf
                    <div class="col">
                        <input type="date" name="dateDebut" id="dateDebut" class="form-control">
                    </div>
                    <div class="col">
                        <input type="date" name="dateFin" id="dateFin" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                </form>
            </h1>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
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
            <div>
                {{$paiements->links()}}
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/suiviPaiements.js')}}"></script>

@endsection
