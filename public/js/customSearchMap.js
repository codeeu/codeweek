window.getEvents = function (mapData) {
    console.log('🔥 window.getEvents called with:', mapData);

    if (!mapData || typeof mapData !== 'object') {
        console.warn('⚠️ Invalid mapData:', mapData);
        return;
    }

    if (!window.L || !window.L.markerClusterGroup) {
        console.error('❌ Leaflet or MarkerCluster is missing');
        return;
    }

    if (!window.map) {
        console.error('❌ No Leaflet map initialized!');
        return;
    }

    // Clear old cluster
    if (window.markersCluster) {
        window.map.removeLayer(window.markersCluster);
        console.log('🗑️ Removed old markersCluster');
    }

    // Build new cluster
    var allMarkers = [];

    Object.keys(mapData).forEach(country => {
        const events = mapData[country] || [];
        console.log(`📍 ${country} → ${events.length} events`);

        events.forEach(ev => {
            if (ev.geoposition && ev.geoposition.includes(',')) {
                const [latStr, lngStr] = ev.geoposition.split(',');
                const lat = parseFloat(latStr.trim());
                const lng = parseFloat(lngStr.trim());

                if (!isNaN(lat) && !isNaN(lng)) {
                    const marker = L.marker([lat, lng], { id: ev.id, country: country });
                    marker.bindPopup(`<a href="/view/${ev.id}/${ev.slug}">${ev.title}</a>`);
                    allMarkers.push(marker);
                } else {
                    console.warn(`⚠️ Skipped bad geoposition: ${ev.geoposition}`);
                }
            } else {
                console.warn(`⚠️ Missing geoposition for event ID ${ev.id}`);
            }
        });
    });

    console.log(`✅ Total markers to add: ${allMarkers.length}`);

    window.markersCluster = L.markerClusterGroup({
        showCoverageOnHover: false,
        maxClusterRadius: 120
    });

    window.markersCluster.addLayers(allMarkers);
    window.map.addLayer(window.markersCluster);

    console.log('🚀 Markers added to map!');
};
