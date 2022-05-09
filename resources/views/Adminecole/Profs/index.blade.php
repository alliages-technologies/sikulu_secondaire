@extends('layouts.adminecole')


@section('title')
Admin Ecole | Gestion des professeurs
@endsection

@section('content')


<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>GESTION DES PROFESSEURS</h4>
            <a href="{{route('adminecole.profs.create')}}" class="btn btn-sm btn-success col-1">
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>DERNIER DIPLOME</th>
                        <th>
                            <i class="fa fa-gear"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profs as $prof)
                    <tr>
                        <td>{{$prof->prof->nom}}</td>
                        <td>{{$prof->prof->prenom}}</td>
                        <td>{{$prof->prof->diplome->name}}</td>
                        <td>
                            <a href="{{route('adminecole.profs.show', $prof->id)}}"><i class="fa fa-eye btn btn-sm btn-info"></i></a>
                            <a href="#"><i class="fa fa-edit btn btn-sm btn-warning"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
