<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenStreetMap with Leaflet</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    @include('admin.css')

    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            padding-top: 20px;
        }

        #map {
            height: 500px;
            flex: 1;
            min-width: 300px;
        }

        .form-container,
        .table-container {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>

    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container" style="padding: 100px;">
        <!-- Form Container -->
        <div class="form-container">
            <form action="{{ route('hospital.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                </div>
                <div class="form-group">
                    <label for="INN">INN:</label>
                    <input type="number" class="form-control" id="INN" name="INN" placeholder="Enter INN" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <!-- Hidden fields for latitude and longitude -->
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
                <button type="submit" class="btn btn-primary">Save Hospital</button>
            </form>
        </div>

        <!-- Map Container -->
        <div id="map"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([41.26465, 69.21627], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        @foreach ($data as $hospital)
        var address = "{{ $hospital->address }}";
        fetch(`https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(address)}&format=json`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var latitude = data[0].lat;
                    var longitude = data[0].lon;
                    var marker = L.marker([latitude, longitude]).addTo(map);
                    var popupContent = `<a href="{{ url('location', $hospital->id) }}" target="_blank">{{ $hospital->name }}</a><br>${address}`;
                    marker.bindPopup(popupContent);
                }
            })
            .catch(error => console.error('Error fetching location:', error));
        @endforeach
    </script>

    @include('admin.sctipt')

</body>

</html>
