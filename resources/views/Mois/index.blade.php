@extends('layouts.admin');
@section('content')
<h4 class="text-center mb-4 h4"> Liste des Mois <i class="fa fa-calendar-week"></i> </h4>
<div class="container-fluid">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <th>Etats</th>
            <th> Désignation du moi </th>
            <th> Action </th>
        </thead>
        <tbody>
        @foreach($mois as $moi)
            <tr>
                @if($moi->visible == 1)
                <td> <span class="badge badge-success">Visible..!</span> </td>
                @else
                <td> <span class="badge badge-danger">Invisible..!</span> </td>
                @endif
                <td> {{ $moi->name }} </td>
                @if($moi->visible == 1)
                <td> <a href="/mois/off/{{$moi->id}}" class="btn btn-danger btn-sm"> <i class="fa fa-power-off"></i> </a> </td>
                @else
                <td> <a href="/mois/on/{{$moi->id}}" class="btn btn-success btn-sm"> <i class="fa fa-toggle-on"></i> </a> </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $mois->links() }}
    <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right">Ajouter <i class="fa fa-plus-square"></i> </a>
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
        <form action="/mois/store" method="post">
        @csrf

                </div>
            </div>

                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Entrer le nom du moi...">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success">Enrégistrer <i class="fa fa-save"></i> </button>
                    </div>
                </div>
        </form>

      </div>

    </div>
  </div>
</div>
</div>

@endsection
