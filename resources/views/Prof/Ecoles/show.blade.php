@extends('layouts.prof')


@section('title')
{{Auth::user()->name}} | {{$ecole->name}}
@endsection

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"> <strong> <i class="fa fa-building"></i> {{ $ecole->name }} </strong> </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Acceuil</a></li>
            <li class="breadcrumb-item active">{{ $ecole->name }}</li>
            </ol>
        </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body menu">
            <input type="hidden" name="ecole_id" value="{{$ecole->id}}">
            <div class="row d-flex justify-content-center p-4">
                <a href="{{ route('profs.emploi_temps.index') }}" class="col-md-3 m-2">
                    <i class="fa fa-calendar"></i>
                    <p>EMPLOI DU TEMPS</p>
                </a>
                <a href="{{ route('profs.notes.ecole',$ecole->token) }}" class="col-md-3 m-2">
                    <i class="fa fa-edit"></i>
                    <p>NOTES</p>
                </a>
                <a href="{{route('profs.cours',$ecole->token)}}" class="col-md-3 m-2">
                    <i class="fa fa-file-text"></i>
                    <p>APPUIE DES COURS</p>
                </a>
                <a href="#" class="col-md-3 m-2">
                    <i class="fa fa-money"></i>
                    <p>MES PAIEMENTS</p>
                </a>
                <a href="{{route('profs.abscences.ecole.index',$ecole->token)}}" class="col-md-3 m-2">
                    <i class="fa fa-edit"></i>
                    <p>ABSCENCES</p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
