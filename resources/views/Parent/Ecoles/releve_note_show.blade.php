@extends('layouts.parent')
@section('content')

<style>
    .table-bordered td, .table-bordered th {
    border: 1px solid #ffffff;
    font-size: 15px;
}
tr{
    font-size: 15px;
}
</style>
<div class="container">
    <div class="card mt-5">
        <div class="card-header" style="background-color: white; color:rgb(0, 0, 0)">
            <div class="">
                <div class="float-right">
                @if ($releve_note)
                    @if ($rang == 1)
                        {{ QrCode::size(100)->generate($inscription->eleve->name.' est '.$releve_note->appreciation. ' avec '.$releve_note->moyenne.' de moyenne'. ' et occupe le rang de '.$rang.'er(e)') }}
                    @else
                        {{ QrCode::size(100)->generate($inscription->eleve->name.' est '.$releve_note->appreciation. ' avec '.$releve_note->moyenne.' de moyenne'. ' et occupe le rang de '.$rang.'ème') }}
                    @endif
                @endif
                </div>

                <div class="container">
                    <div class="float-right" style="font-size: 17px; margin-top: 110px">
                        <span>A : Pointe-Noire</span><br>
                        <span>Classe : </span> <span> {{$inscription->salle->classe->name}} ({{$inscription->salle->classe->abb}}) </span><br>
                        <span>Salle : </span> <span> {{$inscription->salle->abb}} </span><br>
                    </div>

                    <div class="float-left" style="font-size: 18px">
                        <span>MEPSA</span><br>
                        <span>DDEPSA-PN</span><br>
                        <span>IEP de Mvou-Mvou</span><br>
                    </div>
                    <div class="row float-left">
                        <div class="col-md-12 text-center" style="font-size: 17px;margin-top: 110px;margin-left: 20px;">
                            <span class="float-right"> {{$annee_acad->annee1}}-{{$annee_acad->annee2 }} </span> <span class="float-right"> Année scolaire :.. </span>
                            <span> Nom de l'élêve : </span> <span> {{$inscription->eleve->nom}} </span> <br>
                            <span > Prénom(s) : </span> <span> {{$inscription->eleve->prenom}} </span> <br>
                            <span > Né le : </span> <span> {{$inscription->eleve->date_naiss}} </span> <br>
                            <span > Matricule : </span> MATRICULE <span> {{$inscription->id}} </span> <br>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{ $inscription->id}}" class="inscription_id">
            </div>
        </div>
        <img class="mx-auto d-block" src="{{asset($inscription->ecole->image_uri)}}" alt="" srcset="" style="width: 30%; height: 200px; border-radius: 2pc;">

        @csrf
        <div class="card-body">
            @if ($releve_note)
            <h3 class="text-center text-uppercase mt-1 mb-2" style="letter-spacing: 0px;font-weight: bold;">BULETIN DE NOTE DU {{$releve_note->trimestre->name}} </h3>
                <div class="container">
                    <table class="table table-bordered table-striped table- table-releve">
                        <thead class="">

                            <tr>
                                <th> Matières </th>
                                <th> Note </th>
                                <th> Coef </th>
                                <th> Rg </th>
                                <th> Max </th>
                                <th> Min </th>
                                <th> Class </th>
                                <th> Appréciations </th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($releve_note->ligne_releves as $ligne)
                                <input type="hidden" value="{{ $ligne->composition_id}}" name="composition_id">
                                <tr class="tr" data-composition_id={{ $ligne->composition_id }} data-ligne_ecole_programme_id={{ $ligne->ligne_ecole_programme_id }} data-note_id={{ $ligne->id }} data-note={{ $ligne->valeur }}>
                                    <td> {{ $ligne->pel->matiere->name }} </td>
                                    @if ($ligne->valeur >= 10)
                                    <td style="color: green"> {{ $ligne->valeur }} </td>
                                    @else
                                    <td style="color: red"> {{ $ligne->valeur }} </td>
                                    @endif
                                    <td> {{ $ligne->coefficient }} </td>
                                    <td> {{$ligne->rangbymoyenne}} </td>
                                    <td> {{ $ligne->maxi }} </td>
                                    <td> {{ $ligne->mini }} </td>
                                    <td> {{ $ligne->class }} </td>
                                    <td> {{ $ligne->appreciation }} </td>
                                </tr>
                            @endforeach


                            <tr>
                                <td style="font-size: larger;">Rang :</td>
                                @if ($rang == 1)
                                    <td> {{ $rang }} er(e) Sur {{ $inscriptions->count() }} </td>
                                @else
                                    <td> {{ $rang }} ème Sur {{ $inscriptions->count() }} </td>
                                @endif
                                <td> </td>
                                @if ($releve_note)
                                    <td style="font-size: ;"> {{$releve_note->appreciation}} </td>
                                @else
                                    <td style="font-size: ;"> Aucune </td>
                                @endif
                            </tr>
                            @if ($releve_note->trimestre_id < 3)
                            <tr>
                                <td style="font-size: larger;">Moyenne Genérale :</td>
                                <td style="font-size: larger;"> {{number_format($releve_note->moyenne,2,'.','')}} </td>
                            </tr>
                            @endif

                            @if ($releve_note->trimestre_id == 3)
                            <tr class="">
                                <td style="font-size: larger;">Moyenne Premier Trimestre :</td>
                                <td style="font-size: larger;"> {{$premier_trimestre->moyenne}}</td>
                                <td style="font-size: larger;"> {{$premier_trimestre->appreciation}}</td>
                            </tr>
                            <tr class="">
                                <td style="font-size: larger;">Moyenne Deuxième Trimestre :</td>
                                <td style="font-size: larger;"> {{$deuxieme_trimestre->moyenne}}</td>
                                <td style="font-size: larger;"> {{$deuxieme_trimestre->appreciation}}</td>
                            </tr>
                            <tr class="">
                                <td style="font-size: larger;">Moyenne Troisième Trimestre :</td>
                                <td style="font-size: larger;"> {{$troisieme_trimestre->moyenne}}</td>
                                <td style="font-size: larger;"> {{$troisieme_trimestre->appreciation}}</td>
                            </tr>
                            <tr class="">
                                <td style="font-weight: bold;font-size: 25px;text-transform: uppercase;">Moyenne Annuelle :</td>
                                <td style="font-weight: bold;font-size: 25px;text-transform: uppercase;"> {{number_format($moyenne_annuelle,2,'.','')}}</td>
                                <td style="font-weight: bold;font-size: 25px;text-transform: uppercase;"> Rang :</td>
                                @if ($rang == 1)
                                    <td style="font-weight: bold;font-size: 25px;text-transform: uppercase;"> {{ $rang_a }} er(e) Sur {{ $inscriptions->count() }} </td>
                                @else
                                    <td style="font-weight: bold;font-size: 25px;text-transform: uppercase;"> {{ $rang_a }} ème Sur {{ $inscriptions->count() }} </td>
                                @endif
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    @if ($releve_note->trimestre_id == 3 and $moyenne_annuelle >=10)
                        <strong class="float-right" style="color: green;font-size: 30px;text-transform: uppercase;letter-spacing: 0px;font-weight: normal;"> Passe en classe supérieur <i class="fa fa-smile"></i> </strong>
                    @elseif ($releve_note->trimestre_id == 3 and $moyenne_annuelle < 10)
                    <strong class="float-right" style="color: rgb(212, 43, 43);font-size: 30px;text-transform: uppercase;letter-spacing: 0px;font-weight: normal;"> Ajourné(e) <i class="fa fa-frown-o"></i> </strong>
                    @endif
                @else
            <h1 class="text-center" style="color: rgb(247, 63, 63);letter-spacing:1px">Auncun relevé de note <i class="fa fa-file" style="color: rgb(125, 120, 148)"></i></h1>
            @endif
        </div>
    </div>
</div>
<script src="{{ asset('js/releve.js') }}"></script>
@endsection
