map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: {
        lat:50.8093378,
        lng:4.4088449
    },
    mapTypeControl: false,
    panControl: false,
    zoomControl: false,
    streetViewControl: false
});

autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */ (
        document.getElementById('autocomplete')));

autocomplete.addListener('place_changed', onPlaceChanged);


// When the user selects a city, get the place details for the city and
// zoom the map in on the city.
function onPlaceChanged() {
    var place = autocomplete.getPlace();
    if (place.geometry) {


        map.panTo(place.geometry.location);
        map.setZoom(15);

        var filtered_array = place.address_components.filter(function(address_component){
            return address_component.types.includes("country");
        });

        document.getElementById('country_iso').value = filtered_array.length ? filtered_array[0].short_name: "";;
        document.getElementById('geoposition').value = place.geometry.location.lat() + "," + place.geometry.location.lng();;
        //search();
    } else {
        document.getElementById('autocomplete').placeholder = 'Enter a city';
    }
}