let mapData = {
    center: [28.169, 84.144],
    zoom: 8
}

let distanceresults = [];

const map = new L.map('map', mapData);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 12,
}).addTo(map);

const bloodbanks = [
    [27.941, 82.826],//butwal
    [28.271, 83.941]//pokhara
];//coordinates of bloodbank
bloodbanks.map(function (num) {//adds marker
    new L.Marker(num).addTo(map);
});



let oldMarker = null; // variable to store the old marker

map.on('click', function (e) {//adds marker onclick
    var latUser = e.latlng.lat;
    var lngUser = e.latlng.lng;

    // remove the old marker from the map
    if (oldMarker) {
        oldMarker.removeFrom(map);
    }



    // add the new marker to the map and store it in the variable
    oldMarker = L.marker([latUser, lngUser], {
        title: 'My Marker',
        draggable: true,
    }).addTo(map);

    var url = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + latUser + '&lon=' + lngUser;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            //push popup data
            var res = document.querySelector('.res');
            var popupContent = document.getElementById('popup-content');
            popupContent.innerHTML = '<h2>' + data.address.city + '</h2>' + '<h2>(' + data.display_name.split(" ").splice(0, 3) + ')<h2>' +
                '<p>lat :' + data.lat + '</p>' + '<p>long :' + data.lon + '</p>';
            console.log(data);

            // do something with the geocoding data

            bloodbanks.map(function (data) {//pushes data in bloodbanks to compare it with obtain data of user.
                //haversine
                Number.prototype.toRad = function () {
                    return this * Math.PI / 180;
                }



                var lat2 = data[0];
                var lon2 = data[1];




                var R = 6371; // km 
                //has a problem with the .toRad() method below.
                var x1 = lat2 - latUser;
                var dLat = x1.toRad();
                var x2 = lon2 - lngUser;
                var dLon = x2.toRad();
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(latUser.toRad()) * Math.cos(lat2.toRad()) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c; //distance

                distanceresults.push(d);


            });





            res.innerHTML = "<h2> butwal distance is:" + distanceresults[0] + '<br>, Pokhara distance is:' + distanceresults[1] + '</h2>';

        })


});