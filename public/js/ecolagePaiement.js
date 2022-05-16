
/*
for (let index = 0; index < inscriptions.length; index++) {
    $('#resultats').append(' <tr><td>'+inscriptions[index].eleve_id+'</td></tr> ');
}
*/

$('#etape2').hide();
$('#etape3').hide();
$('#historique').hide();
$('#btn-payer').hide();
// Selection de la salle de classe
$("#selectSalle").change(function (e) {
    e.preventDefault();
    var selectSalle = $(this).val();
    $.ajax({
        type: "get",
        url: "/adminecole/ecolages-salle-select",
        data: {
            selectSalle:selectSalle
        },
        dataType: "json",
        success: function (inscriptions) {
            var inscriptionsData = Object.entries(inscriptions);
            $('#etape2').show(400);
            $('#resultats').html("");
            $('#resultats').prepend('<option>SELECTONNEZ L\'ELEVE CONCERNE</option>');
            inscriptionsData.forEach(function([$key ,$value]){
                var option = '<option value= '+$value["id"]+'>' +$value["name"]+ '</option>';
                $('#resultats').append(option);
            });
            // Sélection de l'élève
            $('#resultats').change(function (e) {
                e.preventDefault();
                var inscription_id = $(this).val();
                $.ajax({
                    type: "get",
                    url: "/adminecole/ecolages-eleve-infos-show/"+inscription_id,
                    data: {
                        inscription_id:inscription_id
                    },
                    dataType: "json",
                    success: function (ecolages) {
                        var ecolagesData = Object.entries(ecolages);
                        $('#paiements').html("");
                        $('#historique').show(400);
                        ecolagesData.forEach(function([$key, $value]){
                            var tr = '<tr> <td>'+$value["montant"]+' XAF</td> <td>'+$value["month"]+'</td> <td>'+$value["created_at"]+'</td> </tr>';
                            $('#paiements').append(tr);
                        });
                        // Passer au paiement
                        $('#btn-payer').show(400);
                        $('#etape1').hide(400);
                        $('#btn-payer').click(function (e) {
                            e.preventDefault();
                            $('#etape3').show(400);
                            $('#etape1').hide(400);
                            $('#etape2').hide(400);
                        });
                    }
                });
                // Confirmermation du paiement
                $("#confirmer").click(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: "/adminecole/ecolages-eleve-paiement-store",
                        data: {
                            inscription_id:inscription_id,
                            montant: $('#montant').val(),
                            mois: $('#mois').val(),
                            "_token": $('input[name="_token"]').val()
                        },
                        dataType: "json",
                        success: function (response) {
                            alert("PAIEMENT REUSSI AVEC SUCCES");
                            window.location.replace("/adminecole/ecolages");
                        }
                    });
                });
            });
        }
    });
});



