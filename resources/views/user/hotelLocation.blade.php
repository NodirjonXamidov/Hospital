<div>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([41.26465, 69.21627], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([41.26465, 69.21627], {
            draggable: true
        }).addTo(map);

        function getAddress(lat, lon) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('address').value = data.display_name;
                })
                .catch(error => console.error('Error fetching address:', error));
        }

        function updateMarkerAndAddress(latlng) {
            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker(latlng, {
                draggable: true
            }).addTo(map);

            document.getElementById('latitude').value = latlng.lat;
            document.getElementById('longitude').value = latlng.lng;
            getAddress(latlng.lat, latlng.lng);

            marker.on('dragend', function(e) {
                var position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat;
                document.getElementById('longitude').value = position.lng;
                getAddress(position.lat, position.lng);
            });
        }

        updateMarkerAndAddress([41.8781, -87.6298]);
    </script>
</div>
