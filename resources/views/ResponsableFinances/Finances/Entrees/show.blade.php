@extends('layouts.responsablefinances')


@section('title')
Admin Ecole | Détails sur l'entrée
@endsection

@section('content')

<div class="container col-md-6 mt-4">
    <div class="card">
        <div class="card-header">
            <h2>{{$entree->name}}</h2>
        </div>
        <div class="card-body">
            <h4>INFORMATIONS SUR L'ENTREE</h4>
            <hr>
            <p>
                Catégorie: <strong>{{$entree->categorie->name}}</strong> <br>
                Montant: <strong>{{$entree->montant}} XAF</strong> <br>
                Description: <strong>{{$entree->description}}</strong> <br>
                <hr>
                Date: <strong>{{$entree->created_at->format('d/m/Y')}}</strong> <br>
                Semaine: <strong>{{$entree->semaine}}</strong> <br>
                Mois: <strong>{{$entree->month->name}}</strong> <br>
                Année: <strong>{{$entree->annee}}</strong>

            </p>
        </div>
        <div class="card-footer">
            <a href="{{route('responsablefinances.entrees.gestion')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

@endsection
