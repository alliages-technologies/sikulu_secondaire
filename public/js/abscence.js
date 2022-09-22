$(document).ready(function () {
    $(".salle").change(function (e) {
        e.preventDefault();
        $('.abscences tbody').html("");
        var salle_id = $(this).val();
        //console.log(salle_id);
        $.ajax({
            type: "get",
            url: "/surveillant/abscences/get-inscriptions-by-salle/"+salle_id,
            data: "",
            dataType: "json",
            success: function (inscriptions) {
                var inscriptionData = Object.entries(inscriptions);
                inscriptionData.forEach(function ([$key, $value]){
                    var tr = '<tr> <td data-inscription_id='+$value["id"]+'>'+$value["name"]+'</td> <td> <input type="checkbox" name="" id="" class="form-control inscription" data-inscription_id='+$value["id"]+' data-salle_id='+$value["salle_id"]+'> </td> </tr>';
                    $('.abscences tbody').append(tr);
                });
            }
        });
    });


        $(".btn-save").click(function (e) {
            e.preventDefault();
            var lignes = [];

            $('.abscences tbody tr td :checked').each(function () {
                var  val = {
                    inscription_id: $(this).data("inscription_id"),
                    salle_id: $(this).data("salle_id")
                }
                lignes.push(val);
            });

            var jour = $('.jour').val();

            if (jour) {
                $.ajax({
                    type: "post",
                    url: "/surveillant/abscence",
                    dataType: "json",
                    data: {
                        lignes: lignes,
                        jour: jour,
                        '_token': $('input[name="_token"]').val()
                    },
                    success: function (response) {
                        alert('Opération effectuée avec succèss !!!!');
                        window.location.reload();
                    }
            });
            }

            else {
                alert('Veuillez rentrer la date !!!!');
            }

    });



});
