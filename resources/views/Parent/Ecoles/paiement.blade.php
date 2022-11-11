@extends('layouts.parent')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="text-center mt-4 mb-4" style="letter-spacing: 1px; box-shadow: 0px 0px 3px 0px #007bff;"> Historique de mes Paiements de {{$inscription->name}} </h4>
            <div class="container menu">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Mois </th>
                            <th> Montant </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ecolages as $ecolage)
                            <tr>
                                <td> {{$ecolage->moi->name}} </td>
                                <td> {{number_format($ecolage->montant, 0,"",".")}} XAF </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <table class="table table-bordered">
                    <thead>
                        <h4>Historique Globale des paiements</h4>
                    </thead>
                    <tbody>

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
        </div>

    </div>
</div>

@endsection
