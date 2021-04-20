@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-left"> Liste des Classes <i class="fa fa-door-open"></i> </h4>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="">
                        <th> Nom de la classe <i class="fa fa-door-closed"></i> </th>
                        <th> Code <i class="fa fa-barcode"></i> </th>
                        <th> Série <i class="fa fa-info"></i> </th>
                        <th> Montant Inscription <i class="fa fa-money"></i> </th>
                        <th> Montant Frais <i class="fa fa-money"></i> </th>
                        <th> Actions </th>
                    </thead>
                    <tbody>
                    @foreach($classes as $classe)
                        <tr>
                            <td> {{$classe->name}} </td>
                            <td> {{$classe->code}} </td>
                            <td> {{$classe->serie_id?$classe->serie->name:""}} </td>
                            <td> {{number_format($classe->montant_inscri)}} XAF </td>
                            <td> {{number_format($classe->montant_frais)}} XAF </td>
                            <td> <a href="" class="btn btn-info btn-xs">Liste d'élevês</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $classes->links() }}
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right"> Ajouter <ifa class="fa fa-plus-square"></ifa> </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ajout d'une Classe </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="flex-container">
            <div class="form-group">
        <form action="/classes/store" method="post">
        @csrf
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Nom..." name="name" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Code..." name="code" required>
                    </div>
                    <div class="col-md-3">
                      <select name="serie_id" id="" class="form-control">
                        <option value="">Série</option>
                        @foreach($series as $serie)
                        <option value="{{$serie->id}}"> {{ $serie->name }} </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="montant_inscri" placeholder="Montant inscription" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label for="">Est ce une classe d'examen ?</label>
                        <label for="">Oui</label>
                        <input type="radio" name="examen" id="" value="1">
                        <label for="">Non</label>
                        <input type="radio" name="examen" id="" value="0">
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="montant_frais" placeholder="Montant frais" required>
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
