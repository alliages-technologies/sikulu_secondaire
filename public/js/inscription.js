$(".info-parent").hide();

$(".suivant").click(function (e) {
    e.preventDefault();
    $(".info-parent").show(1000);
    $(".info-a").hide(1000);
});

$(".precedent").click(function (e) {
    e.preventDefault();
    $(".info-parent").hide(1000);
    $(".info-a").show(1000);
});

$(".btn-save").hide();
$(".pass-email-tuteur").hide();


$(".btn-verifier").click(function (e) {
    e.preventDefault();
    var nom = $(".nom_tuteur").val();
    var phone = $(".tel_tuteur").val();
    console.log(nom);
    console.log(phone);
    if (nom && phone) {
        $.ajax({
            type: "get",
            url: "/adminecole/tuteur-verification-numero",
            data: {
                nom: nom,
                phone: phone
            },
            dataType: "json",
            success: function (response) {
                if (phone == response.phone) {
                    alert(response.name+" existe bel et bien !!!");
                    $(".btn-save").show("1000");
                    $(".tuteur").hide("1000");
                }
                else{
                    $(".pass-email-tuteur").show(1000);
                    $(".row-btn-verifier").hide(1000);
                    $(".btn-save").show("1000");
                }
            }
        });
    }
    else{
        alert("Veuillez remplir ces champs SVP !!!");
    }

});
