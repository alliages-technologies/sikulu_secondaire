@extends('layouts.adminecole')
@section('content')
<div class="card mt-5">

    <div class="card-header">
        <h4 class="text-left mb-1"> Programme de la <strong>/></strong> Niveau <strong>/></strong> </h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-hover table-sm">
                <thead class="">
                    <tr>
                        <th> Tranche Horaire</th>
                        <th> Matière </th>
                        <th> Enseignant </th>
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
