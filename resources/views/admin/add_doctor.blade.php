<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
</head>

<body>
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center" style="padding-top: 100px">
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ session()->get('message') }}
            </div>
            @endif

            <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px">
                    <label for="name">Add Doctor</label>
                    <input type="text" style="color: black" name="name" placeholder="Write the name" required>
                </div>

                <div style="padding: 15px">
                    <label for="number">Phone</label>
                    <input type="number" style="color: black" name="number" placeholder="Write the number" required>
                </div>

                <div style="padding: 15px">
                    <label for="speciality">Specialty</label>
                    <select name="speciality" style="color: black; width:200px" required>
                        <option value="">-- Select --</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                    </select>
                </div>

                <div style="padding: 15px">
                    <label for="room">Room number</label>
                    <input type="number" style="color: black" name="room" placeholder="Write the room number" required>
                </div>

                <div style="padding: 15px">
                    <label for="file">Doctor Image</label>
                    <input type="file" name="file" required>
                </div>

                <div style="padding: 15px">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

    @include('admin.sctipt')
</body>

</html>
