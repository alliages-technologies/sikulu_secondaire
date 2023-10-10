@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Emploi du temps
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>MODIFICATION DE L'EMPLOI DU TEMPS</h2>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                        <form action="{{ route('responsablescolarite.emploi.edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$ligne_emploi_temp->id}}">
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label for="">TRANCHE HORAIRE</label>
                                    <input disabled type="text" value="{{$ligne_emploi_temp->tranche->name}}" class="form-control">
                                    <select name="tranche_id" id="" class="form-control mt-2">
                                        <option value="">Choix</option>
                                        @foreach ($tranches as $tranche)
                                            <option value="{{$tranche->id}}">{{$tranche->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label for="">MATIERE</label>
                                    <input disabled type="text" value="{{$ligne_emploi_temp->ligneprogrammeecole->matiere->name}}" class="form-control">
                                    <select name="matiere_id" id="" class="form-control mt-2">
                                        <option value="">Choix</option>
                                        @foreach ($programme_ecole->lpes as $lpe)
                                            <option value="{{$lpe->id}}">{{$lpe->matiere->name}} / {{$lpe->enseignant->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           {{--  <div class="row">
                                <div class="col-md-12 mt-4">
                                    <label for="">Profs</label>
                                    <input disabled type="text" value="{{$ligne_emploi_temp->ligneprogrammeecole->prof}}" class="form-control">
                                    <select name="prof_id" id="" class="form-control mt-2">
                                        <option value="">Choix</option>
                                        @foreach ($programme_ecole->lpes as $lpe)
                                            <option value="{{$lpe->enseignant->id}}">{{$lpe->enseignant->name}} / {{$lpe->matiere->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <button class="btn btn-success mt-2">Modifier <i class="fa fa-save"></i></button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
