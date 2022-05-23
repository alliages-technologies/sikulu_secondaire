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
                    '_token': $('input[name="_token"]').val()
                },
                dataType: "json",
                success: function (response) {
                    alert('Notation éffectuée avec succès !!!');
                    window.location.replace("/profs/notes");
                },
                error: function () {
                    alert('Erreur au niveau du serveur !!!');
                }
            });
        });
    }
});

