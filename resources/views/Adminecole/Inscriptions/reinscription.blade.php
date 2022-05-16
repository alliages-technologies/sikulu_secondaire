@extends('layouts.adminecole')
@section('content')
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="text-left">Réinscription d'un élêve <i class="fa fa-user-graduate"></i></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ route('adminecole.reinscriptions.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="annee_id" name="annee_id" value="{{$annee_acad->id}}">
                    <div class="row info-a">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <legend>Verification de l'éleve</legend>
                                        <div class="row mt-1">
                                            <div class="col-md-6">
                                                <label for="">Salle (Precédente)</label>
                                                <select name="" id="" class="form-control salle_id" riquired>
                                                    <option value="">choix</option>
                                                    @foreach ($salles as $salle)
                                                    <option value="{{ $salle->id }}"> {{ $salle->abb }} / {{ $salle->classe->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Eleve</label>
                                                <select name="inscription_id" id="" class="form-control inscription_id" required>
                                                    <option value="">choix</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Salle (Nouvelle classe)</label>
                                                <select name="salle_id" id="" class="form-control nsalle_id" required>
                                                    <option value="">choix</option>
                                                    @foreach ($salles as $salle)
                                                    <option value="{{ $salle->id }}"> {{ $salle->abb }} / {{ $salle->classe->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="ln">Montant</label>
                                                <input type="number" class="form-control montant_inscri" id="ln" name="montant_inscri" required>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-save">Enrégistrer <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/reinscription.js') }}"></script>
@endsection
