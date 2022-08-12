
//$("#resultats").hide();
$("#selectionEleve").hide();
$("#salle").change(function (e) {
    e.preventDefault();
    var salleId = $(this).val();
    $.ajax({
        type: "get",
        url: "/responsablefinances/ecolages-historique-find-salle",
        data: { salleId:salleId },
        dataType: "json",
        success: function (inscriptions) {
            var salleInscriptions = Object.entries(inscriptions);
            $("#selectionEleve").show();
            $('#inscriptions').html("");
            $('#inscriptions').prepend("<option>SELECTONNEZ L'ELEVE CONCERNE</option>");
            salleInscriptions.forEach(function([$key ,$value]){
                var option = '<option value='+$value["id"]+'> '+$value["name"]+' </option>';
                $('#inscriptions').append(option);
            });
        }
    });
});
