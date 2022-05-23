/*
$('#tableau').hide();
$('#afficher').click(function (e) {
    e.preventDefault();
    var salle = $('#salle').val();
    $.ajax({
        type: "get",
        url: "/adminecole/ecolages-historique-salle",
        data: {
            salle:salle
        },
        dataType: "json",
        success: function (requeteInscription) {
            var listeInscriptions = requeteInscription;
            console.log(listeInscriptions);
        }
    });
});
*/
