function init() {
    // $("#bottone").click(function(e) {
    //     e.preventDefault();
    //     getlatlon();
    // })


    $('#bottone').click(function (e) {

            var val1 = $("#lat").val();
            var val2 = $("#lon").val();
            e.preventDefault();
            getlatlon(); //perform some operations

            setTimeout(function(){
              $("#form-flat").submit();
            }, 500);



          });
}

function getlatlon() {
    var road = $("#road").val();
    var cap = $("#cap").val();
    var civ_num = $("#civ_num").val();
    console.log(road);
    console.log(cap);
    console.log(civ_num);
    var parametri;
    $.ajax({
        url: "https://api.tomtom.com/search/2/structuredGeocode.json",
        method: "GET",
        data: {
            countryCode: "ITA",
            limit: 1,
            streetNumber: civ_num,
            streetName: road,
            postalCode: cap,
            key: "i2D5CGYtl0tUEgcZfIEET1lZo9mBMtMy"
        },
        success: function(data) {
            parametri = data["results"][0]["position"];
            console.log(data);
            console.log("parametri", parametri);
            var lat = parametri.lat;
            var lon = parametri.lon;
            $("#lat").val(lat);
            $("#lon").val(lon);

        },
        error: function(err) {
            console.log("err");
        }
    })
}






$(document).ready(init);
