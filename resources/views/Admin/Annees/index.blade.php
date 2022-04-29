@extends('layouts.admin');
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Gestion des Années Scolaires <i class="fa fa-book"></i> </h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead class="">
                    <th> Année 1  </th>
                    <th> Année 2  </th>
                    <th> Date de la Rentrée <i class="fa fa-calendar"></i> </th>
                </thead>
                <tbody>
                @foreach($annee_acads as $annee_acad)
                    <tr>
                        <td> {{$annee_acad->annee1}} </td>
                        <td> {{$annee_acad->annee2}} </td>
                        <td> {{$annee_acad->dtrentree}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $annee_acads->links() }}
            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-default float-right">Ajouter <i class="fa fa-plus-square"></i> </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Parametrage de l'année scolaire <i class="fa fa-edit"></i> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="flex-container">
            <div class="form-group">
        <form action="{{ route('admin.annee-acads.store')}} " method="post" class="mb-4">
        @csrf
                </div>
            </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="annee1" placeholder="Année n°1..." required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="annee2" placeholder="Année n°1..." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2 mb-2">
                        <input type="date" class="form-control" name="dtrentree" placeholder="Date rentrée..." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-default">Enrégistrer <i class="fa fa-save"></i> </button>
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
        </form>

      </div>

    </div>
  </div>
</div>
</div>

@endsection
