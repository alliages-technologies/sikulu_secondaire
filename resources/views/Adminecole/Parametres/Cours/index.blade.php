@extends('layouts.adminecole')


@section('title')
Admin Ecole | Cours
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES COURS
                <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SALLE</th>
                        <th>CLASSE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programmeecoles as $programmeecole)
                    <tr>
                        <td>{{$programmeecole->salle->name}}</td>
                        <td>{{$programmeecole->salle->classe->name}}</td>
                        <td><a href="{{route('adminecole.cours.show',$programmeecole->token)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
