@extends('layouts.adminecole')
@section('content')

<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header" style="background-color: darkblue; color:white">
            <h4 class="text-left"> Relevé de notes | Liste des inscrits | {{ $salle->classe->name }} <i class="fa fa-users"></i> </h4>
        </div>
        <input type="hidden" name="salle_id" value="{{$salle->id}}">
        <input type="hidden" name="trimestre_ecole_id" value="{{$trimestre_ecole->id}}">
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead class="">
                        <th> Nom & Prénom(s) </th>
                        <th> Classe <i class="fa fa-door-closed"></i> </th>
                        <th>  <i class="fa fa-cog"></i> </th>
                    </thead>
                    <tbody>
                        @foreach($inscriptions as $inscription)
                        <tr>
                            <td> {{$inscription->name}} </td>
                            <td> {{$inscription->classe->name}} </td>
                            <td> <a href="/adminecole/scolarite-inscription-show/{{ $inscription->id }}/{{ $salle->ecole->token }}/{{ $salle->id }}/{{ $trimestre_ecole->id}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
