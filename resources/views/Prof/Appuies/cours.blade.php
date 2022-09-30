@extends('layouts.prof')
@section('content')
<div class="container ges-ac mt-5">
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-door-open"></i> | GESTION DES APPUIES DE COURS
                <button class="btn btn-sm btn-default float-right ml-2 ac"> <i class="fa fa-book"></i> </button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <tr>
                        <th>CLASSE</th>
                        <th>MATIERE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appuie_cours as $appuie_cour)
                    <tr>
                        <td> {{$appuie_cour->pel->sallen}} </td>
                        <td> {{$appuie_cour->pel->matieren}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
        <section style="margin-top: -1pc" class="credit-card">
            <div class="container">
                <div class="card-holder">
                <div class="card-box bg-news">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="img-box">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-fluid" />
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <form action="/profs/bar" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-details">
                        <h3 class="title">APPUIE DE COURS</h3>
                        <div class="row">
                        <div class="form-group col-sm-7">
                        <div class="inner-addon right-addon">
                            <label for="card-holder">Objet</label>
                            <i class="far fa-user"></i>
                            <input name="objet" id="card-holder" type="text" class="form-control" placeholder="Titre...(Ex:Devoir de classe)" aria-label="Card Holder" aria-describedby="basic-addon1" required>
                        </div>
                        </div>
                        <div class="form-group col-sm-7">
                                <div class="inner-addon right-addon">
                                <label for="card-holder">Salle et Cours</label>
                                <select name="programme_ecole_ligne_id" id="" class="form-control">
                                    <option value="">S & C</option>
                                    @foreach ($pes as $pe)
                                    @foreach ($pe->lpes->where('enseignant_id',$prof->id) as $pel)
                                    <option value="{{$pel->id}}">{{$pel->programmeecole->salle->classe->name}} ({{$pel->programmeecole->salle->abb}}) | {{$pel->matiere->name}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-8">
                        <div class="inner-addon right-addon">
                            <label for="card-number">CHARGER LE SUPPORT</label>
                            <i class="far fa-credit-card"></i>
                            <input name="cours" id="card-number" type="file" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1" required>
                        </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <button  type="submit" class="btn btn-primary btn-block">ENVOYER <i class="fa fa-paper-plane"></i></button>
                        </div>
                        </div>
                    </div>
                    </form>

                    </div><!--/col-lg-6 -->

                </div><!--/row -->
                </div><!--/card-box -->
                </div><!--/card-holder -->

            </div><!--/container -->
		</section>

<style type="text/css">
        body{margin-top:0px;}

        .credit-card{
        background-color: #f4f4f4;
        height: 100vh;
        width: 100%;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        }
        .card-holder {
        margin: 2em 0;
        }

        .img-box {
        padding-top: 20px;
        display: flex;
        justify-content: center;
        }
        .card-box {
        font-weight: 800;
        padding: 1em 1em;
        border-radius: 0.25em;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .bg-news {
        background: -webkit-linear-gradient(70deg, #007bff 40%, #ffffff 40%);
        background: -o-linear-gradient(70deg, #007bff 40%, #ffffff 40%);
        background: -moz-linear-gradient(70deg, #007bff 40%, #ffffff 40%);
        background: linear-gradient(70deg, #007bff 40%, #ffffff 40%);
        }
        .btn-primary{
        background-image: -webkit-linear-gradient(315deg, #007bff 0%, #007bff 100%);
        background-image: -moz- oldlinear-gradient(315deg, #007bff 0%, #007bff 100%);
        background-image: -o-linear-gradient(315deg, #007bff 0%, #007bff 100%);
        background-image: linear-gradient(135deg, #007bff 0%, #007bff 100%);
        -webkit-filter: hue-rotate(0deg);
        filter: hue-rotate(0deg);
        border: none !important;
        }

        .credit-card form{
            background-color: #ffffff;
            padding: 0;
            max-width: 600px;
            margin: auto;
        }

        .credit-card .title{
            font-family: 'Abhaya Libre', serif;
            font-size: 1em;
            color: #2C3E50;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            margin-bottom: 0.8em;
            font-weight: 600;
            padding-bottom: 8px;
        }
        .credit-card .card-details{
            padding: 25px 25px 15px;
        }

        .inner-addon {
        position: relative;
        }

        .inner-addon .fas, .inner-addon .far {
        position: absolute;
        padding: 10px;
        pointer-events: none;
        color: #bcbdbd !important;
        }
        .right-addon .fas, .right-addon .far { right: 0px; top: 40px;}
        .right-addon input { padding-right: 30px; }

        .credit-card .card-details label{
            font-family: 'Abhaya Libre', serif;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 15px;
            color: #79818a;
            text-transform: uppercase;
        }

        .credit-card .card-details input[type="text"] {
            font-family: "Poppins", sans-serif;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 10px 10px 5px;
            -webkit-appearance: none;
            display: block;
            background: #fafafa;
            color: #636363;
            border: none;
            border-radius: 0;
            border-bottom: 1px solid #757575;
        }
        .credit-card .card-details input[type="text"]:focus { outline: none; }

        .credit-card .card-details button{
            margin-top: 0.6em;
            padding:12px 0;
            font-weight: 600;
        }

        .credit-card .date-separator{
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .credit-card{
            height: 250vh;
            width: 100%;
            }
            .credit-card .title {
                font-size: 1.2em;
            }

            .credit-card .row .col-lg-6 {
                margin-bottom: 40px;
            }
            .credit-card .card-details {
                padding: 40px 40px 30px;
            }

            .credit-card .card-details button {
                margin-top: 2em;
            }
    }
</style>
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>
    $('.credit-card').hide();
    $('.ac').click(function (e) {
        e.preventDefault();
        $('.credit-card').show(800);
        $('.ges-ac').hide(700);
    });
</script>
@endsection
