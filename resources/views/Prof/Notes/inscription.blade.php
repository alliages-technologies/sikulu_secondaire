@extends('layouts.prof')


@section('content')
@csrf
<input type="hidden" class="ligne_ecole_programme_id" value="{{ $ligne_programme_ecole }}" name="ligne_ecole_programme_id">

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h2>SAISIE DES NOTES DE LA <strong>{{$salle->classe->name}}</strong> </h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm  table-notes">
                <thead>
                    <tr>
                        <th>DATE DE NAISSANCE</th>
                        <th>ELEVES</th>
                        <th>NOTES /20</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscriptions as $inscription)
                    <tr data-ligne_inscription="{{ $inscription->id }}">
                        <td>{{ $inscription->eleve->date_naiss }}</td>
                        <td>{{ $inscription->eleve->name }}</td>
                        <td contenteditable="true"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <select name="" id="" class="form-control trimestre_id">
                <option value="">Sélectionner le trimestre pour enregistrer les notes saisies</option>
                @foreach ($trimestre_ecoles as $trimestre_ecole)
                <option value="{{ $trimestre_ecole->trimestre->id }}">{{ $trimestre_ecole->trimestre->name }} ({{ $trimestre_ecole->trimestre->abb }})</option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-default btn-saven float-right mt-2"><i class="fa fa-save"></i> ENREGISTRER</button>
</div>
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>

    $(".btn-saven").hide();
    $(".trimestre_id").change(function (e) {
        e.preventDefault();
        var trimestre_id = $(this).val();
        //alert(trimestre_id);
        if (trimestre_id) {
            $(".btn-saven").show(400);

            $(".btn-saven").click(function (e) {
                e.preventDefault();
                var data = $('.table-notes tbody tr').map(function () {
                    return [$(this).children().map(function(){
                        return $(this).text().trim()
                    }).get()];
                }).get();
                var lignes = [];

                for (let i = 0; i < data.length; i++) {
                    var notes = data[i][2];
                    //console.log(notes); //JSON.stringify(data)
                }

                $('.table-notes tbody tr').each(function (index, element) {
                    var ligne_inscription = $(this).data('ligne_inscription');
                    var note = data[index][2];
                    //console.log(ligne_inscription);
                    //console.log(notes);
                    var elt = {
                        inscription_id: ligne_inscription,
                        note: note
                    }
                    lignes.push(elt);
                });

                $.ajax({
                    type: "post",
                    url: "/profs/notes",
                    data: {
                        lignes: lignes,
                        ligne_ecole_programme_id: $(".ligne_ecole_programme_id").val(),
                        trimestre_id: $('.trimestre_id').val(),
                        '_token': $('input[name="_token"]').val()
                    },
                    dataType: "json",
                    success: function (response) {
                        alert('Notation éffectuée avec succès !!!');
                        window.location.replace("/home");
                    },
                    error: function () {
                        alert('Désolé, vous ne pouvez plus noter cet élêve car il (elle) a déjà été noté pour cette composition !!!');
                    }
                });
            });
        }
    });

</script>
@endsection
