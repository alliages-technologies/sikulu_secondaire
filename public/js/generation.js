$(".btn-save").click(function (e) {
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
});
