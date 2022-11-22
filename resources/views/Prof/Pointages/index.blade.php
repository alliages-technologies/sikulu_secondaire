@extends('layouts.prof')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-">
        </div>
        <div class="card-body">
            <h4 class="mt-3 mb-2 ml-2" style="text-transform:uppercase">Apperçu de mes Salaires Annuels par mois</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>MOIS</th>
                        <th>NBR_HEURE</th>
                        <th> POINTAGE/HEURE </th>
                        <th>NET A PAYER</th>
                        <th>  </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mois as $moi)
                    <tr>
                        <td> {{$moi->name}} </td>
                        <td> {{$prof_ecole->prof->pointages->where('mois_id',$moi->id)->sum('nbr_heure')}} </td>
                        <td> {{number_format($prof_ecole->montant,0,"",".")}} XAF </td>
                        <td> {{number_format($prof_ecole->prof->pointages->where('mois_id',$moi->id)->sum('nbr_heure')*$prof_ecole->montant, 0,"",".")}} XAF </td>
                        <td> <a href="/profs/pointages-ecole-search/{{$prof_ecole->ecole->token}}/{{$moi->id}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
