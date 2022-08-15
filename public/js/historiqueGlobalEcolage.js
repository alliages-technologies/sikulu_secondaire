
$("#selectionEleve").hide();
$("#resultats").hide();
$("#eleveSelected").hide();
$("#salle_id").change(function (e) {
    e.preventDefault();
    var salleId = $(this).val();
    $.ajax({
        type: "get",
        url:' /responsablefinances/ecolages-historique-find-salle/'+salleId+' ',
        data: { salleId:salleId },
        dataType: "json",
        success: function (inscriptions) {
            var inscriptionsSalle = Object.entries(inscriptions);
            $('#selectionEleve').show();
            $("#eleveSelected").hide();
            $("#resultats").hide();
            $('#inscriptions').html("");
            $('#inscriptions').prepend("<option>SELECTONNEZ L'ELEVE CONCERNE</option>");
            inscriptionsSalle.forEach(function([$key ,$value]){
                var option = '<option value='+$value["id"]+'> '+$value["name"]+' </option>';
                $('#inscriptions').append(option);
                $("#inscriptions").change(function (e) {
                    e.preventDefault();
                    var inscriptionId = $(this).val();
                    $.ajax({
                        type: "get",
                        url: ' /responsablefinances/ecolages-historique-eleve/'+inscriptionId+' ',
                        data: { inscriptionId },
                        dataType: "json",
                        success: function (ecolages) {
                            var ecolagesHistorique = Object.entries(ecolages);
                            $("#resultats").show();
                            $("#eleveSelected").hide();
                            $("#historiquePaiements").html("");
                            ecolagesHistorique.forEach(function ([$key, $value]){
                                var tr = '<tr> <td>'+$value["jour"]+'</td> <td>'+$value["montant"]+' XAF</td> <td>'+$value["month"]+'</td> </tr>';
                                $('#historiquePaiements').append(tr);
                            });
                        }
                    });
                });
            });
        }
    });
});

//note: récupérer les inscriptions d'une ecole en particulier
$('#month').change(function (e) {
    e.preventDefault();
    var monthId = $(this).val();
    $.ajax({
        type: "get",
        url: ' /responsablefinances/ecolages-historique-find-month/'+monthId+' ',
        data: { monthId },
        dataType: "json",
        success: function (ecolages) {
            var ecolagesData = Object.entries(ecolages);
            $("#resultats").show();
            $('#selectionEleve').hide();
            $("#eleveSelected").show();
            $("#historiquePaiements").html("");
            ecolagesData.forEach(function ([$key, $value]){
                var tr = '<tr> <td>'+$value["jour"]+'</td> <td>'+$value["montant"]+' XAF</td> <td>'+$value["month"]+'</td> <td>'+$value["eleve"]+'</td> </tr>';
                $('#historiquePaiements').append(tr);
            });
        }
    });
});

