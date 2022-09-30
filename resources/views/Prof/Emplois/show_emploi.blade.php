@extends('layouts.prof')
@section('content')
@csrf
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h4>EMPLOIS DU TEMPS />  {{ $salle->classe->name }} </h4>
            <table class="table table-striped table-bordered table-sm mt-4 table-notes">
                <thead>
                    <tr>
                        <th>HEURE</th>
                        <th>JOURS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emploi->lets as $emploi)
                    <tr>
                        <td>{{ $emploi->tranche->name }}</td>
                        <td>{{ $emploi->day->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
