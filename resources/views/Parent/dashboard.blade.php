@extends('layouts.parent')
@section('content')
<div class="container mt-4">
    <h2>Liste des écoles <i class="fa fa-building"></i></h2>
    <div class="card">
        <div class="card-body menu">
            <div class="row d-flex justify-content-center p-4">
                @foreach ($ecoles as $ecole)
                <a href="{{ route('parents.ecoles.show',$ecole->ecole_id) }}" class="col-md-3 m-2">
                    <i class="fa fa-building"></i>
                    <p>{{ $ecole->ecole->name }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
