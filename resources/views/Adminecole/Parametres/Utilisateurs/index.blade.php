@extends('layouts.adminecole')


@section('title')
Admin Ecole | Configuration des utilisateurs
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                CONFIGURATION DES UTILISATEURS
                <button class="btn btn-sm btn-default float-right ml-2" data-toggle="modal" data-target="#responsableFinances"><i class="fa fa-user-plus"></i> RESPONSABLE FINANCES</button>
                <button class="btn btn-sm btn-default float-right" data-toggle="modal" data-target="#responsableScolarite"><i class="fa fa-user-plus"></i> RESPONSABLE SCOLARITE</button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <th>NOM</th>
                    <th>ROLE</th>
                    <th><i class="fa fa-gear"></i></th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role->name}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal Responsable Finances -->
<div class="modal fade" id="responsableFinances" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">NOUVEAU RESPONSABLE DES FINANCES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('adminecole.responsable.finances.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nom Complet</label>
                        <input type="text" name="name" id="" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone</label>
                        <input type="number" name="phone" id="" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="">Nouveau mot de passe</label>
                        <input type="text" name="password" id="" class="form-control" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">ANNULER</button>
                    <button type="submit" class="btn btn-sm btn-success">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Responsable Scolarite -->
<div class="modal fade" id="responsableScolarite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div style="background-color: deepskyblue" class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NOUVEAU RESPONSABLE SCOLARITE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('adminecole.responsable.scolarite.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nom Complet</label>
                        <input type="text" name="name" id="" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone</label>
                        <input type="number" name="phone" id="" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="">Nouveau mot de passe</label>
                        <input type="text" name="password" id="" class="form-control" require>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">ANNULER</button>
                    <button type="submit" class="btn btn-sm btn-success">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection