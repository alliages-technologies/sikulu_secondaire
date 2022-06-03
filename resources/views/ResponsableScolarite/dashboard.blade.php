@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Acceuil
@endsection

@section('content')

<div class="container menu mt-4">
    <div class="card">
        <div class="card-header text-center">
            <h1>GESTION DE LA SCOLARITE</h1>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center p-4">
                <a href="{{ route('responsablescolarite.profs.index') }}" class="col-md-3 m-2">
                    <i class="fa fa-users"></i>
                    <p>Enseignants</p>
                </a>
                <a href="" class="col-md-3 m-2">
                    <i class="fa fa-user-plus"></i>
                    <p>Inscriptions</p>
                </a>
                <a href="" class="col-md-3 m-2">
                    <i class="fa fa-user-circle"></i>
                    <p>Réinscriptions</p>
                </a>
                <a href="/deconnexion" class="col-md-3 m-2">
                    <i class="fa fa-power-off"></i>
                    <p>Déconnexion</p>
                </a>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection
