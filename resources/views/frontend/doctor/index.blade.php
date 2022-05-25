@section('title', 'Doctor')
<!---------- Include Head File --------->
@include('frontend.head')

<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

<!------- Include Navbar File --------->
@include('frontend.navbar')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="page-banner overlay-dark bg-image"
     style="background-image: url('{{ asset('frontend/assets/img/bg_image_1.jpg') }}');">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Our Doctors</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->
<div class="page-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="row">
                    @foreach($doctors as $doctor)
                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img style="width: 240px !important; height: 260px !important;"
                                         src="{{ asset('admin/images/upload-doctor/' . $doctor->image) }}" alt="">
                                    <div class="meta">
                                        <a href="#"><span class="mai-call"></span></a>
                                        <a href="#"><span class="mai-logo-whatsapp"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. {{ $doctor->doctor_name }}</p>
                                    <span class="text-sm text-grey">
                                        {{ Str::ucfirst($doctor->speciality_name) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" action="{{ url('/appointment') }}" method="POST">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" class="form-control" name="name" placeholder="Full name">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="email" class="form-control" name="email" placeholder="Email address">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor" id="departement" class="custom-select">
                        <option>---------- Select A Doctor ----------</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->doctor_name }}">
                                {{ $doctor->doctor_name }}
                                ----- Speciality ----- ( {{ $doctor->speciality_name }} )
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" name="phone" class="form-control" placeholder="Number">
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6"
                              placeholder="Enter message"></textarea>
                </div>
            </div>

            <button type="submit" style="background: #00D9A5 !important; color: white" class="btn mt-3 wow zoomIn">
                Submit Request
            </button>
        </form>
    </div> <!-- .container -->
</div> <!-- .page-section -->


<div class="page-section banner-home bg-image"
     style="background-image: url('{{ asset('frontend/assets/img/banner-pattern.svg') }}');">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="{{ asset('frontend/assets/img/mobile_app.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="{{ asset('frontend/assets/img/google_play.svg') }}" alt=""></a>
                <a href="#" class="ml-2"><img src="{{ asset('frontend/assets/img/app_store.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</div> <!-- .banner-home -->


<!---------- Include Footer File --------->
@include('frontend.footer')


<!---------- Include Script File --------->
@include('frontend.script')

</body>
</html>
