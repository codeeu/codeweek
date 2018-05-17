$(document).on('ready', function () {

    //------- Google Maps ---------//

    // Creating a LatLng object containing the coordinate for the center of the map
    var latlng = new google.maps.LatLng(50.8093378, 4.4088449);

    // Creating an object literal containing the properties we want to pass to the map
    var options = {
        zoom: 4, // This number can be set to define the initial zoom level of the map
        center: latlng,
        scrollwheel: true,
        styles: [
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#444444"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#ededed"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 45
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#c0e4f3"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            }
        ],
        mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
    };
    // Calling the constructor, thereby initializing the map
    var map = new google.maps.Map(document.getElementById('home-map'), options);

    var success = function (data) {

        $.each(data, function (key, val) {

            // Add Marker
            var coordinates = val.geoposition.split(',');
            var marker1 = new google.maps.Marker({
                position: new google.maps.LatLng(coordinates[0], coordinates[1]),
                map: map

            });

            google.maps.event.addListener(marker1, 'click', function () {
                console.log(val);
                // Add information window
                $.ajax({
                    dataType: "json",
                    url: "api/event/detail?id=" + val.id,
                    success: function(res){

                        var event = res.data;

                        var bubble_content = '<div><h4><a href="' + event.path + '" class="map-marker">' + event.title + '</a></h4><div>' +
                            '<img src="' + event.picture + '" class="img-polaroid marker-buble-img">' +
                            '<p style="overflow:hidden;">' + event.description +
                            '&nbsp;<a class="btn btn-sm" href="' + event.path + '" class="map-marker"><span>More...</span></a></p>';

                        var infowindow1 = new google.maps.InfoWindow({
                            content: bubble_content
                        });

                        infowindow1.open(map, marker1);


                    }
                });



            });



        });
    };

    $.ajax({
        dataType: "json",
        url: "api/event/list",
        success: success
    });



    // Create information window
    function createInfo(title, content) {
        return '<div class="infowindow"><span>' + title + '</span>' + content + '</div>';
    }


});

