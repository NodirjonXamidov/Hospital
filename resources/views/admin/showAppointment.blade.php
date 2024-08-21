<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.css')
</head>

<body>


    @include('admin.sidebar')

    @include('admin.navbar')
    <div class="container-fluid page-body-wrapper" style="algin-center">
        <div align="center" style="padding-top:100px;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Costumer name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Doctor name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Approved</th>
                        <th scope="col">Cencal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $appoint)
                        <tr>
                            <th scope="row">{{ $appoint->id }}</th>
                            <td>{{ $appoint->name }}</td>
                            <td>{{ $appoint->email }}</td>
                            <td>{{ $appoint->phone }}</td>
                            <td>{{ $appoint->doctor }}</td>
                            <td>{{ $appoint->date }}</td>
                            <td>{{ $appoint->message }}</td>
                            <td>{{ $appoint->status }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ url('approved', $appoint->id) }}">Approved</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('cancel', $appoint->id) }}">Cancel</a>
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
