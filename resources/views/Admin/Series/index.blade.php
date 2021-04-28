@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-left"> Liste des Séries <i class="fa fa-info"></i> </h4>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="">
                        <th> Nom de la série </th>
                    </thead>
                    <tbody>
                    @foreach($series as $serie)
                        <tr>
                            <td> {{$serie->name}} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $series->links() }}
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right"> Ajouter <i class="fa fa-plus-square"></i> </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ajout d'une série </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="flex-container">
            <div class="form-group">
        <form action="{{ route('admin.series.store')}} " method="post">
        @csrf
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Entrer le nom de la série..." required>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success">Sauvegarder <i class="fa fa-save"></i> </button>
                    </div>
                </div>
        </form>

      </div>

    </div>
  </div>
</div>
</div>

@endsection
