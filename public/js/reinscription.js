

$(".salle_id").change(function (e) {
    e.preventDefault();
    var salle_id = $(".salle_id").val();
    //console.log(salle_id);
    $.ajax({
        type: "get",
        url: "/adminecole/get-inscription-by-id/"+salle_id,
        data: "data",
        dataType: "json",
        success: function (data) {
        //console.log(Object.entries(data));
            var donnees = Object.entries(data);
            $('.inscription_id').html('');
            $('.inscription_id').prepend('<option>Selectionner un élève</option>');
            donnees.forEach(function([$k, $v]) {
                var option = '<option value ='+$v["id"] +'>' +$v["name"]+ '</option>'
                $('.inscription_id').append(option);
            });

        }
    });
});

$(".btn-save").click(function (e) {
    e.preventDefault();
    var salle_id = $(".nsalle_id").val();
    var montant_inscri = $(".montant_inscri").val();
    var inscription_id = $(".inscription_id").val();
    var annee_id = $(".annee_id").val();
    //console.log(inscription_id);
    $.ajax({
        type: "post",
        url: "/adminecole/reinscriptions-save",
        data: {
            inscription_id: inscription_id,
            salle_id: salle_id,
            montant_inscri: montant_inscri,
            annee_id: annee_id,
            '_token': $('input[name="_token"]').val()
        },
        dataType: "json",
        success: function (response) {
            alert("Réinscription effectuée avec succès !!!")
            window.location.replace("/adminecole/inscriptions");
        },
        error: function(){
            alert("Oups !!!! veuillez renseigner toutes les informations");
        }
    });
});

