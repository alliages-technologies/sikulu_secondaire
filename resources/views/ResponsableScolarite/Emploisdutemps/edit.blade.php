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
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">TRANCHE HORAIRE</label>
                                    <input disabled type="text" value="{{$ligne_emploi_temp->tranche->name}}" class="form-control">
                                    <select name="" id="" class="form-control mt-2">
                                        <option value="">Choix</option>
                                        @foreach ($tranches as $tranche)
                                            <option value="{{$tranche->id}}">{{$tranche->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">MATIERE</label>
                                    <input disabled type="text" value="{{$ligne_emploi_temp->ligneprogrammeecole->matiere->name}}" class="form-control">
                                    <select name="" id="" class="form-control mt-2">
                                        <option value="">Choix</option>
                                        @foreach ($programme_ecole->lpes as $lpe)
                                            <option value="{{$lpe->matiere->id}}">{{$lpe->matiere->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Profs</label>
                                    <input disabled type="text" value="{{$ligne_emploi_temp->ligneprogrammeecole->prof}}" class="form-control">
                                    <select name="" id="" class="form-control mt-2">
                                        <option value="">Choix</option>
                                        @foreach ($programme_ecole->lpes as $lpe)
                                            <option value="{{$lpe->enseignant->id}}">{{$lpe->enseignant->name}} / {{$lpe->matiere->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
