@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Détais sur la Dépense
@endsection

@section('content')

<div class="container col-md-6 mt-4">
    <div class="card">
        <div class="card-header">
            <h2>{{$depense->name}}</h2>
        </div>
        <div class="card-body">
            <p>
                Montant: <strong>{{$depense->montant}} XAF</strong> <br>
                Description: <strong>{{$depense->description}}</strong> <br>
                Catégorie: <strong>{{$depense->categorie->name}}</strong> <br>
                <hr>
                Date: <strong>{{$depense->created_at->format('d/m/Y')}}</strong> <br>
                <hr>
                Semaine: <strong>{{$depense->semaine}}</strong> <br>
                Mois: <strong>{{$depense->month->name}}</strong> <br>
                Année: <strong>{{$depense->annee}}</strong>
            </p>
        </div>
    </div>
</div>

@endsection
