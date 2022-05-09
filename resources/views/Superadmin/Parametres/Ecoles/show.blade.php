@extends('layouts.superadmin')


@section('content')


<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Informations sur {{$ecole->name}}</h4>
            <button type="button" class="btn btn-sm btn-success col-1">
                <i class="fa fa-edit"></i>
            </button>
        </div>
        <div class="card-body">
            <img src="{{$ecole->image_uri}}" alt="">
            <div>
                <p>
                    <h5>INFORMATIONS SUR L'ECOLE</h5>
                    Nom: <strong>{{$ecole->name}}</strong> - Adresse: <strong>{{$ecole->address}}</strong> - Téléphone: <strong>{{$ecole->phone}}</strong> - Email: <strong>{{$ecole->email}}</strong> - Type d'enseignement: <strong>{{$ecole->type->name}}</strong> <br>
                </p>
            </div>
            <div>
                <p>
                    <h5>INFORMATIONS SUR L'ADMIN</h5>
                    Nom: <strong>{{$ecole->user->name}}</strong> <br>
                    Email: <strong>{{$ecole->user->email}}</strong> <br>
                    Role: <strong>{{$ecole->user->role->name}}</strong> <br>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection