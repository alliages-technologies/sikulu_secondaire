@extends('layouts.adminecole')


@section('title')
Admin Ecole | Gestion des professeurs
@endsection

@section('content')

<style>
</style>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>GESTION DES PROFESSEURS</h4>
            <button type="button" class="btn btn-sm btn-success col-1" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>DERNIER DIPLOME</th>
                        <th>
                            <i class="fa fa-gear"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profs as $prof)
                    <tr>
                        <td>{{$prof->nom}}</td>
                        <td>{{$prof->prenom}}</td>
                        <td>{{$prof->diplome? $prof->diplome->name:"_"}}</td>
                        <td>
                            <i class="fa fa-eye btn btn-info"></i>
                            <i class="fa fa-edit btn btn-warning"></i>
                        </td>
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
                <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION D'UN PROF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('adminecole.profs.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nom du professeur" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" placeholder="Numéro de téléphone" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" placeholder="Mot de passe" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Suivant</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
