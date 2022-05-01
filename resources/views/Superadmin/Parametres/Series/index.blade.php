@extends('layouts.superadmin')


@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>SERIES</h4>
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
                        <th>ENGEIGNEMENT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($series as $serie)
                    <tr>
                        <td>{{$serie->name}}</td>
                        <td>{{$serie->abb}}</td>
                        <td>{{$serie->enseignement_id?$serie->type->name:"-"}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">CONFIGURATION DE LA SERIE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('superadmin.series.store')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <!--div class="form-group">
                            <label for="abb">Abbréviation</label>
                            <input type="text" name="abb" class="form-control">
                        </div-->
                        <div class="form-group">
                            <select name="enseignement_id" id="" class="form-control">
                                <option value="">TYPE D'ENSEIGNEMENT</option>
                                @foreach ($enseignements as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
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