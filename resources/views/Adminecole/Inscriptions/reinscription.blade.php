@extends('layouts.adminecole')


@section('title')
Admin Ecole | Réinscription
@endsection

@section('content')
<div class="container-fluid mt-5 col-md-10">
    <div class="card">
        <div class="card-header">
            <h2><i class="fa fa-user-graduate"></i> REINSCRIPTION</h2>
        </div>
        <form action="{{ route('adminecole.reinscriptions.save')}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" class="annee_id" name="annee_id" value="{{$annee_acad->id}}">
                <div class="col-md-12">
                    <div class="card-body">
                        <fieldset>
                            <legend>Verification de l'éleve</legend>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label for="">Salle Précedente</label>
                                    <select name="" id="" class="form-control salle_id" riquired>
                                        <option value="">CHOIX</option>
                                        @foreach ($salles as $salle)
                                        <option value="{{ $salle->id }}"> {{ $salle->abb }} / {{ $salle->classe->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Eleve</label>
                                    <select name="inscription_id" id="" class="form-control inscription_id" required>
                                        <option value="">CHOIX</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nouvelle classe</label>
                                    <select name="salle_id" id="" class="form-control nsalle_id" required>
                                        <option value="">CHOIX</option>
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
            <div class="card-footer">
                <button class="btn btn-success btn-save">ENREGISTER <i class="fa fa-save"></i></button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/reinscription.js') }}"></script>

@endsection
