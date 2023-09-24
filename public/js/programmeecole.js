
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

                $(".profs").change(function (e) {
                    e.preventDefault();
                    var prof_id = $(this).val();
                    $("#btn-save").click(function (e) {
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
        }
    });
});
