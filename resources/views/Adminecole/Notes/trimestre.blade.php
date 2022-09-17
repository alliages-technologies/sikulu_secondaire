@extends('layouts.adminecole')
@section('content')
<div class="container menu mt-4">
    <div class="card">
        <div class="card-header">
            <h3>{{$salle->name}} | {{$salle->classe->name}} | TRIMESTRES</h3>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center p-4">
                @foreach ($trimestre_ecoles as $trimestre_ecole)
                    <a href="/adminecole/notes/salles/{{$salle->token}}/{{$trimestre_ecole->id}}" class="col-md-3 m-2">
                        <i class="fa fa-building"></i>
                        <p>{{ $trimestre_ecole->trimestre->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
