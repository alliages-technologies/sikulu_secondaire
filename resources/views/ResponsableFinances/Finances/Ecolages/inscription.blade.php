@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Paiement Ecolage
@endsection

@section('content')

<style>
    tr{
        font-size: 25px;
    }
</style>

<div class="container mt-4">
    <div class="card">
        <h1 class="card-header text-center" style="text-transform: uppercase">PAIEMENT DES FRAIS D'ECOLAGE | {{$salle->name}} ({{ $salle->classe->abb }}) <h1>
            <div class="card-body">
                <div class=" text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('responsablefinances.ecolages.inscription.search')}}" method="get" class="d-flex">
                                <label for="" style="font-size: 15px">Faire une recherche</label>
                                <select name="token" id="" class="form-control mb-2 inscription" required>
                                    <option value=""></option>
                                    @foreach ($inscriptions as $inscription)
                                        <option value="{{$inscription->token}}"> {{$inscription->name}} </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary ml-2 mb-2 btn-sm"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-sm table-paiement">
                        <thead>
                            <tr>
                                <th></th>
                                <th>NOM(S) ET PRENOM(S)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inscriptions as $inscription)
                            <tr>
                                <td> <img style="width: 20%;height: 40px;float: left;border-radius: 2pc;" src="{{asset($inscription->eleve->image_uri)}}" alt="" srcset=""> </td>
                                <td> {{$inscription->name}} </td>
                                <td> <a href="{{route('responsablefinances.ecolages.inscription',$inscription->token)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
    </div>
</div>

<script>


</script>

@endsection
