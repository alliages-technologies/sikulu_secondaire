@extends('layouts.adminecole')


@section('title')
Admin Ecole | Tranches horaires
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header" style="background-color: darkblue; color:white">
            <h2>
                <i class="fa fa-clock"></i> | GESTION DES TRANCHES HORAIRES
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-sm btn-default float-right"> <i class="fa fa-plus-square"></i></a>
            </h2>
        </div>
        <div class="card-body ">
            <table class="table table-sm table-bordered table-striped table-hover">
                <thead class="">
                    <th> HEURE DEBUT </th>
                    <th> HEURE FIN </th>
                    <th> <i class="fa fa-gear"></i> </th>
                </thead>
                <tbody>
                @foreach($tranche_horaires as $tranche_horaire)
                    <tr>
                        <td> {{$tranche_horaire->heure_debut}} </td>
                        <td> {{$tranche_horaire->heure_fin}} </td>
                        <td> <i class="fa fa-edit"></i> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $tranche_horaires->links() }}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">NOUVELLE TRANCHE HORAIRE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('adminecole.tranches.index')}}" method="post" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="">Heure début</label>
                            <input type="time" class="form-control" name="heure_debut" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="">Heure fin</label>
                            <input type="time" class="form-control" name="heure_fin" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-default">ENREGISTRER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
