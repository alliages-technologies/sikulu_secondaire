
$(".etape2").hide();
$(".etape3").hide();
$(".suivant1").hide();
$(".terminer1").hide();
// Verification 1
$(".verifier1").click(function (e) {
    e.preventDefault();
    var phone = $(".phone").val();

    $.ajax({
        type: "get",
        url: "/adminecole/profs-verification-numero",
        data: {
            phone:phone
        },
        dataType: "json",
        success: function (response) {
            var prof_id = response.id;
            var nom = response.name;
            var telephone = response.phone;
            var email = response.email;
            if (phone == telephone) {
                $(".p1").html("");
                var p = '<span style="color: black"> <p><strong>Il y a déjà un utilisateur avec ce numéro de téléphone dans la base de données, merci de bien vouloir saisir un autre numéro</strong></p>  NOM: '+nom+'<br> TELEPHONE: <strong>'+telephone+'</strong><br> EMAIL: '+email+' </span>';
                $(".p1").append(p);
                // Terminer 1
                $(".terminer1").show(1000);
                $(".terminer1").click(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "post",
                        url: "/adminecole/profs-terminer-un",
                        data: {
                            prof_id: prof_id,
                            "_token": $('input[name="_token"]').val()
                        },
                        dataType: "json",
                        success: function (response) {
                            alert("PROF AJOUTE AVEC SUCCES");
                            window.location.replace("/adminecole/profs");
                        }
                    });
                });
            }else{
                $(".suivant1").show(1000);
                $(".etape1").hide(1000);
                $(".etape2").show(1000);
                $(".suivant2").hide();
                $(".terminer2").hide();
                // Verification 2
                $(".verifier2").click(function (e) {
                    e.preventDefault();
                    var nom = $(".nom").val();
                    var prenom = $(".prenom").val();
                    var adresse = $(".adresse").val();
                    var diplome = $(".diplome_id").val();

                    $.ajax({
                        type: "get",
                        url: "/adminecole/profs-verification-info",
                        data: {
                            nom: nom,
                            prenom: prenom,
                            adresse: adresse,
                            diplome_id: diplome,
                        },
                        dataType: "json",
                        success: function (response) {
                            var prof_id = response.id;
                            var nom = response.nom;
                            var prenom = response.prenom;
                            var adresse = response.adresse;
                            var diplome = response.dip;
                            if (prof_id) {
                                $(".p2").html("");
                                var p = '<span style="color: black">nom : '+nom+' <br> prenom : '+prenom+' <br> diplome : '+diplome+' <br> adresse : '+adresse+' </span>';
                                $(".p2").append(p);
                                $(".terminer2").show(1000);
                                // Terminer 2
                                $(".terminer2").click(function (e) {
                                    e.preventDefault();
                                    $.ajax({
                                        type: "post",
                                        url: "/adminecole/profs-terminer-deux",
                                        data: {
                                            prof_id: prof_id,
                                            nom: $(".nom").val(),
                                            prenom: $(".prenom").val(),
                                            adresse: $(".adresse").val(),
                                            diplome: $(".diplome_id").val(),
                                            phone: $(".phone").val(),
                                            "_token": $('input[name="_token"]').val()
                                        },
                                        dataType: "json",
                                        success: function (response) {
                                            alert("Succes !!!");
                                            window.location.reload();
                                        }
                                    });
                                });
                            }else{
                                $(".suivant2").show(1000);
                                $(".suivant2").click(function (e) {
                                    e.preventDefault();
                                    $(".etape2").hide(1000);
                                    $(".etape3").show(1000);
                                    $(".terminer3").click(function (e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: "post",
                                            url: "/adminecole/profs",
                                            data: {
                                                phone: $(".phone").val(),
                                                nom: $(".nom").val(),
                                                prenom: $(".prenom").val(),
                                                adresse: $(".adresse").val(),
                                                diplome: $(".diplome_id").val(),
                                                password: $(".password").val(),
                                                email: $(".email").val(),
                                                "_token": $('input[name="_token"]').val()
                                            },
                                            dataType: "json",
                                            success: function (response) {
                                                alert("CONFIGURATION REUSSIE AVEC SUCCES");
                                                window.location.replace("/adminecole/profs");
                                            }
                                        });
                                    });
                                });
                            }
                        }
                    });
                });
            }
        }
    });
});
