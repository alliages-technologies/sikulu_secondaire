
$(".etape2").hide();
$(".etape3").hide();
$(".suivant1").hide();
$(".terminer1").hide();
$("#resultats-prof").hide();
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
        success: function (user) {
            var prof_id = user.id;
            var nom = user.name;
            var telephone = user.phone;
            var email = user.email;
            if (phone == telephone) {
                $(".p1").html("");
                var p = '<span style="color: black"> <p><strong>Il y a déjà un utilisateur avec ce numéro de téléphone dans la base de données, merci de bien vouloir saisir un autre numéro ou de cliquer sur "TERMINER" si vous souhaitez le rajouter dans la liste des profs de votre établissement.</strong></p> <hr>  NOM: '+nom+'<br> TELEPHONE: <strong>'+telephone+'</strong><br> EMAIL: '+email+' </span>';
                $(".p1").append(p);
                // Terminer 1
                $(".terminer1").show(400);
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
                            alert("VOUS VENEZ D'AJOUTER CE PROF DANS VOTRE ETABLISSEMENT AVEC SUCCES");
                            window.location.replace("/adminecole/profs");
                        }
                    });
                });
            }else{
                $(".suivant1").show(400);
                $(".etape1").hide(400);
                $(".etape2").show(400);
                $(".suivant2").hide();
                $(".terminer2").hide();
                // Verification 2
                $(".verifier2").click(function (e) {
                    e.preventDefault();
                    var nom = $(".nom").val();
                    var prenom = $(".prenom").val();
                    var date_naiss = $(".date_naiss").val();
                    var lieu_naiss = $(".lieu_naiss").val();
                    var adresse = $(".adresse").val();
                    var diplome = $(".diplome_id").val();
                    $.ajax({
                        type: "get",
                        url: "/adminecole/profs-verification-info",
                        data: {
                            nom: nom,
                            prenom: prenom,
                            date_naiss:date_naiss,
                            lieu_naiss:lieu_naiss,
                            adresse: adresse,
                            diplome_id: diplome,
                        },
                        dataType: "json",
                        success: function (prof) {
                            var prof_id = prof.id;
                            var nom = prof.nom;
                            var prenom = prof.prenom;
                            var adresse = prof.adresse;
                            var diplome = prof.dip;
                            if (prof_id) {
                                $(".p2").html("");
                                var p = '<span class="card pb-4" style="color: black"> <small style="color: green; margin: 10px;"> <strong>Cliquer sur "TERMINER" pour rajouter le prof dans votre établissement et sur "SUIVANT" s\'il ne s\'agit pas de la même personne</strong> </small> <hr> NOM: <strong>'+nom+'</strong><br> PRENOM: <strong>'+prenom+'</strong><br> ADRESSE: <strong>'+adresse+'</strong><br> DERNIER DIPLOME: <strong>'+diplome+'</strong><br> NE LE: <strong>date de naissance</strong><br> A: <strong>lieu de naissance</strong><br> NATIONALITE: <strong>Congolaise</strong><br> </span>';
                                $(".p2").append(p);
                                $(".terminer2").show(400);
                                $(".suivant2").show(400);
                                $(".suivant2").click(function (e) {
                                    $(".etape2").hide(400);
                                    $(".etape3").show(400);
                                })
                                // Terminer 2
                                $(".terminer2").click(function (e) {
                                    e.preventDefault();
                                    $.ajax({
                                        type: "post",
                                        url: "/adminecole/profs-terminer-deux",
                                        data: {
                                            prof_id: prof_id,
                                            //nom: $(".nom").val(),
                                            //prenom: $(".prenom").val(),
                                            adresse: $(".adresse").val(),
                                            diplome: $(".diplome_id").val(),
                                            //phone: $(".phone").val(),
                                            "_token": $('input[name="_token"]').val()
                                        },
                                        dataType: "json",
                                        success: function (response) {
                                            //console.log(response);
                                            alert("VOUS VENEZ D'AJOUTER CE PROF DANS VOTRE ETABLISSEMENT AVEC SUCCES");
                                            window.location.replace("/adminecole/profs");
                                        }
                                    });
                                });
                            }else{
                                $(".suivant2").show(400);
                                $(".suivant2").click(function (e) {
                                    e.preventDefault();
                                    $(".etape2").hide(400);
                                    $(".etape3").show(400);
                                    $(".terminer3").click(function (e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: "post",
                                            url: "/adminecole/profs",
                                            data: {
                                                phone: $(".phone").val(),
                                                nom: $(".nom").val(),
                                                prenom: $(".prenom").val(),
                                                date_naiss: $(".date_naiss").val(),
                                                lieu_naiss: $(".lieu_naiss").val(),
                                                adresse: $(".adresse").val(),
                                                diplome: $(".diplome_id").val(),
                                                password: $(".password").val(),
                                                email: $(".email").val(),
                                                image: $(".image").val(),
                                                "_token": $('input[name="_token"]').val()
                                            },
                                            dataType: "json",
                                            success: function (response) {
                                                alert("PROF AJOUTE AVEC SUCCES");
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
