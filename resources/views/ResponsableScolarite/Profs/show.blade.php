@extends('layouts.responsablescolarite')


@section('title')
Profil Professeur | {{$prof->nom.' '.$prof->prenom}}
@endsection

@section('content')

<div class="container mt-4 col-md-10">
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-edit float-right"></i>
                <!--a href="#" style="float: right;"><i class="fa fa-edit btn btn-default"></i></a-->
            </h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img style="height: 200px; width: 200px;" src="{{asset($prof->image)}}" alt="">
                <a href="#" class="btn btn-outline-dark pointage-heure">POINTAGE / HEURE</a> <br>
                <form action="/responsablescolarite/pointages/pointer" method="post">
                    @csrf
                    <div class="row mt-3 pointage-saisie">
                        <div class="col-md-3 d-flex">
                            <input type="hidden" name="id" value="{{$prof_ecole->id}}">
                            <input type="number" name="montant" class="form-control" placeholder="Montant du pointage/heure">
                            <button class="btn btn-success ml-2"> <i class="fa fa-save"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
            <p class="">
                Nom(s): <strong>{{$prof->nom}}</strong> <br>
                Prénom(s): <strong>{{$prof->prenom}}</strong> <br>
                Date & lieu de naissance: <strong>{{$prof->date_naiss}} à {{$prof->lieu_naiss}}</strong> <br>
                <hr>
                Adresse: <strong>{{$prof->adresse}}</strong> <br>
                Téléphone: <strong>{{$prof->telephone}}</strong> <br>
                Email: <strong>{{$prof->user->email}}</strong> <br>
                <hr>
                Dernier diplôme: <strong>{{$prof->diplome->name}}</strong>
                <hr>
                Pointé à : <strong> {{$prof_ecole->montant}} XAF </strong>
            </p>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.pointage-saisie').hide();
        $('.pointage-heure').click(function (e) {
            e.preventDefault();
            $('.pointage-saisie').show(900);
        });
    });
</script>

@endsection
