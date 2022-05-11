@extends('layouts.superadmin')


@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>MATIERES</h4>
            <button type="button" class="btn btn-sm btn-success col-1" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>#</th>
                        <th>ECOLE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $matiere)
                    <tr>
                        <td>{{$matiere->name}}</td>
                        <td>{{$matiere->abv}}</td>
                        <td>{{$matiere->ecole_id? $matiere->ecole->name:"-"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION DE LA MATIERE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('superadmin.matieres.store')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom de la matière</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="abv">Abbréviation</label>
                            <input type="text" name="abv" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
   </div>


@endsection