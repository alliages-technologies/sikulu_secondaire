@extends('layouts.prof')


@section('content')


<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="text-left mb-3" style="letter-spacing: 2px">EMPLOI DU TEMPS /> SALLES</h4>
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Salle</th>
                        <th>Classe</th>
                        <th>Matière</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pes as $pe)
                    @foreach ($pe->lpes->where('enseignant_id',$prof->id) as $pel)
                    <tr>
                        <td>{{ $pe->salle->name}}</td>
                        <td> {{ $pe->salle->classe->name }}</td>
                        <td>{{ $pel->matiere->name }}</td>
                        <td><a href="/profs/emploi-by-salle/{{ $pe->salle->token}}/{{ $pel->id }}" class="btn btn-default btn-xs col-md-3 m-2"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
