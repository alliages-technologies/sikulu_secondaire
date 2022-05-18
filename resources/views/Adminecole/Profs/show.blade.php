@extends('layouts.adminecole')


@section('title')
Profil Professeur | {{$prof->nom.' '.$prof->prenom}}
@endsection

@section('content')

<div class="container mt-4 col-md-6">
    <div class="card">
        <div class="card-header">
            <h2>{{$prof->nom.' '.$prof->prenom}}</h2>
        </div>
        <div class="card-body">
            <h4>INFORMATIONS SUR LE PROFESSEUR</h4>
            <hr>
            <p>
                Nom: <strong>{{$prof->nom}}</strong> <br>
                Prénom: <strong>{{$prof->prenom}}</strong> <br>
                Adresse: <strong>{{$prof->adresse}}</strong> <br>
                Téléphone: <strong>{{$prof->telephone}}</strong> <br>
                <hr>
                Dernier diplôme: <strong>{{$prof->diplome->name}}</strong>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{route('adminecole.profs.index')}}" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

@endsection
