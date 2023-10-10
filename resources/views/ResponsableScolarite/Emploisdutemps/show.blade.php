@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Emploi du temps
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>EMPLOI DU TEMPS</h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-hover">
                <thead class="">
                    <tr>
                        <th> JOUR </th>
                        <th> TRANCHE HORAIRE</th>
                        <th> MATIERE </th>
                        <th> ENSEIGNANT </th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emploi_temp->lets as $let)
                    <tr>
                        <td> {{ $let->day->name }} </td>
                        <td> {{ $let->tranche->name }} </td>
                        <td> {{ $let->ligneprogrammeecole->matiere->name }} </td>
                        <td> {{ $let->ligneprogrammeecole->prof}} </td>
                        <td> <a href="/responsablescolarite/emplois-du-temps-edit/{{Auth::user()->ecole->token}}/{{$let->id}}" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i> </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
