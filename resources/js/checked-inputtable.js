$(function() {
    $(".js-daily-price").attr("disabled", "disabled");
    $(".js-monthly-price").attr("disabled", "disabled");


    $(".js-checkbox-daily-price").click(function () {
        if ($(this).prop("checked") == false) {
            $(".js-daily-price").attr("disabled", "disabled");
        } else {
            $(".js-daily-price").removeAttr("disabled");
        }
    });

    $(".js-checkbox-monthly-price").click(function() {
        if ($(this).prop("checked") == false) {
            $(".js-monthly-price").attr("disabled", "disabled");
        } else {
            $(".js-monthly-price").removeAttr("disabled");
        }
    });
});
