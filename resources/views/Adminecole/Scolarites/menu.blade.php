@extends('layouts.adminecole')


@section('title')
Admin Ecole | Menu Scolarité
@endsection

@section('content')
<div class="card mt-4 menu">
    <div class="card-header">
        <h2>MENU SCOLARITE</h2>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <div class="container text-center">
                <div class="row d-flex justify-content-center p-1">
                    @foreach ($trimestre_ecoles as $trimestre_ecole)
                    <a href="/adminecole/scolarite-menu/{{ $trimestre_ecole->trimestre->id }}/{{ $trimestre_ecole->ecole->token }}" class="col-md-3 m-2">
                        <i class="fa fa-file mb-1"></i>
                        <p>{{ $trimestre_ecole->trimestre->name }}</p>
                    </a>
                    <input type="hidden" name="trimestre_id" value="{{ $trimestre_ecole->trimestre->id}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
