$(function () {
    document.getElementById("js-photo").onchange = function(event) {
        initializeFiles();

        var files = event.target.files;

        for (var i = 0, f; (f = files[i]); i++) {
            var reader = new FileReader();
            reader.readAsDataURL(f);

            reader.onload = (function(theFile) {
                return function(e) {
                    var div = document.createElement("div");
                    div.className = "js-img";
                    div.innerHTML =
                        '<img class="js-img__content" src="' +
                        e.target.result +
                        '" />';
                    div.innerHTML +=
                        '<textarea class="js-img__desc" placeholder="写真に説明を入れましょう"></textarea>';
                    document.getElementById("js-img__output").insertBefore(div, null);
                };
            })(f);
        }
    };

    function initializeFiles() {
        document.getElementById("js-img__output").innerHTML = "";
    }
});
