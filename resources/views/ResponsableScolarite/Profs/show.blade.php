@extends('layouts.responsablescolarite')


@section('title')
Profil Professeur | {{$prof->nom.' '.$prof->prenom}}
@endsection

@section('content')

<div class="container mt-4 col-md-6">
    <div class="card">
        <div class="card-header">
            <h2>
                {{$prof->nom.' '.$prof->prenom}}
                <!--a href="#" style="float: right;"><i class="fa fa-edit btn btn-default"></i></a-->
            </h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img style="height: 200px; width: 200px;" src="{{asset($prof->image)}}" alt="">
            </div>
            <p>
                Nom(s): <strong>{{$prof->nom}}</strong> <br>
                Prénom(s): <strong>{{$prof->prenom}}</strong> <br>
                Date & lieu de naissance: <strong>{{$prof->date_naiss}} à {{$prof->lieu_naiss}}</strong> <br>
                <hr>
                Adresse: <strong>{{$prof->adresse}}</strong> <br>
                Téléphone: <strong>{{$prof->telephone}}</strong> <br>
                Email: <strong>{{$prof->user->email}}</strong> <br>
                <hr>
                Dernier diplôme: <strong>{{$prof->diplome->name}}</strong>
            </p>
        </div>
        <div class="card-footer">
            <a href="{{route('responsablescolarite.profs.index')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
</div>

@endsection
