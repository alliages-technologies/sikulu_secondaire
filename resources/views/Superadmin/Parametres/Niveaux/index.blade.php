@extends('layouts.superadmin')


@section('title')
Superadmin | Niveaux
@endsection

@section('content')

<div class="container mt-4 col-md-8">
    <div class="card">
        <div class="card-header">
            <h2>
                CONFIGURATION DES NIVEAUX
                <button style="float: right" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>ABBREVIATION</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($niveaux as $niveau)
                    <tr>
                        <td>{{$niveau->abb}}</td>
                        <td>{{$niveau->name}}</td>
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
                <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION DU NIVEAU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('superadmin.niveaux.store')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Désignation</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="abb">Abbréviation</label>
                        <input type="text" name="abb" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ANNULER</button>
                    <button type="submit" class="btn btn-success">ENREGISTRER</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
