@extends('layouts.parent')


@section('content')
<div class="conatainer mt-4">
    <div class="card">
        <div class="card-body menu">
            <div class="row d-flex justify-content-center p-4">
                @foreach ($ecoles as $ecole)
                <a href="{{ route('parents.ecoles.show',$ecole->id) }}" class="col-md-3 m-2">
                    <i class="fa fa-building"></i>
                    <p>{{ $ecole->ecole->name }}</p>
                </a>
                @endforeach
                <a href="/deconnexion" class="col-md-3 m-2" style="color: red">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
