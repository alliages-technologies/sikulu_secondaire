@extends('layouts.prof')


@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>GESTION DES NOTES</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm mt-4  ">
                <thead>
                    <tr>
                        <th>SALLE</th>
                        <th>CLASSE</th>
                        <th>MATIERE</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pes as $pe)
                    @foreach ($pe->lpes->where('enseignant_id',$prof->id) as $ligne_programme_ecole)
                    <tr>
                        <td>{{ $ligne_programme_ecole->programmeecole->salle->name }}</td>
                        <td> {{ $ligne_programme_ecole->programmeecole->salle->classe->name }}</td>
                        <td>{{ $ligne_programme_ecole->matiere->name }}</td>
                        <td><a href="/profs/notes-by-inscription/{{ $ligne_programme_ecole->programmeecole->salle->token }}/{{ $ligne_programme_ecole->id }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>
    $(".btn-save").hide();
$(".trimestre_id").change(function (e) {
    e.preventDefault();
    var trimestre_id = $(this).val();
    //alert(trimestre_id);
    if (trimestre_id) {
        $(".btn-save").show(400);

        $(".btn-save").click(function (e) {
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
