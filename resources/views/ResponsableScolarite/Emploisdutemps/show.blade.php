@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Emploi du temps
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>EMPLOI DU TEMPS</h2>
            <button data-toggle="modal" data-target="#nouveauProgr" class="btn btn-sm btn-default float-right"> <i class="fa fa-plus-circle"></i> </button>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-hover">
                <thead class="">
                    <tr>
                        <th> JOUR </th>
                        <th> TRANCHE HORAIRE</th>
                        <th> MATIERE </th>
                        <th> ENSEIGNANT </th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emploi_temp->lets as $let)
                    <tr>
                        <td> {{ $let->day->name }} </td>
                        <td> {{ $let->tranche->name }} </td>
                        <td> {{ $let->ligneprogrammeecole->matiere->name }} </td>
                        <td> {{ $let->ligneprogrammeecole->prof}} </td>
                        <td> <a href="/responsablescolarite/emplois-du-temps-edit/{{Auth::user()->ecole->token}}/{{$let->id}}" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i> </a> <a href="{{ route('responsablescolarite.del',$let->id) }}" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nouveauProgr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">NOUVEL EMPLOI DU TEMPS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('responsablescolarite.emploi.add')}}" method="post" class="mb-4">
                    @csrf
                    <input type="hidden" name="id" value={{ $emploi_temp->id }}>
                    <div class="form-row mt-2">
                        <div class="col">
                            <label for="">Jour</label>
                            <select name="day_id" id="" class="form-control day_id" required>
                                <option value=""> CHOIX </option>
                                @foreach ($days as $day)
                                <option data-day="{{ $day->name }}" value="{{ $day->id }}">{{ $day->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Horaire</label>
                            <select name="tranche_id" id="" class="form-control tranche_id" required>
                                <option value=""> CHOIX </option>
                                @foreach ($tranches as $tranche)
                                <option data-tranche="{{ $tranche->name }}" value="{{ $tranche->id }}">{{ $tranche->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Matière</label>
                            <select name="programme_ecole_ligne_id" id="" class="form-control programme_ecole_ligne_id" required>
                                <option value=""> CHOIX </option>
                                @foreach ($programme_ligne_ecoles as $lpe)
                                <option data-matiere="{{ $lpe->matieren }}" data-prof="{{ $lpe->prof }}" value="{{ $lpe->id }}">{{ $lpe->matiere->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success mt-2 btn-save" id="btn-save">ENREGISTRER</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
