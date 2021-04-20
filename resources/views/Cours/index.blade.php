@extends('layouts.admin');
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Gestion des Cours <i class="fa fa-book"></i> </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead class="">
                    <th> Matière <i class="fa fa-edit"></i> </th>
                    <th> Classe <i class="fa fa-calendar"></i> </th>
                    <th> Coéfficient <i class="fa fa-edit"></i> </th>
                </thead>
                <tbody>
                @foreach($cours as $cour)
                    <tr>
                        <td> {{$cour->matiere->name}} </td>
                        <td> {{$cour->classe_id?$cour->classe->name:""}} {{$cour->classe->serie->name}} </td>
                        <td> {{$cour->coefficient}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $cours->links() }}
            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right">Ajouter <i class="fa fa-plus-square"></i> </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ajout des cours <i class="fa fa-edit"></i> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="flex-container">
            <div class="form-group">
        <form action="/cours/store" method="post" class="mb-4">
        @csrf
                </div>
            </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <select name="matiere_id" id="" class="form-control" required>
                            <option value="">Matière</option>
                            @foreach($matieres as $matiere)
                            <option value="{{ $matiere->id }}"> {{ $matiere->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="classe_id" id="" class="form-control" required>
                            <option value="">Classe</option>
                            @foreach($classes as $classe)
                            <option value="{{$classe->id}}"> {{ $classe->name }} {{$classe->serie_id?$classe->serie->name:""}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="coefficient" placeholder="Coéfficient..." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-success">Enrégistrer <i class="fa fa-save"></i> </button>
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
