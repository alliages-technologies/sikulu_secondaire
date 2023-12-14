@extends('layouts.adminecole')


@section('title')
Admin Ecole | Programme
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>PROGRAMME {{ $salle->classe->name }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th> MATIERE </th>
                        <th> COEFFICIENT </th>
                        <th> ENSEIGNANT </th>
                        <th> <i class="fa fa-cog"></i> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programme_ecole->lpes as $lpe)
                    <tr>
                        <td> {{ $lpe->matiere->name }} </td>
                        <td> {{ $lpe->coefficient }} </td>
                        <td> {{ $lpe->enseignant_id?$lpe->enseignant->name:"Aucun" }} </td>
                        <td> <button data-lpe="{{ $lpe->id }}" data-toggle="modal" data-target="#panier" class="btn btn-default btn-xs btn-edit"><i class="fa fa-edit"></i></button> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">MODIFICATION PROF</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('superadmin.programmes-national.store')}}" method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <input type="hidden" name="" data-salle_id="{{ $salle->id }}" value="{{ $salle->id }}" class="salle">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped table-sm table-programme">
                            <thead>
                                <tr>
                                    <th>MATIERE</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <label classe="mt-1" for="" name="prof_id">CHOIX DU PROF</label>
                        <select class="form-control profs">
                             <option>SELECTIONNEZ LE PROF</option>
                             @foreach ($pes as $pe )
                             <option value="{{ $pe->prof_id }}"> {{ $pe->prof->name }} </option>
                             @endforeach
                         </select>
                    </div>
                </div>
                <button class="btn btn-success mt-2 btn-savep" id="btn-savep"> <i class="fa fa-save"></i> </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

<script>


$(".btn-edit").click(function (e) {
    e.preventDefault();
    var lpe = $(this).data("lpe");
    //console.log(lpe);

    $.ajax({
        type: "get",
        url: "/adminecole/get-lignes-programme-national-by-id/"+lpe,
        data: {
            lpe: lpe
        },
        dataType: "json",
        success: function (response) {
            //console.log(response);
            $('.table-programme').find('tbody .add-tr').html("");
            var tr = '<tr class="add-tr"> <td>' +response.matieren + '</td></tr>';
            $('.table-programme').find('tbody').append(tr);

                $(".profs").change(function (e) {
                    e.preventDefault();
                    var prof_id = $(this).val();
                    $(".btn-savep").click(function (e) {
                        e.preventDefault();
                        console.log(prof_id);
                        $.ajax({
                            type: "get",
                            url: "/adminecole/save-prof",
                            data: {
                                lpe: lpe,
                                prof_id: prof_id
                            },
                            dataType: "json",
                            success: function (response) {
                            window.location.reload();

                            }
                        });
                    });
                });
        }
    });
});

</script>
@endsection
