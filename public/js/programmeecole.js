

$(".btn-edit").click(function (e) {
    e.preventDefault();
    var lpe = $(this).data("lpe");
    //console.log(lpe);

    $.ajax({
        type: "get",
        url: "/adminecole/get-lignes-programme-national-by-id/"+lpe,
        data: {
            lpe: lpe
        },
        dataType: "json",
        success: function (response) {
            //console.log(response);
            $('.table-programme').find('tbody .add-tr').html("");
            var tr = '<tr class="add-tr"> <td>' +response.matieren + '</td></tr>';
            $('.table-programme').find('tbody').append(tr);

            $.ajax({
                type: "get",
                url: "/adminecole/get-profs",
                data: "",
                dataType: "json",
                success: function (response) {
                    $('.profs').html("");
                    var donnees = Object.entries(response);
                    donnees.forEach(function([$k, $v]) {
                        var option = '<option value='+$v["id"]+'>' +$v["name"]+'</option>'
                        $('.profs').append(option);

                        $(".profs").change(function (e) {
                            e.preventDefault();
                            var prof_id = $(this).val();
                            $(".btn-save").click(function (e) {
                                e.preventDefault();
                                console.log(prof_id);
                                $.ajax({
                                    type: "get",
                                    url: "/adminecole/save-prof",
                                    data: {
                                        lpe: lpe,
                                        prof_id: prof_id
                                    },
                                    dataType: "json",
                                    success: function (response) {
                                    window.location.reload();

                                    }
                                });
                            });
                        });

                    });

                }
            });
        }
    });
});
