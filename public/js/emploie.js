
$(".btn-add").click(function (e) {
    e.preventDefault();
    $(".tranche_id :selected").each(function (){
        $tranche = $(this).data('tranche');
        $tranche_id = $(this).val();
    });

    $(".programme_ecole_ligne_id :selected").each(function (){
        $matiere = $(this).data('matiere');
        $prof = $(this).data('prof');
        $programme_ecole_ligne_id = $(this).val();
        //console.log($matiere)
    });

    if ($tranche_id > 0 && $programme_ecole_ligne_id) {
        var tr = '<tr data-tranche_id="' + $tranche_id + ' "data-programme_ecole_ligne_id='+$programme_ecole_ligne_id+'><td>'+$tranche+'</td><td>'+$matiere+'</td></td><td>'+$prof+'</td><td><i style="color:#a10101" class="fa fa-trash btn-trash"></i></td></tr>';
        $('.table-emploi-temp').find('tbody').append(tr);
        $(".btn-trash").click(function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
}

else{
    alert("Attention vous avez oubliez de selectionner une information !!!");
}

});


$("#btn-save").click(function (e) {
    e.preventDefault();
    var lignes = [];
    $('.table-emploi-temp').find('tbody tr').each(function() {
        var elt = {
            tranche_id: $(this).data('tranche_id'),
            programme_ecole_ligne_id: $(this).data('programme_ecole_ligne_id')
        }
        lignes.push(elt);
    });
    $.ajax({
        type: "post",
        url: "/adminecole/emploies",
        data: {
            'lignes': lignes,
            'salle_id': $(".salle_id").val(),
            '_token': $('input[name="_token"]').val()
        },
        dataType: "json",
        success: function (response) {
            alert("Ajout de l'emploi du temps avec success !!!");
            window.location.reload();
        },
        error: function() {
            alert('Une erreur est survenue sur le serveur !!!!')
            //window.location.reload();
        }
    });
});

