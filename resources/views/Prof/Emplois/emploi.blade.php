@extends('layouts.prof')


@section('content')
<div class="container mt-5">
<div class="card">
    <div class="card-body">
        <input type="hidden" name="salle_id" value="{{ $salle->id }}">
            <h4>EMPLOIS DU TEMPS />  {{ $salle->classe->name }} </h4>
            <table class="table table-striped table-bordered mt-4 table-notes">
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
        </div>
    </div>
</div>

@endsection
