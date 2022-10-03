@extends('layouts.superadmin')
@section('content')
<div class="container mt-5">
    <div class="modal-content">
        <div class="modal-header card-header">
            <h4 class="modal-title" id="exampleModalLabel">MODIFICATION DE LA MATIERE <strong>"{{$programmenational_ligne->matiere->name}}"</strong> </h4>
        </div>
        <div class="modal-body">
            <form action="{{route('superadmin.pn.update',$programmenational_ligne->id)}}" method="post" class="mb-4">
                @csrf
                <div class="form-row">
                    <div class="col-md-6">
                        <select name="matiere_id" id="" class="form-control matiere_id" required>
                            <option value="">Choix de la matiere</option>
                            @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" data-matiere_id="{{ $matiere->id }}" data-matiere="{{ $matiere->name }}">{{ $matiere->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="coefficient" class="form-control" placeholder="coefficient" value="{{$programmenational_ligne->coefficient}}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-default mt-2">ENREGISTRER</button>
            </form>
        </div>
    </div>
</div>

@endsection
