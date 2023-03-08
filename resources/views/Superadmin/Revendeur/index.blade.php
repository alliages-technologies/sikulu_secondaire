@extends('layouts.superadmin')


@section('title')
Superadmin | Configuration Revendeur
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                LISTE DES REVENDEURS
                <button style="float: right;" class="btn btn-sm btn-default" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>E-Mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revendeurs as $revendeur)
                    <tr>
                        <td><a href="{{route('superadmin.revendeurs.show', $revendeur->id)}}"> <strong>{{$revendeur->name}}</strong> </a></td>
                        <td>{{$revendeur->phone}}</td>
                        <td>{{$revendeur->email}}</td>
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
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION DU REVENDEUR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('superadmin.revendeurs.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Nom" class="form-control mb-1" required>
                            <input type="text" name="email" placeholder="Email" class="form-control mb-1" required>
                            <input type="text" name="phone" placeholder="Téléphone" class="form-control mb-1" required>
                            <input type="text" name="password" placeholder="Mot de passe" class="form-control" required>
                        </div>
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
