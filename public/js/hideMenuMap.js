L.custom = {
    init: function(obj, params){ // this method is run as soon as the core loading process is loaded

        var center = $("#center").val();
        var coords = $("#geoposition").val();
        var event_coordinates = window.event_coordinates;

        if (coords){

            window.map = L.map(obj, {
                center: coords.split(","),
                zoom: 10,
                background: "osmec"
            });

            // window.map.on('mouseup', function(e) {
            //     console.log(map.getCenter());
            //     alert('center found: ' , map.getCenter())
            // });

            var coordinates = coords.split(",");

            if ($("#geoposition_marker").val()){

                var marker = L.marker(L.latLng(coordinates[0], coordinates[1]));
                marker.on('click', function(){
                    map.setView([coordinates[0], coordinates[1]], 14);
                });
                map.addLayer(marker);
            }

        }else if (event_coordinates){

            window.map = L.map(obj, {
                center: event_coordinates,
                zoom: 3,
                background: "osmec"
            });

            var marker = L.marker(L.latLng(event_coordinates[0], event_coordinates[1]));
            marker.on('click', function(){
                map.setView([event_coordinates[0], event_coordinates[1]], 16);
            });
            map.addLayer(marker);


        } else {

            window.map = L.map(obj, {
                center: [48, 4],
                zoom: 3,
                background: "osmec"
            });

        }



        map.menu.hide();

        // process next components
        $wt._queue("next");
    }
}
