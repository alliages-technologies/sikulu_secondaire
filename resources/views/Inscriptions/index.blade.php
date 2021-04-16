@extends('layouts.admin');
@section('content')

<div class="card card-dark mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Liste des inscriptions <i class="fa fa-users"></i> </h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <th> Nom(s) <i class="fa fa-user"></i></th>
                    <th> Prénom(s) <i class="fa fa-user"></i></th>
                    <th> Date d'inscription <i class="fa fa-calendar-check"></i></th>
                    <th> Action (s) <i class="fa fa-wrench"></i></th>
                </thead>
                <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        <td> {{$inscription->eleve_id?$inscription->eleve->nom:""}} </td>
                        <td> {{$inscription->eleve_id?$inscription->eleve->prenom:""}} </td>
                        @if(setlocale(LC_TIME, "fr_FR","French") && $date = strftime("%A %d %B %G", strtotime($inscription->created_at)))
                        <td> {{$date}} </td>
                        @else
                        <td> Date non pris en compte </td>
                        @endif
                        <td> <a href="/inscriptions/show/{{$inscription->id}}" class="btn btn-info btn-sm"> Ouvrir <i class="fa fa-info"></i></a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $inscriptions->links() }}
            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark btn-sm float-right finscrit"> <i class="fa fa-running finscrit"></i><i class="fa fa-sign-in-alt"></i> </a>
            <a href="/inscriptions/create" class="btn btn-success float-right mr-2"> Inscription <i class="fa fa-user-plus"></i> </a>
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
