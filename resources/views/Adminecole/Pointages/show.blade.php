@extends('layouts.adminecole')
@section('content')
<div class="container mt-5"> 
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-door-open"></i> | POINTAGES DE {{$prof->name}}
                <a href="" data-toggle="modal" data-target="#consulter" class="btn btn-sm btn-default float-right ml-2"> <i class="fa fa-eye"></i> </a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th>CLASSE</th>
                    <th>MATIERE</th>
                    <th>NBR_HEURE</th>
                    <th>JOURS</th>
                </thead>
                <tbody>
                    @foreach ($pointages as $pointage)
                    <tr>
                        <td>{{ $pointage->pel->programmeecole->salle->classe->name}} ({{ $pointage->pel->programmeecole->salle->abb}}) </td>
                        <td>{{ $pointage->pel->matiere->name }}</td>
                        <td>{{ $pointage->nbr_heure }} H</td>
                        <td>{{ $pointage->jour }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="">

            </div>

        </div>
    </div>
</div>
@endsection
