@extends('layouts.admin');
@section('content')
<div class="card card-dark mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Gestion des Matières <i class="fa fa-book"></i> </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <th> Désignation <i class="fa fa-user"></i> </th>
                    <th> Abréviation <i class="fa fa-calendar"></i> </th>
                </thead>
                <tbody>
                @foreach($matieres as $matiere)
                    <tr>
                        <td> {{$matiere->name}} </td>
                        <td> {{$matiere->abv}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $matieres->links() }}
            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right">Ajouter <i class="fa fa-plus-square"></i> </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ajout des Matières <i class="fa fa-edit"></i> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="flex-container">
            <div class="form-group">
        <form action="/matieres/store" method="post" class="mb-4">
        @csrf
                </div>
            </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="name" placeholder="Désignation..." required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="abv" placeholder="Abreviation..." required>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success">Enrégistrer <i class="fa fa-save"></i> </button>
                    </div>
        </form>

      </div>

    </div>
  </div>
</div>
</div>

@endsection
