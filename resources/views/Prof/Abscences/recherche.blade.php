@extends('layouts.surveillant')


@section('title')
Admin Ecole | Salles
@endsection

@section('content')
@if ($errors->any())
    <div
        class="alert alert-info"> {{$errors->first()}}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-door-open"></i> | RESULTAT DE LA RECHERCHE
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th>SALLE</th>
                    <th>CLASSE</th>
                    <th>ELEVES</th>
                    <th>DATE</th>
                </thead>
                <tbody>
                    @foreach ($abscences as $abscence)
                    <tr>
                        <td>{{ $abscence->salle->name }}</td>
                        <td>{{ $abscence->salle->classe->niveau->abb }}</td>
                        <td>{{ $abscence->inscription->eleve->name }}</td>
                        <td>{{ $abscence->jour }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h6 class="mt-3 text-left"> {{$abscences->count()}} résultat(s) trouvé(s) sur votre recherche </h6>
        </div>
    </div>
</div>
@endsection
