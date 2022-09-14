@extends('layouts.adminecole')


@section('title')
Admin Ecole | Salles
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES SALLES
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-sm btn-default float-right"> <i class="fa fa-plus-square"></i> </a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th>SALLE</th>
                    <th>CLASSE</th>
                    <th>PLACES</th>
                    <th>MONTANT</th>
                </thead>
                <tbody>
                    @foreach($salles as $salle)
                    <tr>
                        <td> {{$salle->name}} </td>
                        <td> {{$salle->classe->name}} </td>
                        <td> {{$salle->nombre_places}} </td>
                        <td> {{$salle->montant}} XAF </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $salles->links() }}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">CONFIGURATION D'UNE SALLE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('adminecole.salles.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Designation..." name="name" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Abreviation..." name="abb" required>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Nombre de places..." name="nombre_places" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Montant..." name="montant" required>
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <select name="classe_id" id="" class="form-control">
                                        <option value="">Choix de la classe</option>
                                        @foreach ($pns as $pn)
                                        <option value="{{ $pn->classe->id }}">{{ $pn->classe->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-default mt-3">ENREGISTRER <i class="fa fa-save"></i> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
