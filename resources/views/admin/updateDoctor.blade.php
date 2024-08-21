<!DOCTYPE html>
<html lang="en">

<head>
 <base href="/public">
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
</head>

<body>

<!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
@include('admin.navbar')
<style>
    .vertical-alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1050; /* Other elements may overlap otherwise */
    }
</style>

<div class="container-fluid page-body-wrapper">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show vertical-alert" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

  <div class="container" align="center" style="padding: 100px;">
      <form action="{{url('editDoctor', $data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div style="padding: 15px;">
              <label>Doctor name</label>
              <input type="text" name="name" style="color: black;" value="{{$data->name}}">
          </div>

          <div style="padding: 15px;">
              <label>Phone</label>
              <input type="number" name="phone" style="color: black;" value="{{$data->phone}}">
          </div>

          <div style="padding: 15px;">
              <label>speciality</label>
              <input type="text" name="speciality" style="color: black;" value="{{$data->speciality}}">
          </div>

          <div style="padding: 15px;">
              <label>Room</label>
              <input type="text" name="room" style="color: black;" value="{{$data->room}}">
          </div>

          <div style="padding: 15px;">
              <label>Old Image</label>
              <img height="150" width="150" src="{{ asset('doctor_images/' . $data->image) }}">
          </div>
          <div style="padding: 15px;">
              <label>Change Image</label>
              <input type="file" name="file">

          </div>

          <div style="padding: 15px;">

              <input type="submit" class="btn btn-primary">

          </div>
      </form>

  </div>

</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.sctipt')
<!-- End custom js for this page -->
</body>

</html>
