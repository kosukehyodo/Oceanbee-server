$(function () {
    var jpmap = require("japan-map-js");
    
    var d = new jpmap.japanMap(document.getElementById("my-map"), {
        showsPrefectureName: true,
        width: 1000,
        movesIslands: true,
        lang: "ja",
        onSelect: function(data) {
            alert(data.name);
        }
    });
});

