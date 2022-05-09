$(function (){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<span class="title">#title#</span>',
        labels: {
            previous : 'PRECEDENT',
            next : 'SUIVANT',
            finish : 'CONFIRMER',
            current : ''
        }
    });
});



$(".btn-save").click(function (e) { 
    e.preventDefault();
    var nom = $(".nom").val();
    var telephone = $(".telephone").val();
    var email = $(".email").val();
    var password = $(".password").val();

    $.ajax({
        type: "post",
        url: "/adminecole/profs",
        data: {
            nom: nom,
            telephone: telephone,
            email: email,
            password: password,
            "_token": $('input[name="_token"]').val(),
        },
        dataType: "json",
        success: function (response) {
            
        }
    });     
});