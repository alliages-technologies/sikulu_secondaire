@extends('layouts.prof')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-">
        </div>
        <div class="card-body">
            <h4 class="mt-3 mb-2 ml-2" style="text-transform:uppercase">Apperçu du Salaires de {{$moi->name}} </h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>DATE/HEURE</th>
                        <th>NBR_HEURE</th>
                        <th> POINTAGE/HEURE </th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pointages as $pointage)
                    <tr>
                        <td> {{$pointage->created_at}} </td>
                        <td> {{$pointage->nbr_heure}} </td>
                        <td> {{number_format($prof_ecole->montant,0,"",".")}} XAF </td>
                        <td> {{number_format($prof_ecole->montant*$pointage->nbr_heure, 0,"",".")}} XAF </td>
                    </tr>
                    @endforeach
                    <tr class="">
                        <td>
                            <span style="font-weight: bold;"> TOTAL : </span>  <span style="font-size: 20px;font-weight: bold;"> {{number_format($prof_ecole->prof->pointages->where('mois_id',$moi->id)->sum('nbr_heure')*$prof_ecole->montant, 0,"",".")}} XAF </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
