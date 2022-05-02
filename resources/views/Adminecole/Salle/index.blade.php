@extends('layouts.adminecole')
@section('content')

<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header" style="background-color: darkblue; color:white">
            <h4 class="text-left"> Liste des salles <i class="fa fa-door-open"></i> </h4>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead class="">
                        <th> Nom de la salle <i class="fa fa-door-closed"></i> </th>
                        <th> Abreviation <i class="fa fa-barcode"></i> </th>
                        <th> Nbr de Place <i class="fa fa-info"></i> </th>
                    </thead>
                    <tbody>
                        @foreach($salles as $salle)
                        <tr>
                            <td> {{$salle->name}} </td>
                            <td> {{$salle->abb}} </td>
                            <td> {{$salle->nombre_places}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $salles->links() }}
                <a style="background-color: darkblue; color:white" href="" data-toggle="modal" data-target="#panier" class="btn btn-default float-right"> Ajouter <ifa class="fa fa-plus-square"></ifa> </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Ajout d'une salle </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('adminecole.salles.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Designation..." name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Abreviation..." name="abb" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Nombre de places..." name="nombre_places" required>
                                </div>
                                <div class="col-md-6">
                                    <button style="background-color: darkblue; color:white" class="btn btn-default">Sauvegarder <i class="fa fa-save"></i> </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
