@extends('layouts.superadmin')


@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>ECOLES</h4>
            <button type="button" class="btn btn-sm btn-success col-1" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>ADRESSE</th>
                        <th>EMAIL</th>
                        <th>TELEPHONE</th>
                        <th>COORDONNEES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ecoles as $ecole)
                    <tr>
                        <td>{{$ecole->name}}</td>
                        <td>{{$ecole->address}}</td>
                        <td>{{$ecole->email}}</td>
                        <td>{{$ecole->phone}}</td>
                        <td>{{$ecole->coordonnees}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION DE L'ECOLE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('superadmin.ecoles.store')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Nom" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" placeholder="Adresse" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" placeholder="Téléphone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="coordonnees" placeholder="Coordonnées" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <select name="enseignement_id" id="" class="form-control" required>
                                <option value="">TYPE D'ENSEIGNEMENT</option>
                                @foreach ($enseignements as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image_uri"  id="" class="custom-file-input" required>
                            <label class="custom-file-label" for="">Choisissez une image</label>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">CONFIGURATION DE L'ADMIN DE L'ECOLE</label>
                                <input type="text" name="name" placeholder="Nom" class="form-control mb-1" required>
                                <input type="text" name="email" placeholder="Email" class="form-control mb-1" required>
                                <input type="text" name="password" placeholder="Mot de passe" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
   </div>

@endsection