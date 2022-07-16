@extends('layouts.adminecole')


@section('title')
Admin Ecole | Programmes {{ $salle->name }}
@endsection

@section('content')

<div class="container mt-5">
    <div class="card mt-5 menu">
        <div class="card-header">
            <h2>PROGRAMME <strong>|</strong> {{ $salle->name }}</h2>
        </div>
        <div class="card-body ">
            <div class="container text-center">
                <div class="row d-flex justify-content-center p-1">
                    <a href="{{ route('adminecole.programmes-ecole.show',$salle->token) }}" class="col-md-3 m-2">
                        <i class="fa fa-folder"></i>
                        <p>Programme</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
