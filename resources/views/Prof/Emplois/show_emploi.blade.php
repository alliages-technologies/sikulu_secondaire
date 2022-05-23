@extends('layouts.prof')
@section('content')
@csrf
<h4 class="text-center mt-4" style="letter-spacing: 2px">Notes /> {{ $salle->name }}</h4>
<div class="container">
    <h4>Saisie des notes de la {{ $salle->classe->name }} </h4>
    <table class="table table-striped table-bordered table-sm mt-4 table-notes">
        <thead>
            <tr>
                <th>Désignation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emploi->lets as $emploi)
            <tr>
                <td>{{ $emploi->tranche->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
