@extends('layouts.adminecole')


@section('title')
Admin Ecole | Matières
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES MATIERES
                <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>DESIGNATION</th>
                        <th>ABBREVIATION</th>
                        <th><i class="fa fa-gear"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matieres as $matiere)
                    <tr>
                        <td>{{$matiere->name}}</td>
                        <td>{{$matiere->abv}}</td>
                        <td>
                        @if ($matiere->active)
                            <a href="{{ route('adminecole.matieres.off', $matiere->id) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                        @else
                            <a href="{{ route('adminecole.matieres.on', $matiere->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-power-off"></i></a>
                        @endif
                        </td>
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
                <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION DE LA MATIERE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('adminecole.matieres.store')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom de la matière</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="abv">Abbréviation</label>
                        <input type="text" name="abv" class="form-control" required>
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
