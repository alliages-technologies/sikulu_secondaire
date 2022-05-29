@extends('layouts.prof')


@section('content')
<h4 class="text-center mt-4" style="letter-spacing: 2px">Notes /> {{ $salle->name }}</h4>
<input type="hidden" name="salle_id" value="{{ $salle->id }}">
<div class="container">
    <h4>Liste des emplois du temps de la {{ $salle->classe->name }} </h4>
    <table class="table table-striped table-bordered table-sm mt-4 table-notes">
        <thead>
            <tr>
                <th>Date</th>
                <th>Désignation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emplois as $emploi)
            <tr>
                <td>{{ $emploi->created_at->format('d-m-Y') }}</td>
                <td>{{ $emploi->name }}</td>
                <td><a href="/profs/show-emploi-by-salle/{{ $emploi->salle->token }}/{{ $emploi->id }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
