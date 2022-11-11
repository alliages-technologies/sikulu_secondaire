@extends('layouts.parent')

@section('title')
Responsable Scolarité | Horaires Salle
@endsection

@section('content')
<div class="container mt-4">
    <input type="hidden" name="salle_id" class="salle_id" value="{{ $inscription->salle->id }}">
    <div class="card">
        <div class="card-header">
            <h2>
                EMPLOIS DU TEMPS
            </h2>
        </div>
        <div class="card-body ">
            <div class="container-fluid">
                <table class="table table-bordered table-hover table-sm">
                    <thead class="">
                        <th> DATE </th>
                        <th> DESIGNATION </th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </thead>
                    <tbody>
                        @foreach($emploie_temps as $emploie_temp)
                        <tr>
                            <td> {{$emploie_temp->created_at->format('Y-m-d')}}</td>
                            <td> {{ $emploie_temp->name }} </td>
                             <td> <a href="{{ route('parents.emploie.temps.show', $emploie_temp->token) }}"><i class="fa fa-eye"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
