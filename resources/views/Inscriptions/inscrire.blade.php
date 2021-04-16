@extends('layouts.admin')
@section('content')
<div class="container-fluid mt-5">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="text-left">Inscription de {{$eleve->nom}} </h3>
        </div>
        <div class="card-body cb">
            <form action="/inscriptions/inscrit" method="post" class="mt-4">
            @csrf
                <input type="hidden" name="eleve_id" value="{{$eleve->id}}">
                <div class="row">
                    <div class="col-md-4">
                        <select name="classe_id" id="" class="form-control" required>
                            <option value="">Classe</option>
                            @foreach($classes as $classe)
                            <option value="{{$classe->id}}"> {{$classe->name}} {{$classe->serie_id?$classe->serie->name:""}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="montant_inscri" placeholder="Montant de l'inscription..." required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="montant_frais" placeholder="Montant des frais..." required>
                    </div>
                </div>
                <button class="btn btn-success mt-3">Valider <i class="fa fa-save"></i></button>
            </form>
        </div>
    </div>
</div>

@endsection
