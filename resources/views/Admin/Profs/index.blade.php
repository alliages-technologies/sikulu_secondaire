@extends('layouts.admin');
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Gestion des Profs <i class="fa fa-users"></i> </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead class="">
                    <th> Nom et Prénom(s)</th>
                    <th> Adresse </th>
                    <th> Télephone </th>
                    <th> Diplôme </th>
                </thead>
                <tbody>
                    @foreach($profs as $prof)
                    <tr>
                        <td> {{$prof->name}} </td>
                        <td> {{$prof->adresse}} </td>
                        <td> {{$prof->telephone}} </td>
                        <td> {{$prof->diplome->name}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $profs->links() }}
            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right">Nouveau <i class="fa fa-plus-square"></i> </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Nouveau diplôme <i class="fa fa-folder"></i> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{ route('admin.profs.store')}} " method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="nom" placeholder="nom..." required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="prenom" placeholder="prenom..." required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="adresse" placeholder="adresse..." required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="telephone" placeholder="telephone..." required>
                    </div>
                    <div class="col-md-4">
                        <select name="diplome_id" id="" class="form-control">
                            <option value="">Diplôme</option>
                            @foreach($diplomes as $diplome)
                            <option value="{{ $diplome->id }}"> {{ $diplome->name }} </option>
                            @endforeach
                        </select>
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
