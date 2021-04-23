@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="text-left mb-1"> Gestion des Rôles <i class="fa fa-user"></i> </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Désignation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td> {{$role->name}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$roles->links()}}
<a href="" data-toggle="modal" data-target="#panier" class="btn btn-secondary float-right">Créer un Nouveau rôle</a>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> Création d'un rôle <i class="fa fa-edit"></i> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="flex-container">
            <div class="form-group">
        <form action="/roles/store" method="post" class="mb-4">
            @csrf
                </div>
            </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Désignation</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <button class="btn btn-success ml-4">Enrégistrer <i class="fa fa-save"></i> </button>
                            </div>
                        </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>
@endsection
