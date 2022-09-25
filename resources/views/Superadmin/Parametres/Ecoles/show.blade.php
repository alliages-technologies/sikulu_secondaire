@extends('layouts.superadmin')


@section('title')
Superadmin | {{$ecole->name}}
@endsection

@section('content')


<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 class="counter-count">{{$inscriptions->count()}}</h3>
                    <p>Nombre d'Inscrits</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 class="counter-count">{{$abscences->count()}}</h3>
                    <p>Nombre d'Abscents</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 class="counter-count chiffre" data-chiffre="{{ $ecolages->sum('montant') }}">{{ $ecolages->sum('montant') }} </h3>

                    <p>Chiffre d'Affaire (XAF)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="counter-count">{{$pourcentage}} </h3>
                    <p>Pourcentage d'Admission (<sup style="font-size:20px">%</sup>)</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Plus d'Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</div>



<div class="container mt-4 col-md-10">
    <div class="card">
        <div class="card-header">
            <h2>
            <i class="fa fa-building"></i> DETAILS SUR L'ETABLISSEMENT
                <!--button style="float: right;" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button-->
            </h2>
        </div>
        <div class="card-body">
            <img src="{{asset($ecole->image_uri)}}" alt="" srcset="">
            <hr>
            <span>
                <h5>INFORMATIONS SUR L'ECOLE</h5>
                Désignation: <strong>{{$ecole->name}}</strong> <br>
                Type d'enseignement: <strong>{{$ecole->type->name}}</strong> <br>
                Adresse: <strong>{{$ecole->address}}</strong> <br>
                Téléphone: <strong>{{$ecole->phone}}</strong> <br>
                Email: <strong>{{$ecole->email}}</strong> <br>
            </span>
            <hr>
            <span>
                <h5>INFORMATIONS SUR L'ADMIN</h5>
                Nom: <strong>{{$ecole->user->name}}</strong> <br>
                Email: <strong>{{$ecole->user->email}}</strong> <br>
            </span>
        </div>
    </div>
</div>
@endsection
