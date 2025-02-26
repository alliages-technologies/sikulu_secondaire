@extends('layouts.adminecole')
@section('content')
<div class="container menu mt-4">
    <div class="card">
        <div class="card-header">
            <h2>SALLES <i class="fa fa-building"></i></h2>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center p-4">
                @foreach ($salles as $salle)
                    <a href="/adminecole/notes/trimestres/{{$salle->token}}/{{$salle->id}}" class="col-md-3 m-2">
                        <i class="fa fa-building"></i>
                        <p>{{ $salle->name }} | {{ $salle->classe->name }} </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
