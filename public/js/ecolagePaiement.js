
$("#valider").click(function (e) {
    e.preventDefault();
    var selectSalle = $("#selectSalle").val();
    $.ajax({
        type: "GET",
        url: "/adminecole/ecolages/salle-select",
        data: {
            selectSalle:selectSalle
        },
        dataType: "json",
        success: function (response) {
            var salle_id = response.id;
            if(salle_id == selectSalle){
                $("#resultat").apend('<p> </p>');

            }
        }
    });
});
