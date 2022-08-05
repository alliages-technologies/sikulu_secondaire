@extends('layouts.adminecole')


@section('title')
Admin Ecole | Relévés par salle
@endsection

@section('content')
<input type="hidden" name="trimestre_ecole_id" value="{{$trimestre_ecole->id}}">

<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h2>RELEVES DES NOTES PAR SALLE</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead class="">
                    <th> SALLE </th>
                    <th> CLASSE </th>
                    <th>  <i class="fa fa-cog"></i> </th>
                </thead>
                <tbody>
                    @foreach($salles as $salle)
                    <tr>
                        <td> {{$salle->name}} </td>
                        <td> {{$salle->classe->name}} </td>
                        <td> <a href="/adminecole/scolarite-inscriptions/{{ $salle->id }}/{{ $salle->ecole->token }}/{{$trimestre_ecole->id}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
