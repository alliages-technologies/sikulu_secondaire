$("#confirmer").click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "/responsablefinances/ecolages-eleve-paiement-store",
        data: {
            inscription_id:inscription_id,
            montant: $('#montant').val(),
            mois: $('#mois').val(),
            "_token": $('input[name="_token"]').val()
        },
        dataType: "json",
        success: function (response) {
            alert("PAIEMENT EFFECTUE AVEC SUCCES");
            window.location.replace("/responsablefinances/ecolages/facture/paiement");
        }
    });
});
