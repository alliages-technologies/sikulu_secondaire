@extends('layouts.adminecole')


@section('title')
Admin Ecole | Emploi du temps
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
                        <th> TRANCHE HORAIRE</th>
                        <th> MATIERE </th>
                        <th> ENSEIGNANT </th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($emploi_temp->lets as $let)
                    <tr>
                        <td> {{ $let->tranche->name }} </td>
                        <td> {{ $let->ligneprogrammeecole->matiere->name }} </td>
                        <td> {{ $let->ligneprogrammeecole->prof}} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
