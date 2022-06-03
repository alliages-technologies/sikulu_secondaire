@extends('layouts.responsablefinances')


@section('title')
Admin Ecole | Détais sur la Dépense
@endsection

@section('content')

<div class="container col-md-6 mt-4">
    <div class="card">
        <div class="card-header">
            <h2>{{$depense->name}}</h2>
        </div>
        <div class="card-body">
            <h4>INFORMATIONS SUR LA DEPENSE</h4>
            <hr>
            <p>
                Catégorie: <strong>{{$depense->categorie->name}}</strong> <br>
                Montant: <strong>{{$depense->montant}} XAF</strong> <br>
                Description: <strong>{{$depense->description}}</strong> <br>
                <hr>
                Date: <strong>{{$depense->created_at->format('d/m/Y')}}</strong> <br>
                Semaine: <strong>{{$depense->semaine}}</strong> <br>
                Mois: <strong>{{$depense->month->name}}</strong> <br>
                Année: <strong>{{$depense->annee}}</strong>

            </p>
        </div>
        <div class="card-footer">
            <a href="{{route('responsablefinances.depenses.gestion')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

@endsection
