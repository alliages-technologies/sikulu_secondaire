@extends('layouts.superadmin')


@section('title')
Superadmin | {{$ecole->name}}
@endsection

@section('content')

<div class="container mt-4 col-md-8">
    <div class="card">
        <div class="card-header">
            <h2>
                {{$ecole->name}}
                <button style="float: right;" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <img src="{{$ecole->image_uri}}" alt="">
            <span>
                <h5>INFORMATIONS SUR L'ECOLE</h5>
                Nom: <strong>{{$ecole->name}}</strong> <br>
                Adresse: <strong>{{$ecole->address}}</strong> <br>
                Téléphone: <strong>{{$ecole->phone}}</strong> <br>
                Email: <strong>{{$ecole->email}}</strong> <br>
                Type d'enseignement: <strong>{{$ecole->type->name}}</strong>
            </span>
            <hr>
            <span>
                <h5>INFORMATIONS SUR L'ADMIN</h5>
                Nom: <strong>{{$ecole->user->name}}</strong> <br>
                Email: <strong>{{$ecole->user->email}}</strong> <br>
            </span>
        </div>
    </div>
</div>

@endsection
