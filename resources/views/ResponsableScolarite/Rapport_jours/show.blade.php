@extends('layouts.responsablescolarite')
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
                                        <h2> <strong>Titre : </strong> {{$rapport_jour->name}} </h2>
                                        <h4 class="mt-4"> <strong> Détail </strong></h4>
                                        <p> {{$rapport_jour->detail}} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-row-reverse">
                                <div class="col-md-5 col-lg-4 m-15px-tb">
                                    <div class="contact-name">
                                        <h5>DATE & HEURE</h5>
                                        <p> {{ $rapport_jour->created_at }} </p>
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
