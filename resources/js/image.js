$(function() {
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
                        '<img class="js-img__photo" src="' +
                        e.target.result +
                        '" />';
                    div.innerHTML +=
                        '<textarea class="js-img__desc" name="photo_body[]" placeholder="写真に説明を入れましょう"></textarea>';
                    document
                        .getElementById("js-img__output")
                        .insertBefore(div, null);
                };
            })(f);
        }
    };

    function initializeFiles() {
        document.getElementById("js-img__output").innerHTML = "";
    }
});

$(function() {
    document.getElementById("js-profile-image").onchange = function(event) {
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
                        '<img class="js-img__profile" src="' +
                        e.target.result +
                        '" />';
                    document
                        .getElementById("js-img__output")
                        .insertBefore(div, null);
                };
            })(f);
        }

    };

    function initializeFiles() {
        var el = document.getElementById("js-img__output");
        el.style.border = "none";   
        el.style.backgroundImage = "none";
    }
});
