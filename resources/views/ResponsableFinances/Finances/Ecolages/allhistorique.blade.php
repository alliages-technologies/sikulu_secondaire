@extends('layouts.form')


@section('title')
Responsable Finances | Historique global ecolage
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
            <div class="form-row">
                <div class="col">
                    <select name="salle" id="salle" class="form-control">
                        <option>SALLES</option>
                        @foreach ($salles as $salle)
                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="selectionEleve" class="col">
                    <select name="inscriptions" id="inscriptions" class="form-control">
                        <!-- options -->
                    </select>
                </div>
                <div class="col">
                    <select name="month" id="month" class="form-control">
                        <option>MOIS</option>
                        @foreach ($mois as $month)
                        <option value="{{$month->id}}">{{$month->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!--div class="mt-4">
                <table id="resultats" class="table table-sm table-bordered table-striped">
                    <thead>
                        <th>ELEVES</th>
                    </thead>
                    <tbody >
                        ...
                    </tbody>
                </table>
            </div-->
        </div>
    </div>
</div>

<script src="{{asset('js/historiqueGlobalEcolage.js')}}"></script>
@endsection
