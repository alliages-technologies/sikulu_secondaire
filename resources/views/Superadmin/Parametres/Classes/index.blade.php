@extends('layouts.superadmin')


@section('title')
Superadmin | Classes
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                CONFIGURATION DES CLASSES
                <button style="float: right" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIVEAU</th>
                        <th>SERIE</th>
                        <th>ENGEIGNEMENT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $classe)
                    <tr>
                        <td>{{$classe->niveau->name}}</td>
                        <td>{{$classe->serie->name}}</td>
                        <td>{{$classe->enseignement_id? $classe->serie->type->name:"-"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION D'UNE NOUVELLE CLASSE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('superadmin.classes.store')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <select name="serie_id" id="" class="form-control">
                            <option value="">SERIE</option>
                            @foreach ($series as $serie)
                            <option value="{{$serie->id}}">{{$serie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="niveau_id" id="" class="form-control">
                            <option value="">NIVEAU</option>
                            @foreach ($niveaux as $niveau)
                            <option value="{{$niveau->id}}">{{$niveau->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="enseignement_id" id="" class="form-control">
                            <option value="">TYPE D'ENSEIGNEMENT</option>
                            @foreach ($enseignements as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                    <button type="submit" class="btn btn-success">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
