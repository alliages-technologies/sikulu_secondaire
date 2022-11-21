@extends('layouts.prof')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>RAPPORT JOURNALIER <i class="fa fa-edit"></i></h2>
            <a href="" data-toggle="modal" data-target="#consulter" class="btn btn-sm btn-default float-right ml-2"> <i class="fa fa-edit"></i> </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm mt-4  ">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>OBJET</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rapport_jours as $rapport_jour)
                    <tr>
                        <td> {{$rapport_jour->created_at}} </td>
                        <td> {{$rapport_jour->name}} </td>
                        <td> <a href="/surveillant/rapport-jours/{{Auth::user()->ecole->token}}/{{$rapport_jour->id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="consulter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">Rapport de journalier <i class="fa fa-edit"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('surveillants.rapports.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-2">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" placeholder="Titre" required>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="detail" id="" cols="30" rows="10" placeholder="Détail sur le rapport"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default mt-3 btn-search"> <i class="fa fa-save"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
