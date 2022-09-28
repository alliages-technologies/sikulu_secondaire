@extends('layouts.adminecole')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-door-open"></i> | GESTION DES POINTAGES
                <a href="" data-toggle="modal" data-target="#consulter" class="btn btn-sm btn-default float-right ml-2"> <i class="fa fa-search"></i> </a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th>PROF</th>
                    <th>CLASSE</th>
                    <th>MATIERE</th>
                    <th>NBR_HEURE</th>
                    <th>JOURS</th>
                </thead>
                <tbody>
                    @foreach ($pointages as $pointage)
                    <tr>
                        <td> <a href="{{route('adminecole.pointage.show',$pointage->prof->id)}}"> {{ $pointage->prof->name }} </a></td>
                        <td>{{ $pointage->pel->programmeecole->salle->classe->name}} ({{ $pointage->pel->programmeecole->salle->abb}}) </td>
                        <td>{{ $pointage->pel->matiere->name }}</td>
                        <td>{{ $pointage->nbr_heure }} H</td>
                        <td>{{ $pointage->jour }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $pointages->links() }}
</div>

<!-- pointages recherche -->
<div class="modal fade" id="consulter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">Consultation des pointages <i class="fa fa-search"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <select name="classe" id="" class="form-control classe">
                                        <option value="">Choix du prof</option>
                                        @foreach ($prof_ecoles as $prof_ecole)
                                        <option value="{{$prof_ecole->prof->id}}">{{$prof_ecole->prof->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default mt-3 btn-search"> <i class="fa fa-search"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
