@extends('layouts.responsablefinances')
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="m-2">
            <span style="font-size: 20px; font-weight: "> {{Auth::user()->ecole->name}} </span> <br>
            <span style="font-size: 20px; font-weight: "> {{Auth::user()->ecole->email}} </span> <br>
            <span style="font-size: 20px; font-weight: "> {{Auth::user()->ecole->address}} </span> <br>
            <img style="width: 16%;height: 150px; float: right;" src="{{asset(Auth::user()->ecole->image_uri)}}" alt="" srcset="">
        </div>
        <div class="card-body">
            <h2 class="mb-4"> SALAIRES DU MOIS DE <strong style="text-transform: uppercase;">{{$moi->name}} </strong> </h2>
            <table class="table table-salaire">
                <thead>
                    <tr>
                        <th>ENSEIGNANT</th>
                        <th>NBR_HEURE</th>
                        <th>POINTAGE/HEURE</th>
                        <th>NET A PAYER</th>
                        <th>SIGNATURE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prof_ecoles as $prof_ecole)
                    <tr>
                        <td> {{$prof_ecole->prof->name}} </td>
                        <td> {{$prof_ecole->prof->pointages->where('mois_id',$mois)->sum('nbr_heure')}} </td>
                        <td> {{number_format($prof_ecole->montant,0,"",".")}} XAF </td>
                        <td data-montant="{{number_format($prof_ecole->prof->pointages->where('mois_id',$mois)->sum('nbr_heure')*$prof_ecole->montant, 0,"",".")}}"> {{number_format($prof_ecole->prof->pointages->where('mois_id',$mois)->sum('nbr_heure')*$prof_ecole->montant, 0,"",".")}} XAF </td>
                        <td>  </td>
                        <input type="hidden" name="" class="montant" value="{{$prof_ecole->prof->pointages->where('mois_id',$mois)->sum('nbr_heure')*$prof_ecole->montant}}">
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td>TOTAL</td>
                        <td class="montantAdd" style="font-size: 23px; font-weight: bold">  </td>
                    </tr>
                    <tr class="mt-2">
                        <td> <span style="font-size: 15px;font-weight: bold;"> Signature </span> <br><br><br> <span style="font-size: 20px;font-weight: bold;"> {{Auth::user()->name}} </span> </td>
                    </tr>

                </tbody>
            </table>
            <div class="" style="float: right">
                <strong> Directeur </strong> <br> <br> <br>
                <span style="font-size: 20px;font-weight: bold;"> {{ $directeur->name }} </span>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>

$(document).ready(function () {

    var total = 0;
    $('.montant').each(function() {
        var montant = $(this).val();
        total += Number(montant);
        $('.montantAdd').html("");
        $('.montantAdd').append((total/1000).toFixed(3)," XAF");
        //console.log(total);
    });

});


</script>

@endsection
