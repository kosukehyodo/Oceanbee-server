
$(function () {
    const flatpickr = require("flatpickr");

    const config = {
        dateFormat: "Y-m-d",
        enableTime: true,
    };

    flatpickr("#flatpickr", config);
});
