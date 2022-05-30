@extends('layouts.adminecole')
@section('content')

<style>
    .table-bordered td, .table-bordered th {
    border: 1px solid #ffffff;
}
</style>

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
                        @foreach($inscription->notes as $note)
                        <tr class="tr" data-trimestre_id={{ $note->trimestre_id }} data-ligne_ecole_programme_id={{ $note->ligne_ecole_programme_id }} data-note_id={{ $note->id }} data-note={{ $note->valeur }}>
                            <td> {{$note->pel->matiere->name}} </td>
                            @if ($note->valeur >= 10)
                                <td style="color: green"> {{ $note->valeur }} </td>
                            @else
                                <td style="color: red"> {{ $note->valeur }} </td>
                            @endif
                            <td> {{$note->pel->coefficient }} </td>
                            <td> {{$note->totalmatiere }} </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Total (Pts)</td>
                            <td></td>
                            <td>{{ $inscription->totalcoefficient }}</td>
                            <td>{{ $inscription->totaux }}</td>
                        </tr>
                        <tr>
                            <td style="font-size: larger;">Moyenne Génerale :</td>
                            <td> </td>
                            <td> </td>
                            <td style="font-size: larger;" class="moyenne"> {{ $inscription->moyenne }} </td>
                        </tr>
                    </tbody>
                </table>

                <button style="background-color: darkblue; color:white"  class="btn btn-default float-right btn-save"> GENERATION DU RELEVE <i class="fa fa-print"></i> </a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/releve.js') }}"></script>
@endsection
