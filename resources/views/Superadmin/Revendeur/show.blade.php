@extends('layouts.superadmin')

@section('content')
<div class="row">

    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 style="color: #ffffff;">
                    Info sur l'événement <i class="bi bi-info-circle"></i>
                </h5>
            </div>
            <div class="card-body  mt-1">
                 <h5>Nom et Prénom(s) : <strong> {{$revendeur->name}} </strong> </h5>
                 <h5> Adresse : <strong> {{$revendeur->adresse}} </strong> </h5>
                 <h6> E-Mail : <strong> {{$revendeur->email}} </strong> </h6>
                 <h6> Téléphone : <strong> {{$revendeur->phone}} </strong> </h6>
                 <h6>Statut :
                    <strong style="float-right">
                        @if ($revendeur->actif == 0)
                            <td> <span class="badge bg-danger"> <i class="bi bi-exclamation-octagon me-1"></i> inactif</span> </td>
                            @else
                            <td> <span class="badge bg-success"> <i class="bi bi-check-circle me-1"></i> actif</span> </td>
                            @endif
                    </strong>
                 </h6>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h5 style="color: #fffff;">
                    Liste des Ecoles du revendeur <i class="ri-government-line"></i>
                </h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>E-mail</th>
                            <th>Statut</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revendeur->ecoles as $ecole)
                        <tr>
                            <td> {{$ecole->name}} </td>
                            <td> {{$ecole->email}} </td>
                            @if ($ecole->active == 0)
                            <td> <span class="badge bg-danger"> <i class="bi bi-exclamation-octagon me-1"></i> inactif</span> </td>
                            @else
                            <td> <span class="badge bg-success"> <i class="bi bi-check-circle me-1"></i> actif</span> </td>
                            @endif
                            <td> <a href="" class="btn btn-info btn-sm"> <i class="bi bi-info-circle"></i> </a> </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
