@extends('layouts.adminecole')


@section('title')
Admin Ecole | Trimestres
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>GESTION DES TRIMESTRES</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm table-hover">
                <thead class="">
                    <th> DESIGNATION </th>
                    <th> ABREVIATION </th>
                    <th> ETAT </th>
                </thead>
                <tbody>
                @foreach($trimestre_ecoles as $trimestre)
                    <tr>
                        <td> {{$trimestre->trimestre->name}} </td>
                        <td> {{$trimestre->trimestre->abb}} </td>
                        @if ($trimestre->active==1)
                        <td> <a href="{{ route('adminecole.trimestre.off', $trimestre->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-power-off"></i></a> </td>
                        @else
                        <td> <a href="{{ route('adminecole.trimestre.on', $trimestre->id) }}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a> </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
