@extends('layouts.adminecole')
@section('content')
<div class="card mt-5">
    <div class="card-header" style="background-color: darkblue; color:white">
        <h4 class="text-left mb-1"> Gestion des Tranches Horaires <i class="fa fa-book"></i> </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead class="">
                    <th> Heure Début <i class="fa fa-clock"></i> </th>
                    <th> Heure Fin <i class="fa fa-clock"></i> </th>
                </thead>
                <tbody>
                @foreach($tranche_horaires as $tranche_horaire)
                    <tr>
                        <td> {{$tranche_horaire->heure_debut}} </td>
                        <td> {{$tranche_horaire->heure_fin}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tranche_horaires->links() }}
            <a style="background-color: darkblue; color:white" href="" data-toggle="modal" data-target="#panier" class="btn btn-default float-right">Ajouter <i class="fa fa-plus-square"></i> </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Ajout une tranche horaire <i class="fa fa-edit"></i> </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="flex-container">
              <div class="form-group">
          <form action="{{route('adminecole.tranches.index')}}" method="post" class="mb-4">
          @csrf
                  </div>
              </div>
                  <div class="row">
                      <div class="col-md-6 mb-2">
                          <input type="text" class="form-control" name="heure_debut" placeholder="Heure début..." required>
                      </div>
                      <div class="col-md-6 mb-2">
                          <input type="text" class="form-control" name="heure_fin" placeholder="Heure fin..." required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <button style="background-color: darkblue; color:white" class="btn btn-default">Enrégistrer <i class="fa fa-save"></i> </button>
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
