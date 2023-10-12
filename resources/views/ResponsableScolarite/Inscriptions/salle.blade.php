@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Inscriptions
@endsection

@section('content')
{{-- <a href="/responsablescolarite/inscription-auto" class="btn btn-success"></a> --}}
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES INSCRIPTIONS PAR SALLES
                <a href="" class="btn btn-sm btn-default float-right"><i class="fa fa-user-plus"></i> </a>
            </h2>
        </div>
        <div class="card-body ">
            <div class="row d-flex justify-content-center p-1 menu">
                @foreach ($salles as $salle)
                <a href="{{ route('responsablescolarite.inscriptions.salles',$salle->token) }}" class="col-md-3 m-2">
                    <i class="fa fa-door-open"></i>
                    <p>{{ $salle->name }} | {{$salle->classe->name}}</p>
                </a>
                <input type="hidden" name="id" value="{{ $salle->id}}">
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
