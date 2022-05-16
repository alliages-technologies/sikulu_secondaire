@extends('layouts.adminecole')


@section('title')
Admin Ecole | Finances
@endsection

@section('content')

<div class="container menu">
    <div class="row d-flex justify-content-center p-4">
        <a href="{{route('adminecole.ecolages.index')}}" class="col-md-3 m-2">
            <i class="fa fa-"></i>
            <p>Ecolages</p>
        </a>
        <a href="{{route('adminecole.depenses.index')}}" class="col-md-3 m-2">
            <i class="fa fa-"></i>
            <p>Dépenses</p>
        </a>
        <a href="/home" class="col-md-3 m-2">
            <i class="fa fa-arrow-left"></i>
            <p>Retour</p>
        </a>
    </div>
</div>

@endsection
