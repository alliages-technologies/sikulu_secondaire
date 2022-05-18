@extends('layouts.prof')
@section('content')

<h4 class="text-center mt-4" style="letter-spacing: 2px">Liste des écoles</h4>

<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        @foreach ($ecoles as $ecole)

            <a href="{{ route('parents.ecoles.show',$ecole->id) }}" class="col-md-3 m-2">
                <i class="fa fa-building"></i>
                <p>{{ $ecole->ecole->name }}</p>
            </a>

        @endforeach

        <a href="/deconnexion" class="col-md-3 m-2">
            <i class="fa fa-power-off"></i>
            <p>Déconnexion</p>
        </a>
    </div>
</div>

@endsection
