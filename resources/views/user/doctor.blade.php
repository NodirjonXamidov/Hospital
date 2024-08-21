<!DOCTYPE html>
<html>
<head>
    <title>Our Doctors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('path/to/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('path/to/owl.theme.default.min.css') }}">
</head>
<body>
<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach ($doctors as $doctor)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img height="250px" width="98px" src="{{ asset('doctor_images/' . $doctor->image) }}" alt="{{ $doctor->name }}">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-telegram"></span></a>
                            </div>
                        </div>
                        <div class="body">
                            <p class="text-xl mb-0">{{ $doctor->name }}</p>
                            <span class="text-sm text-grey">{{ $doctor->speciality }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{ asset('path/to/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#doctorSlideshow").owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });
    });
</script>
</body>
</html>
