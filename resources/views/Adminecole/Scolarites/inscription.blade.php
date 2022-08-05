@extends('layouts.adminecole')


@section('title')
Admin Ecole | Relévés {{ $salle->classe->name }}
@endsection

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h2> RELEVES DES NOTES {{ $salle->classe->name }}  </h2>
        </div>
        <input type="hidden" name="salle_id" value="{{$salle->id}}">
        <input type="hidden" name="trimestre_ecole_id" value="{{$trimestre_ecole->id}}">
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead class="">
                        <th> NOM(S) & PRENOM(S)</th>
                        <th>  <i class="fa fa-cog"></i> </th>
                    </thead>
                    <tbody>
                        @foreach($inscriptions as $inscription)
                        <tr>
                            <td> {{$inscription->name}} </td>
                            <td> <a href="/adminecole/scolarite-inscription-show/{{ $inscription->id }}/{{ $salle->ecole->token }}/{{ $salle->id }}/{{ $trimestre_ecole->id}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
