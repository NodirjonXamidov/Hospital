<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenStreetMap with Leaflet</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    @include('admin.css')

    <style>
        #map {
            height: 500px;
            width: 100%;
        }

        .table-container {
            padding: 20px;
        }

        th, td {
            border: 1px solid rgb(71, 69, 69);
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid">
        <div class="row" style="padding-top: 200px;">
            <!-- Table Container -->
            <div class="col-md-6 table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $hospital)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hospital->name }}</td>
                            <td>{{ $hospital->phone }}</td>
                            <td>{{ $hospital->address }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Map Container -->
            <div id="map" class="col-md-6"></div>
        </div>
    </div>



    @include('admin.sctipt')

</body>

</html>
