@extends('layouts.adminecole')
@section('content')

<style>
    .table-bordered td, .table-bordered th {
    border: 1px solid #ffffff;
}
</style>
@if ($releve_note)

<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header" style="background-color: darkblue; color:white">
            <h4 class="text-left"> Relevé de notes | {{ $inscription->eleve->name }} <i class="fa fa-book"></i> </h4>
            <input type="hidden" value="{{ $inscription->id}}" class="inscription_id">
        </div>
        @csrf
        <div class="card-body">
            <div class="container"> 
                <table class="table table-bordered table-striped table-sm table-releve">
                    <thead class="" style="background-color: darkblue;color: white;">
                        <tr>
                            <th> Matière </th>
                            <th> Note </th>
                            <th> Coefficient </th>
                            <th> Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notes as $note)
                        <input type="hidden" value="{{ $note->trimestre_id}}" name="trimestre_id">
                        <tr class="tr" data-trimestre_id={{ $note->trimestre_id }} data-ligne_ecole_programme_id={{ $note->ligne_ecole_programme_id }} data-note_id={{ $note->id }} data-note={{ $note->valeur }}>
                            <td> {{$note->pel->matiere->name}} </td>
                            @if ($note->valeur >= 10)
                                <td style="color: green"> {{ $note->valeur }} </td>
                            @else
                                <td style="color: red"> {{ $note->valeur }} </td>
                            @endif
                            <td> {{$note->pel->coefficient }} </td>
                            <td> {{ $note->totalmatiere }} </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Total (Pts)</td>
                            <td></td>
                            <td>{{ $inscription->totalcoefficient }}</td>
                            <td>{{ $totaux }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: larger;">Moyenne Génerale :</td>
                            <td> </td>
                            <td> </td>
                            <td style="font-size: larger;" class="moyenne"> {{ $inscription->moyenne }} </td>
                        </tr>
                        <tr>
                            <td style="font-size: larger;">Rang :</td>
                            @if ($rang == 1)
                                <td> {{ $rang }}er(e) Sur {{ $inscriptions->count() }} </td>
                            @else
                                <td> {{ $rang }}ème Sur {{ $inscriptions->count() }} </td>
                            @endif
                            <td> </td>
                            <td style="font-size: ;"> {{$releve_note->appreciation}} </td>
                        </tr>
                    </tbody>
                </table>
                <a href="/adminecole/scolarite/releve-save/{{$inscription->id}}/{{ $salle->ecole->token }}/{{ $salle->id }}/{{ $releve_note->trimestre_id }}" style="background-color: darkblue; color:white"  class="btn btn-default float-right"> GENERATION DU RELEVE <i class="fa fa-print"></i> </a>
                {{ QrCode::size(100)->generate($inscription->eleve->name.' est '.$releve_note->appreciation. 'avec '.$releve_note->moyenne.' de moyenne') }}
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4"></div>
        <div class="col-4">
                <img class="mx-auto d-block" style="width: 70%;" src="{{ asset('img/releve_empty.jpg') }}" alt="" srcset="">
            </div>
        </div>
    </div>
@endif

<script src="{{ asset('js/releve.js') }}"></script>
@endsection
