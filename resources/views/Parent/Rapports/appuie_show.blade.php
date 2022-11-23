@extends('layouts.parent')
@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2> Détail sur l'appuie de cours</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <section class="section gray-bg" id="contactus">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-title">
                                        <h2> <strong>Titre : </strong> {{$appuie_cour->objet}} </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-row-reverse">
                                <div class="col-md-7 col-lg-8 m-15px-tb">
                                    <div class="responsive">
                                        <h5> <strong> PDF </strong></h5>
                                        <embed src="{{asset($appuie_cour->cours)}}" width="700" height="350" type="">
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-4 m-15px-tb">
                                    <div class="contact-name">
                                        <h5> Matiere </h5>
                                        <p> <strong> {{ $appuie_cour->pel->matiere->name }} </strong>, <br> Tranches </p>
                                    </div>
                                    <div class="contact-name">
                                        <h5> SALLE </h5>
                                        <p> <strong> {{ $appuie_cour->salle->name }} </strong>, <br>{{$appuie_cour->salle->classe->name}}</p>
                                    </div>
                                    <div class="contact-name">
                                        <h5>DATE & HEURE</h5>
                                        <p> {{ $appuie_cour->created_at }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
