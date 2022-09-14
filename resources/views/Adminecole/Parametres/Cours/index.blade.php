@extends('layouts.adminecole')


@section('title')
Admin Ecole | Cours
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>GESTION DES COURS PAR SALLE</h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SALLE</th>
                        <th>CLASSE</th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programmeecoles as $programmeecole)
                    <tr>
                        <td>{{$programmeecole->salle_id?$programmeecole->salle->name:""}}</td>
                        <td>{{$programmeecole->salle?$programmeecole->salle->classe->name:""}}</td>
                        <td><a href="{{route('adminecole.cours.show', $programmeecole->token)}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
