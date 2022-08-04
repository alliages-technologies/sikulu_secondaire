@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Suivi des paiements
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                SUIVI DE TOUS LES PAIEMENTS
                <button style="float: right;" class="btn btn-default" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-search"></i> </button>
            </h2>
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
                        @elseif($paiement->type=="INSCRIPTION")
                        <td><a style="color: gray" href="#"><strong>{{$paiement->Fraisinsciption}}</strong> XAF</a></td>
                        @elseif($paiement->type=="DEPENSE")
                        <td><a style="color: black" href="{{route('responsablefinances.depenses.show', $paiement->depense->token)}}"><strong>{{$paiement->depense->montant}}</strong> XAF</a></td>
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


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card-header">
            <h4>FILTRER PAR DATE</h4>
        </div>
        <form action="{{route('responsablefinances.suivi.search')}}" method="post" >
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="col">
                        <label>Date début</label>
                        <input type="date" name="dateDebut" id="dateDebut" class="form-control">
                    </div>
                    <div class="col">
                        <label>Date fin</label>
                        <input type="date" name="dateFin" id="dateFin" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">RECHERCHER</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<script src="{{asset('js/suiviPaiements.js')}}"></script>

@endsection
