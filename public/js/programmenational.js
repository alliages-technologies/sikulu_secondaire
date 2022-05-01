

$('.btn-add').click(function (e) {
    e.preventDefault();
    $(".classe_id :selected").each(function (){
        $classe = $(this).data('classe');
        $classe_id = $(this).data('classe_id');
    });
    $(".enseignement_id :selected").each(function (){
        $enseignement = $(this).data('enseignement');
        $enseignement_id = $(this).data('enseignement_id');
    });
    //console.log($enseignement);
    $coef = $('.coefficient').val();
    //console.log($coef);
    $('.matiere_id :selected').each(function () {
        $matiere = $(this).data('matiere');
        $matiere_id = $(this).data('matiere_id');
    });
    //console.log($matiere);

    if ($classe_id > 0 && $enseignement_id > 0 && $matiere_id > 0 && $coef) {
            var tr = '<tr data-matiere_id='+$matiere_id+' data-coef='+$coef+'><td>'+$matiere+'</td><td>'+$coef+'</td><td><i style="color:#a10101" class="fa fa-trash btn-trash"></i></td></tr>';
            $('.table-programme').find('tbody').append(tr);
        $(".btn-trash").click(function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
    }

    else{
        alert("Attention vous avez oubliez de saisir ou selectionner une information !!!");
    }


});
$("#btn-save").click(function (e) {
    e.preventDefault();
    var lignes = [];
    $('.table-programme').find('tbody tr').each(function() {
        var elt = {
            matiere_id: $(this).data('matiere_id'),
            coef: $(this).data('coef')
        }
        lignes.push(elt);
    });
    $.ajax({
        type: "post",
        url: "/superadmin/programmes-national",
        data: {
            'lignes': lignes,
            'classe_id': $classe_id,
            'enseignement_id': $enseignement_id,
            '_token': $('input[name="_token"]').val()
        },
        dataType: "json",
        success: function (response) {
            alert('Ajout du programme avec success !!!');
            window.location.reload();
        },
        error: function() {
            alert('Une erreur est survenue sur le serveur !!!!')
            //window.location.reload();
        }
    });
});
