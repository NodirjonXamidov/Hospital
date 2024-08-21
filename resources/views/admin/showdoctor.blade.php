<!DOCTYPE html>
<html lang="en">

<head>
    
    @include('admin.css')
</head>

<body>


    @include('admin.sidebar')

    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div align="center" style="padding-top:100px;">
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Doctor name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">speciality</th>
                        <th scope="col">Room Number</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($data as $doctor)
                            <th scope="row">{{ $doctor->id }}</th>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->speciality }}</td>
                            <td>{{ $doctor->room }}</td>
                            <td>
                                <a class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this?')"
                                    href="{{ url('deleteDoctor', $doctor->id) }}">Delete</a>
                            </td>

                            <td>
                                <a class="btn btn-outline-primary"
                                    href="{{ url('updateDoctor', $doctor->id) }}">Update</a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.sctipt')

</body>

</html>
