@extends('layouts.responsablescolarite');
@section('content')
<div class="container mt-5">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-left mb-1"> Gestion des Diplômes <i class="fa fa-calendar-week"></i> </h4>
        </div>
        <div class="card-body ">
            <div class="container">
                <table class="table table-bordered table-hover">
                    <thead class="">
                        <th> Désignation </th>
                    </thead>
                    <tbody>
                        @foreach($diplomes as $diplome)
                        <tr>
                            <td> {{$diplome->name}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $diplomes->links() }}
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-default float-right">Nouveau <i class="fa fa-plus-square"></i> </a>
            </div>
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
                        <form action="{{route('responsablescolarite.diplomes.store')}}" method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Entrer le nom du diplôme..." required>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default">Enrégistrer <i class="fa fa-save"></i> </button>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </div>
</div>
</div>


@endsection
