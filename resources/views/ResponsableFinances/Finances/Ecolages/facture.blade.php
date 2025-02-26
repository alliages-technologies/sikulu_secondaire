<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>  </title>
	<script src="{{asset('facture/jquery.min.js')}}"></script>
    <link href="{{asset('facture/bootstrap.min.css')}}" rel="stylesheet">
	<script src="{{asset('bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
</head>
<body>
<div class="col-md-12">
    <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="receipt-header">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">
                            <div class="card-body mb-4">
                                    {{QrCode::size(100)->generate("Paiement de l'élêve ".$ecolage->inscription->name." | reste à payer : ".number_format($reste_a_payer, 0,"",".") . ' XAF')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <h5> {{$ecolage->inscription->ecole->name}} . <i class="fa fa-"></i></h5>
                            <p>{{$ecolage->inscription->ecole->email}} <i class="fa fa-envelope"></i></p>
                            <p>Congo-Brazzaville <i class="fa fa-location-arrow"></i></p>
                            <p>+242 {{$ecolage->inscription->ecole->telephone}} <i class="fa fa-phone"></i></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <h5> {{$ecolage->inscription->eleve->name}} </h5>
                            <p><b>Classe :</b> {{$ecolage->inscription->salle->classe->name}} </p>
                            <p><b>Salle :</b> {{$ecolage->inscription->salle->abb}} </p>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h4 style="text-transform: uppercase;">reçu # {{$ecolage->id}} </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-transform: uppercase"> Somme versée </th>
                            <th>MOIS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"> <mark style="font-size: 20px;letter-spacing: 1px;font-weight: bold;"> {{number_format($ecolage->montant, 0,'','.')}} XAF </mark> </td>
                            <td class="col-md-3"> <mark style="font-size: 20px;letter-spacing: 1px;font-weight: bold;"> {{$mois->name}} / {{$ecolage->created_at->format('Y')}} </mark> </td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Prix Mensuel : </strong>
                            </p>
                            <p>
                                <strong>Total Annuel: </strong>
                            </p>
                            <p>
                                <strong>Total Versé: </strong>
                            </p>
                            </td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> {{number_format($ecolage->inscription->montant_inscri, 0,"",".")}} XAF </strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> {{number_format($totalannuel, 0,"",".")}} XAF</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> {{number_format($totalverse, 0,"",".")}} XAF</strong>
                            </p>
                            </td>
                        </tr>
                        <tr>

                            <td class="text-right"><h2><strong style="text-transform: uppercase;font-size: 15px;">Reste à payer: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong style="font-size: 15px;">{{number_format($reste_a_payer, 0,"",".")}}  XAF </strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <p><b>Fait le :</b> {{date_format( $ecolage->created_at, ' d/m/Y' )}} </p>
                            <h5 class="mt-5" style="color: rgb(140, 140, 140);">Merci Pour la confiance..!</h5>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h1> <b style="font-size: 13px;"> Heure </b> :  {{date_format($ecolage->created_at,'H:m:s')}}</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

   <style type="text/css">
       body{
       background:#eee;
       margin-top:20px;
       font-family: Arial, Helvetica, sans-serif;
       }
       .text-danger strong {
                   color: #f62828;
               }
               .receipt-main {
                   background: #ffffff none repeat scroll 0 0;
                   border-bottom: 12px solid #ffffff;
                   border-top: 12px solid #585c62;
                   margin-top: 50px;
                   margin-bottom: 50px;
                   padding: 40px 30px !important;
                   position: relative;
                   box-shadow: 0 1px 21px #e8e8e8;
                   color: #333333;
                   font-family: Arial, Helvetica, sans-serif;
               }
               .receipt-main p {
                   color: #676262;
                   font-family: open sans;
                   line-height: 1.42857;
               }
               .receipt-footer h1 {
                   font-size: 15px;
                   font-weight: 400 !important;
                   margin: 0 !important;
               }
               .receipt-main::after {
                   background: #414143 none repeat scroll 0 0;
                   content: "";
                   height: 5px;
                   left: 0;
                   position: absolute;
                   right: 0;
                   top: -13px;
               }
               .receipt-main thead {
                   background: #414143 none repeat scroll 0 0;
               }
               .receipt-main thead th {
                   color:#fff;
               }
               .receipt-right h5 {
                   font-size: 16px;
                   font-weight: bold;
                   margin: 0 0 7px 0;
               }
               .receipt-right p {
                   font-size: 12px;
                   margin: 0px;
               }
               .receipt-right p i {
                   text-align: center;
                   width: 18px;
               }
               .receipt-main td {
                   padding: 9px 20px !important;
               }
               .receipt-main th {
                   padding: 13px 20px !important;
               }
               .receipt-main td {
                   font-size: 13px;
                   font-weight: initial !important;
               }
               .receipt-main td p:last-child {
                   margin: 0;
                   padding: 0;
               }
               .receipt-main td h2 {
                   font-size: 20px;
                   font-weight: 900;
                   margin: 0;
                   text-transform: uppercase;
               }
               .receipt-header-mid .receipt-left h1 {
                   font-weight: 100;
                   margin: 34px 0 0;
                   text-align: right;
                   text-transform: uppercase;
               }
               .receipt-header-mid {
                   margin: 24px 0;
                   overflow: hidden;
               }

               #container {
                   background-color: #dcdcdc;
           }
   </style>


<script type="text/javascript">

</script>
</body>
</html>
