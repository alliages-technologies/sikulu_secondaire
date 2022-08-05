@extends('layouts.adminecole')


@section('content')
<input type="hidden" name="trimestre_ecole_id" value="{{$trimestre_ecole->id}}">

<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h2> Relevé de notes | Salles <i class="fa fa-door-open"></i> </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
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
                        <td> <a href="/adminecole/scolarite-inscriptions/{{ $salle->id }}/{{ $salle->ecole->token }}/{{$trimestre_ecole->id}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
