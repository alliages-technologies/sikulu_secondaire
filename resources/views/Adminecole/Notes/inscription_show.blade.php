@extends('layouts.adminecole')


@section('content')
@csrf

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h4> <strong> MODIFICATION </strong> DES NOTES DE <strong> {{ $inscription->name }} </strong> </h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm  table-notes">
                <thead>
                    <tr>
                        <th>MATIERES</th>
                        <th>NOTES</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->pel->matiere->name }}</td>
                        <td>{{ $note->valeur}}</td>
                        <td> <button data-note_id="{{ $note->id }}" data-note="{{ $note->id }}" data-toggle="modal" data-target="#panier" class="btn btn-primary btn-edit"><i class="fa fa-edit"></i></button> </td>
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
                <h3 class="modal-title" id="exampleModalLabel">MODIFICATION DE LA NOTE</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="/adminecole/notes/save" method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
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
                        <input type="number" name="valeur" class="form-control valeur" placeholder="note...">
                        <input type="hidden" name="note_id" class="form-control note_id" placeholder="note...">
                    </div>
                </div>
                <button class="btn btn-success mt-2 btn-save_admin" id="btn-save_admin"> <i class="fa fa-save"></i> </button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

<script>
$(".btn-edit").click(function (e) {
    var note_id = $(this).data('note_id');
    //console.log(note_id);
    $.ajax({
        type: "get",
        url: "/adminecole/notes/note-by-id/"+note_id,
        data: "",
        dataType: "json",
        success: function (response) {
            //console.log(response);
            $('.table-programme').find('tbody .add-tr').html("");
            var tr = '<tr class="add-tr note" data-note_id='+response.id+'> <td>' +response.matier + '</td></tr>';
            $('.table-programme').find('tbody').append(tr);
            //console.log(response.valeur);
            var valeur = $('.valeur').val(response.valeur);
            var valeur = $('.note_id').val(response.id);
            $(".btn-save_admin").click(function (e) {
                var note_id = $('.note').data('note_id');
                //e.preventDefault();

                //alert(note_id);
                $.ajax({
                    type: "post",
                    url: "",
                    data: {
                        valeur: valeur,
                        note_id: note_id,
                        '_token': $('input[name="_token"]').val()
                    },
                    dataType: "json",
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });
        }
    });

});

</script>
@endsection
