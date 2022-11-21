@extends('layouts.responsablefinances')
@section('content')
<div class="container mt-5">
    <form action="{{route('responsablefinances.pointages.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-2">
                <select name="mois_id" id="" class="form-control" required>
                    <option value="">SELECTION DU MOIS</option>
                    @foreach ($mois as $moi)
                    <option value="{{$moi->id}}"> {{$moi->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button href="" class="btn btn-outline-primary">RECHERCHER <i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-">
        </div>
        <div class="card-body">
            <h4 class="mt-3 mb-2 ml-2" style="text-transform:uppercase">Apperçu Salaires Annuels des profs</h4>
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
                        <td> {{$prof_ecole->prof->pointages->sum('nbr_heure')}} </td>
                        <td> {{number_format($prof_ecole->montant,0,"",".")}} XAF </td>
                        <td> {{number_format($prof_ecole->prof->pointages->sum('nbr_heure')*$prof_ecole->montant, 0,"",".")}} XAF </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
