@extends('layouts.superadmin')


@section('title')
Superadmin | Matières
@endsection

@section('content')

<div class="container mt-4 col-md-10">
    <div class="card">
        <div class="card-header">
            <h2>
                CONFIGURATION DES MATIERES
                <button style="float: right" class="btn btn-sm btn-default" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>MATIERE</th>
                        <th>ABBREVIATION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $matiere)
                    <tr>
                        <td>{{$matiere->name}}</td>
                        <td>{{$matiere->abv}}</td>
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
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION D'UNE NOUVELLE MATIERE</h5>
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
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">ANNULER</button>
                    <button type="submit" class="btn btn-sm btn-success">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
