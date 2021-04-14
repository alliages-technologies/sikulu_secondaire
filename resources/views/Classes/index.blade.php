@extends('layouts.admin')
@section('content')
<h4 class="text-center mb-4 h4"> Liste des Classes </h4>
<div class="container-fluid">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <th> Nom de la classe </th>
            <th> Code </th>
            <th> Série </th>
            <th> Montant Inscription </th>
            <th> Montant Frais </th>
        </thead>
        <tbody>
        @foreach($classes as $classe)
            <tr>
                <td> {{$classe->name}} </td>
                <td> {{$classe->code}} </td>
                <td> {{$classe->serie_id?$classe->serie->name:""}} </td>
                <td> {{number_format($classe->montant_inscri)}} XAF </td>
                <td> {{number_format($classe->montant_frais)}} XAF </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $classes->links() }}
    <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right"> Ajouter </a>
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
