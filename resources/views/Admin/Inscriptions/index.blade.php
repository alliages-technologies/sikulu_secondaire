@extends('layouts.admin');
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Liste des inscriptions <i class="fa fa-users"></i> </h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead class="">
                    <th> Date d'inscription </th>
                    <th> Nom(s) & Prénom(s) </th>
                    <th> Classe </th>
                    <th> Action (s) </th>
                </thead>
                <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        @if(setlocale(LC_TIME, "fr_FR","French") && $date = strftime("%A %d %B %G", strtotime($inscription->created_at)))
                        <td> {{$date}} </td>
                        @else
                        <td> Date non pris en compte </td>
                        @endif
                        <td> {{$inscription->eleve_id?$inscription->eleve->nom:""}} {{$inscription->eleve_id?$inscription->eleve->prenom:""}} </td>
                        <td> {{$inscription->classe_id?$inscription->classe->name:""}} {{$inscription->classe->serie->name}} </td>
                        <td> <a href="{{ route('admin.inscriptions.show', $inscription->id) }}" class="btn btn-info btn-sm"> Afficher </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $inscriptions->links() }}
            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right"> Réinscription <i class="fa fa-user-plus"></i></a>
            <a href="{{ route('admin.inscriptions.create') }}" class="btn btn-success float-right mr-2"> Inscription <i class="fa fa-user-plus"></i> </a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Réinscription <i class="fa fa-users"></i> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="flex-container">
            <div class="form-group">
        <form action="/inscriptions/reinscription" method="post">
        @csrf
                <label for="">--Eleve--</label>
                <select class="form-control" id="" name="id" required>
                        <option value="">Selectionner l'Eleve</option>
                        <option id="membre" value=""></option>
                </select>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="fond" placeholder="Entrer le fond...">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success">Réinscrire</button>
                    </div>
                </div>
        </form>

      </div>

    </div>
  </div>
</div>
</div>

@endsection
