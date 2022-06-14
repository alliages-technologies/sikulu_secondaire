@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Détails sur l'entrée
@endsection

@section('content')

<div class="container col-md-6 mt-4">
    <div class="card">
        <div class="card-header">
            <h2>{{$entree->name}}</h2>
        </div>
        <div class="card-body">
            <p>
                Montant: <strong>{{$entree->montant}} XAF</strong> <br>
                Description: <strong>{{$entree->description}}</strong> <br>
                Catégorie: <strong>{{$entree->categorie->name}}</strong> <br>
                <hr>
                Date: <strong>{{$entree->created_at->format('d/m/Y')}}</strong> <br>
                <hr>
                Semaine: <strong>{{$entree->semaine}}</strong> <br>
                Mois: <strong>{{$entree->month->name}}</strong> <br>
                Année: <strong>{{$entree->annee}}</strong>

            </p>
        </div>
    </div>
</div>

@endsection
