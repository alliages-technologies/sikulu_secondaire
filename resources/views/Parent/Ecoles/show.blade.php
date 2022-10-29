@extends('layouts.parent')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="text-center mt-4 mb-4" style="letter-spacing: 1px; box-shadow: 0px 0px 3px 0px #007bff;">Bienvenue Mr   (Mme) {{ Auth::user()->name }} à l'école {{ $ecole->name }}</h4>
            <div class="container menu">
                <div class="row d-flex justify-content-center p-4">
                    <a href="{{ route('parents.inscriptions.index') }}" class="col-md-3 m-2">
                        <i class="fa fa-users"></i>
                        <p>Mes enfants</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
