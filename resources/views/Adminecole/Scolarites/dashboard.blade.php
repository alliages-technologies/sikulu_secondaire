@extends('layouts.adminecole')


@section('title')
Admin Ecole | {{ $trimestre_ecole->trimestre->name }}
@endsection

@section('content')
<div class="card mt-4 menu">
    <div class="card-header">
        <h2> {{ $trimestre_ecole->trimestre->name }} </h2>
        <input type="hidden" value="{{ $trimestre_ecole->trimestre->id }}" name="trimestre_ecole" class="trimestre_id">
        @if($trimestre)
            <input type="hidden" value="{{ $trimestre->trimestre->id }}" class="trimestre_active">
        @endif
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <div class="container text-center">
                <div class="row d-flex justify-content-center p-1">
                    <a href="/adminecole/scolarite-releve/{{ $trimestre_ecole->trimestre->id }}/{{ $trimestre_ecole->ecole->token }}/{{ $trimestre_ecole->id }}" class="col-md-3 m-2">
                        <i class="fa fa-book"></i>
                        <p>Relevés de notes</p>
                    </a>
                    @csrf
                    <a href="" class="col-md-3 m-2 btn-save">
                        <i class="fa fa-power-off"></i>
                        <p>Géneration des Relevés de notes</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/generation.js') }}"></script>
@endsection
