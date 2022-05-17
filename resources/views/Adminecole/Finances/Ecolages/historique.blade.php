@extends('layouts.adminecole')


@section('title')
Admin Ecole | Historique des paiements
@endsection

@section('content')

<div class="container mt-4 col-md-6">
    <div class="card">
        <div class="card-header">
            <h2>HISTORIQUE DES PAIEMENTS</h2>
        </div>
        <div class="card-body">
            <!--div class="form-row">
                <div class="col-10">
                    <select name="salle" id="salle" class="form-control">
                        <option value="">SELECTIONNEZ LA SALLE</option>
                        @foreach ($salles as $salle)
                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button id="afficher" class="btn btn-success">AFFICHER</button>
                </div>
            </div-->
            <hr>
            <table id="" class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ELEVES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salles as $salle)
                        @foreach ($salle->inscriptions as $inscription)
                        <tr>
                            <td>{{$inscription->eleve->name}}</td>

                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{asset('xxx/js/historiquePaiements.js')}}"></script>

@endsection
