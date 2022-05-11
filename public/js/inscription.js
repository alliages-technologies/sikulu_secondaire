$(".info-b").hide();

$(".suivant").click(function (e) {
    e.preventDefault();
    $(".info-b").show(1000);
    $(".info-a").hide(1000);
});

$(".precedent").click(function (e) {
    e.preventDefault();
    $(".info-b").hide(1000);
    $(".info-a").show(1000);
});
