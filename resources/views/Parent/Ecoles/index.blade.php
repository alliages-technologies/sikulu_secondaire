@extends('layouts.parent')
@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-left mb-1"> LISTE DE MES ENFANTS <i class="fa fa-users"></i> </h4>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead class="">
                        <th> <i class="fa fa-image"></i> </th>
                        <th> Nom(s) & Prénom(s) </th>
                        <th> Classe </th>
                        <th> Action (s) </th>
                    </thead>
                    <tbody>
                    @foreach($eleves as $eleve)
                        @foreach ($eleve->inscriptions->where('annee_id',$annee->id) as $inscription)
                        <tr>
                            <td> <img style="width: 30%;height: 40px;float: left;border-radius: 2pc;" src="{{asset($inscription->eleve->image_uri)}}" alt="" srcset=""> </td>
                            <td> {{$inscription->name}} </td>
                            <td> {{$inscription->salle->classe->name}} </td>
                            <td> <a href="{{route('parents.inscription.show',$inscription->token)}}" class="btn btn-default btn-sm"> <i class="fa fa-eye"></i> </a> </td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
