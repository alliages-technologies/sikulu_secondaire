@extends('layouts.superadmin')


@section('title')
Superadmin | Programme {{$programmenational->classe->name}}
@endsection

@section('content')
<div class="container mt-4 col-md-10">
    <div class="card">
        <div class="card-header">
            <h2> <span class="badge badge-primary">{{ $programmenational->classe->name }}</span>  <a href="" data-toggle="modal" data-target="#panier" class="btn btn-success mt-2 btn-sm float-right"> <i class="fa fa-plus"></i> </a> </h2>
        </div>
        <div class="card-body ">
            <div class="container-fluid">
                <table class="table table-sm table-bordered table-striped table-sm">
                    <thead class="">
                        <th> MATIERE </th>
                        <th> COEFFICIENT </th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($programmenational->ligneprogrammenationals as $programmenational_ligne)
                        <tr>
                            <td> {{$programmenational_ligne->matiere->name}} </td>
                            <td> {{$programmenational_ligne->coefficient}} </td>
                            <td> <a href="{{route('superadmin.programmes-national.edit',$programmenational_ligne->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> <a href="{{route('superadmin.pn.delete',$programmenational_ligne->id)}}" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Ajout -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">AJOUT D'UNE MATIERE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('superadmin.programmes-national.add',$programmenational->id)}}" method="post" class="mb-4">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <select name="matiere_id" id="" class="form-control matiere_id">
                                <option value="">Choix de la matiere</option>
                                @foreach ($matieres as $matiere)
                                <option value="{{ $matiere->id }}" data-matiere_id="{{ $matiere->id }}" data-matiere="{{ $matiere->name }}">{{ $matiere->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="coefficient" class="form-control" placeholder="coefficient">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default mt-2">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
