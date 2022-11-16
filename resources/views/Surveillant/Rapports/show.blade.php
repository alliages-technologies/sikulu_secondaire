@extends('layouts.surveillant')
@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2> Information sur le rapport de cours</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <section class="section gray-bg" id="contactus">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-title">
                                        <h2> <strong>Titre : </strong> {{$rapport_cour->name}} </h2>
                                        <h4 class="mt-4"> <strong> Détail </strong></h4>
                                        <p> {{$rapport_cour->detail}} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-row-reverse">
                                <div class="col-md-7 col-lg-8 m-15px-tb">
                                    <div class="responsive">
                                        <h5> <strong> Appuie de cours </strong></h5>
                                        @if ($rapport_cour->appuie_id == 0)

                                            @else
                                            <embed src="{{asset($rapport_cour->appuie_id?$rapport_cour->appuie->cours:"")}}" width="700" height="350" type="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-4 m-15px-tb">
                                    <div class="contact-name">
                                        <h5> Matiere </h5>
                                        <p> <strong> {{ $rapport_cour->pel->matiere->name }} </strong>, <br> Tranches </p>
                                    </div>
                                    <div class="contact-name">
                                        <h5> SALLE </h5>
                                        <p> <strong> {{ $rapport_cour->salle->name }} </strong>, <br>{{$rapport_cour->salle->classe->name}}</p>
                                    </div>
                                    <div class="contact-name">
                                        <h5>DATE & HEURE</h5>
                                        <p> {{ $rapport_cour->created_at }} </p>
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
