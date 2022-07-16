var composition_active = $('.trimestre_active').val();
var composition_id = $('.trimestre_id').val();

$(".btn-save").click(function (e) {
    if (composition_active == composition_id) {
        e.preventDefault();
            $.ajax({
                type: "post",
                url: "/adminecole/scolarite/generation-auto-releve",
            data: {
                trimestre_id: $(".trimestre_id").val(),
                '_token': $('input[name="_token"]').val()
            },
            dataType: "json",
            success: function (response) {
                alert("Géneration éffectuée avec succès !!!");
                window.location.reload();
            },
            error: function () {
                alert('Vous ne pouvez plus génerer les relevés de ce trimestre !!!!');
            }
        });
    }
    else {
        alert('Désolé vous ne pouvez pas genérer les relevés de cette composition, car elle n\'est pas active');
    }
});
