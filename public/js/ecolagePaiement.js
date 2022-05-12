
$('#etape1').hide();
// Selection de la salle de classe
$("#rechercher").click(function (e) {
    e.preventDefault();
    var selectSalle = $("#selectSalle").val();
    $.ajax({
        type: "get",
        url: "/adminecole/ecolages-salle-select",
        data: {
            selectSalle:selectSalle
        },
        dataType: "json",
        success: function (data) {
            var inscrit_id = data.id;
            $('#etape1').show(400);
            $('#resultats').html("");
            for (let index = 0; index < data.length; index++) {
                $('#resultats').append(' <tr><td>'+data[index].eleve_id+'</td></tr> ');
            }
        }
    });
});
