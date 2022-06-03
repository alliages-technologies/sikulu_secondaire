

$(".btn-save").click(function (e) {
    e.preventDefault();
    var lignes = [];
    $inscription_id = $(".inscription_id").val();
    $(".table-releve").find("tbody .tr").each(function (index, element) {
        $trimestre_id = $(this).data("trimestre_id");
        var elt = {
            ligne_ecole_programme_id: $(this).data("ligne_ecole_programme_id"),
            note_id: $(this).data("note_id"),
            note: $(this).data("note")
        }
        lignes.push(elt);
    });

    $.ajax({
        type: "post",
        url: "/adminecole/scolarite/releve-save",
        data: {
            lignes: lignes,
            trimestre_id: $trimestre_id,
            inscription_id: $inscription_id,
            '_token': $('input[name="_token"]').val()
        },
        dataType: "json",
        success: function (response) {
            alert("Succès...!!!");
            window.location.reload();
        },
        error: function (){
            alert("Déjà été generé !!!");
        }
    });
});
