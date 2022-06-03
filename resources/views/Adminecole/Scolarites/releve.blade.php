@extends('layouts.adminecole')
@section('content')

<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header" style="background-color: darkblue; color:white">
            <h4 class="text-left"> Relevé de notes | Salles <i class="fa fa-door-open"></i> </h4>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead class="">
                        <th> Nom de la salle <i class="fa fa-door-closed"></i> </th>
                        <th> Classe <i class="fa fa-door-closed"></i> </th>
                        <th>  <i class="fa fa-cog"></i> </th>
                    </thead>
                    <tbody>
                        @foreach($salles as $salle)
                        <tr>
                            <td> {{$salle->name}} </td>
                            <td> {{$salle->classe->name}} </td>
                            <td> <a href="/adminecole/scolarite-inscriptions/{{ $salle->id }}/{{ $salle->ecole->token }}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
