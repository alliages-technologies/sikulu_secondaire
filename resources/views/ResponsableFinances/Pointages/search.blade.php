@extends('layouts.responsablefinances')
@section('content')
<div class="container mt-5">
    <h2 class="mb-3">SALAIRES DU MOIS DE <strong style="text-transform: uppercase;">{{$moi->name}}</strong> </h2>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ENSEIGNANT</th>
                        <th>NBR_HEURE</th>
                        <th>POINTAGE/HEURE</th>
                        <th>NET A PAYER</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prof_ecoles as $prof_ecole)
                    <tr>
                        <td> {{$prof_ecole->prof->name}} </td>
                        <td> {{$prof_ecole->prof->pointages->where('mois_id',$mois)->sum('nbr_heure')}} </td>
                        <td> {{number_format($prof_ecole->montant,0,"",".")}} XAF </td>
                        <td> {{number_format($prof_ecole->prof->pointages->where('mois_id',$mois)->sum('nbr_heure')*$prof_ecole->montant, 0,"",".")}} XAF </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
