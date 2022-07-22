@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Gestion des professeurs
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES PROFESSEURS
                <a href="/home" style="float: right" class="btn btn-sm btn-default ml-2">RETOUR</a>
                <a href="{{route('responsablescolarite.profs.create')}}" style="float: right" class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i></a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
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
                    @foreach ($profEcole as $profeco)
                    <tr>
                        <td>{{$profeco->prof->nom}}</td>
                        <td>{{$profeco->prof->prenom}}</td>
                        <td>{{$profeco->prof->diplome->name}}</td>
                        <td>
                            <a href="responsablescolarite/profs/$profeco->prof->token"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$profEcole->links()}}
        </div>
    </div>
</div>

@endsection
