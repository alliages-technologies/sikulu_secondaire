@extends('layouts.adminecole')

@section('title')
Admin Ecole | Modification Salle
@endsection

@section('content')
<div class="modal-content mt-4">
    <div class="modal-header card-header">
        <h4 class="modal-title" id="exampleModalLabel">MODIFICATION D'UNE SALLE</h4>
    </div>
    <div class="modal-body">
        <div class="flex-container">
            <div class="form-group">
                <form action="{{route('adminecole.salle.update', $salle->id)}}" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label>Désignation</label>
                            <input type="text" class="form-control" value="{{$salle->classe->name}}" name="name" required>
                        </div>
                        <div class="col">
                            <label >Abbréviation</label>
                            <input type="text" class="form-control" value="{{$salle->abb}}" name="abb" required>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-md-6">
                            <label>Nombre de places</label>
                            <input type="number" class="form-control" value="{{$salle->nombre_places}}" name="nombre_places" required>
                        </div>
                        <div class="col-md-6">
                            <label>Montant</label>
                            <input type="number" class="form-control" value="{{$salle->montant}}" name="montant" required>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col">
                            <select name="classe_id" id="" class="form-control">
                                <option value="">SELECTIONNEZ LA CLASSE</option>
                                @foreach ($pns as $pn)
                                <option value="{{ $pn->classe->id }}">{{ $pn->classe->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-default mt-3">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
