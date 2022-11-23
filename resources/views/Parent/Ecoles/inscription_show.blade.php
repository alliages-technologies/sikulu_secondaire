@extends('layouts.parent')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="text-center mt-4 mb-4" style="letter-spacing: 1px; box-shadow: 0px 0px 3px 0px #007bff;"> Menu de l'élêve {{$inscription->name}} </h4>
            <div class="container menu">
                <div class="row d-flex justify-content-center p-4">
                    <a href="{{ route('parents.inscription.note',$inscription->token) }}" class="col-md-3 m-2">
                        <i class="fa fa-file-text"></i>
                        <p>Relevés de Notes</p>
                    </a>
                    <a href="{{ route('parents.emploie.temps',$inscription->token)}}" class="col-md-3 m-2">
                        <i class="fa fa-calendar"></i>
                        <p>Emploi du temps</p>
                    </a>
                    <a href="{{ route('parents.notes',$inscription->token) }}" class="col-md-3 m-2">
                        <i class="fa fa-edit"></i>
                        <p>Notes</p>
                    </a>
                    <a href="{{route('parents.appuie.cours',$inscription->token)}}" class="col-md-3 m-2">
                        <i class="fa fa-file"></i>
                        <p>Appuies de cours</p>
                    </a>
                    <a href="{{ route('parents.paiements',$inscription->token)}}" class="col-md-3 m-2">
                        <i class="fa fa-money"></i>
                        <p>Mes paiements</p>
                    </a>
                    <a href="{{ route('parents.rapports.index',$inscription->token) }}" class="col-md-3 m-2">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                        Rapport Cours
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
