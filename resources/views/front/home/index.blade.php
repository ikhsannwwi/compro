@extends('front.layouts.main')

@push('title')
    Home
@endpush

@section('meta')
    <meta name="description" content="This is Home page">
    <meta name="keywords" content="home">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Home">
    <meta property="og:description" content="This is Home page">
    <meta property="og:image" content="URL to Your Image">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Judul Halaman Anda">
    <meta name="twitter:description" content="Deskripsi singkat konten halaman Anda.">
    <meta name="twitter:image" content="URL gambar terkait konten Anda">
@endsection

@push('head')
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner" id="bannerSection">
            <div class="carousel-item active">
                <img class="w-100" src="{{ img_src('golden_ratio.webp', 'default') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Lorem ipsum dolor sit amet</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit.</h1>
                        <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free
                            Quote</a>
                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ img_src('golden_ratio.webp', 'default') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Lorem ipsum dolor sit amet</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative, consectetur
                            adipiscing elit.</h1>
                        <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free
                            Quote</a>
                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endpush

@section('content')
    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Happy Clients</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Projects Done</h5>
                            <h1 class="mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4"
                        style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Win Awards</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5" id="aboutSection">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
                    </div>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed elit euismod ex
                        tincidunt semper vel ut enim. Suspendisse pharetra nulla a lobortis dictum. Donec iaculis laoreet
                        justo sed lacinia. Nam mollis quam vitae vehicula ultricies. Pellentesque habitant morbi tristique
                        senectus et netus et malesuada fames ac turpis egestas. Fusce sem elit, tincidunt ac ultricies eget,
                        porttitor quis nisi. Mauris vel risus nulla. Sed eu nisl eros. Sed in diam et nulla vulputate
                        vestibulum eu semper augue.</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+62 345 6789</h4>
                        </div>
                    </div>
                    <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request
                        A Quote</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                            src="{{ img_src('1-1 360.webp', 'default') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Why Choose Us</h5>
                <h1 class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
            </div>
            <div class="row g-5" id="ourFeatureSection">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Best In Industry</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-white"></i>
                            </div>
                            <h4>Award Winning</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s"
                            src="{{ img_src('1-1 480.webp', 'default') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Professional Staff</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>24/7 Support</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Services</h5>
                <h1 class="mb-0" id="serviceTitleSection">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
            </div>
            <div class="row g-5" id="serviceSection">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="mb-3">Fusce sem elit</h4>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-chart-pie text-white"></i>
                        </div>
                        <h4 class="mb-3">tincidunt ac ultricies eget</h4>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-code text-white"></i>
                        </div>
                        <h4 class="mb-3">porttitor quis nisi</h4>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fab fa-android text-white"></i>
                        </div>
                        <h4 class="mb-3">Fusce sem elit</h4>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon">
                            <i class="fa fa-search text-white"></i>
                        </div>
                        <h4 class="mb-3">tincidunt ac ultricies eget</h4>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <h3 class="text-white mb-3">Call Us For Quote</h3>
                        <p class="text-white mb-3">Vivamus enim erat, sodales quis sagittis non, hendrerit sed ligula.
                            Proin nec ex sapien.</p>
                        <h2 class="text-white mb-0">+012 345 6789</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">Request A Quote</h5>
                        <h1 class="mb-0" id="titleFreeQoute">Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos. Ut lobortis aliquam consequat.</h1>
                    </div>
                    <div class="row gx-3" id="featureFreeQouteSection">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-primary me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-primary me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                        </div>
                    </div>
                    <p class="mb-4" id="deskripsiFreeQoute">Vestibulum lobortis viverra lorem non maximus. Interdum et
                        malesuada fames ac ante
                        ipsum primis in faucibus. Curabitur vestibulum sapien quis cursus vestibulum. Mauris volutpat, magna
                        finibus viverra scelerisque, felis arcu pretium augue, maximus sollicitudin elit augue quis augue.
                    </p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0" id="teleponFreeQoute">+012 345 6789</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form>
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Request A Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
                <h1 class="mb-0" id="testimonialTitleSection">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s" id="testimonialSection">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{ img_src('1-1 360.webp', 'default') }}"
                            style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Lorem ipsum</h4>
                            <small class="text-uppercase">dolor sit amet</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Vivamus enim erat, sodales quis sagittis non, hendrerit sed ligula. Proin nec ex sapien. Donec nec
                        ipsum non est tristique tristique sed ac justo.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{ img_src('1-1 360.webp', 'default') }}"
                            style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Lorem ipsum</h4>
                            <small class="text-uppercase">dolor sit amet</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Vivamus enim erat, sodales quis sagittis non, hendrerit sed ligula. Proin nec ex sapien. Donec nec
                        ipsum non est tristique tristique sed ac justo.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{ img_src('1-1 360.webp', 'default') }}"
                            style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Lorem ipsum</h4>
                            <small class="text-uppercase">dolor sit amet</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Vivamus enim erat, sodales quis sagittis non, hendrerit sed ligula. Proin nec ex sapien. Donec nec
                        ipsum non est tristique tristique sed ac justo.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{ img_src('1-1 360.webp', 'default') }}"
                            style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Lorem ipsum</h4>
                            <small class="text-uppercase">dolor sit amet</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Vivamus enim erat, sodales quis sagittis non, hendrerit sed ligula. Proin nec ex sapien. Donec nec
                        ipsum non est tristique tristique sed ac justo.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
                <h1 class="mb-0">Donec nec ipsum non est tristique tristique sed ac justo.</h1>
            </div>
            <div class="row g-5" id="teamSection">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ img_src('1-1 480.webp', 'default') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Lorem ipsum</h4>
                            <p class="text-uppercase m-0">dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ img_src('1-1 480.webp', 'default') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Lorem ipsum</h4>
                            <p class="text-uppercase m-0">dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ img_src('1-1 480.webp', 'default') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Lorem ipsum</h4>
                            <p class="text-uppercase m-0">dolor sit amet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest Blog</h5>
                <h1 class="mb-0">Read The Latest Articles from Our Blog Post</h1>
            </div>
            <div class="row g-5" id="blogSection">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ img_src('4-3.webp', 'default') }}" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                                href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>Lorem ipsum</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">Lorem ipsum dolor sit amet</h4>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                Ut lobortis aliquam consequat. Quisque ac elementum mauris.</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ img_src('4-3.webp', 'default') }}" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                                href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>Lorem ipsum</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">Lorem ipsum dolor sit amet</h4>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                Ut lobortis aliquam consequat. Quisque ac elementum mauris.</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ img_src('4-3.webp', 'default') }}" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"
                                href="">Web Design</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>Lorem ipsum</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                            <h4 class="mb-3">Lorem ipsum dolor sit amet</h4>
                            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                Ut lobortis aliquam consequat. Quisque ac elementum mauris.</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Start -->
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //Banner
            $.ajax({
                type: "GET",
                url: "{{ route('web.getBanner') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let bannerHtml = ''

                    if (respon.data.length !== 0) {
                        for (let i = 0; i < respon.data.length; i++) {
                            const data = respon.data[i];

                            let bannerJsonDecode = JSON.parse(data.value);
                            if (bannerJsonDecode.img_url !== '') {
                                bannerHtml += `<div class="carousel-item ` + (i === 0 ? 'active' : '') +
                                    `">` +
                                    `<img class="w-100" src="{{ asset('administrator/assets/media/banner') }}/` +
                                    bannerJsonDecode.img_url + `" alt="Image">` +
                                    `<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">` +
                                    `<div class="p-3" style="max-width: 900px;">` +
                                    `<h5 class="text-white text-uppercase mb-3 animated slideInDown">` +
                                    bannerJsonDecode.title + `</h5>` +
                                    `<h1 class="display-1 text-white mb-md-4 animated zoomIn">` +
                                    bannerJsonDecode.body + `</h1>` +
                                    `<a href="{{ route('web.free_qoute') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free` +
                                    `Quote</a>` +
                                    `<a href="{{ route('web.contact') }}" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>` +
                                    `</div>` +
                                    `</div>` +
                                    `                                </div>`;
                            }
                        }
                        $('#bannerSection').html(
                            bannerHtml
                        )
                    }
                }
            });

            //About
            $.ajax({
                type: "GET",
                url: "{{ route('web.getAbout') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let aboutHtml = ''
                    let ourFeatureHtmlUp = ''
                    let ourFeatureHtmlDown = ''
                    let contact_telepon = ''


                    if (respon.ourfeature) {
                        for (let i = 0; i < respon.ourfeature.length; i++) {
                            const ourfeature = respon.ourfeature[i];

                            if (ourfeature.name === 'our_feature_0' || ourfeature.name ===
                                'our_feature_1') {
                                let ourFeatureJsonDecode = JSON.parse(ourfeature.value);
                                if ((ourFeatureJsonDecode.title !== null) || (ourFeatureJsonDecode
                                        .icon !== null)) {
                                    ourFeatureHtmlUp +=
                                        `<h5 class="mb-3"><i class="` + ourFeatureJsonDecode
                                        .icon + ` text-primary me-3"></i>` +
                                        ourFeatureJsonDecode.title + `</h5>`;
                                }
                            } else if (ourfeature.name === 'our_feature_2' || ourfeature.name ===
                                'our_feature_3') {
                                let ourFeatureJsonDecode = JSON.parse(ourfeature.value);
                                if ((ourFeatureJsonDecode.title !== null) || (ourFeatureJsonDecode
                                        .icon !== null)) {
                                    ourFeatureHtmlDown +=
                                        `<h5 class="mb-3"><i class="` + ourFeatureJsonDecode
                                        .icon + ` text-primary me-3"></i>` +
                                        ourFeatureJsonDecode.title + `</h5>`;
                                }
                            }
                        }
                    }

                    if (respon.contact) {
                        let contact = respon.contact;
                        contact_telepon += contact.telepon;
                    }


                    if (respon.data !== '') {
                        let data = respon.data;
                        aboutHtml += `<div class="col-lg-7">` +
                            `<div class="section-title position-relative pb-3 mb-5">` +
                            `<h5 class="fw-bold text-primary text-uppercase">About Us</h5>` +
                            `<h1 class="mb-0">` + data.title + `</h1>` +
                            `</div>` +
                            `<p class="mb-4">` + data.deskripsi + `</p>` +
                            `<div class="row g-0 mb-3">` +
                            `<div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">` +
                            ourFeatureHtmlUp +
                            `</div>` +
                            `<div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">` +
                            ourFeatureHtmlDown +
                            `</div>` +
                            `</div>` +
                            `<div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">` +
                            `<div class="bg-primary d-flex align-items-center justify-content-center rounded"` +
                            `style="width: 60px; height: 60px;">` +
                            `<i class="fa fa-phone-alt text-white"></i>` +
                            `</div>` +
                            `<div class="ps-4">` +
                            `<h5 class="mb-2">Call to ask any question</h5>` +
                            `<h4 class="text-primary mb-0">` + contact_telepon + `</h4>` +
                            `</div>` +
                            `</div>` +
                            `<a href="{{ route('web.free_qoute') }}" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request` +
                            `A Quote</a>` +
                            `</div>` +
                            `<div class="col-lg-5" style="min-height: 500px;">` +
                            `<div class="position-relative h-100">` +
                            `<img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"` +
                            `src="` + (respon.path + data.image) + `" style="object-fit: cover;">` +
                            `</div>` +
                            `</div>`;
                    }
                    $('#aboutSection').html(
                        aboutHtml
                    )
                    console.log()
                },
                error: function(error) {
                    console.error("Error in inner AJAX call:", error);
                }
            });

            //Service
            $.ajax({
                type: "GET",
                url: "{{ route('web.getService') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let serviceHtml = ''

                    for (let i = 0; i < respon.data.length; i++) {
                        const data = respon.data[i];

                        let serviceJsonDecode = JSON.parse(data.value);
                        if ((serviceJsonDecode.icon !== null) || (serviceJsonDecode.title !== null) || (
                                serviceJsonDecode.body !== null)) {
                            serviceHtml +=
                                `<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">` +
                                `<div ` +
                                `class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">` +
                                `<div class="service-icon">` +
                                `<i class="` + serviceJsonDecode.icon + ` text-white"></i>` +
                                `</div>` +
                                `<h4 class="mb-3">` + serviceJsonDecode.title + `</h4>` +
                                `<p class="m-0">` + serviceJsonDecode.body +
                                `</p>` +
                                `<a class="btn btn-lg btn-primary rounded" href="{{ route('web.service') }}">` +
                                `<i class="bi bi-arrow-right"></i>` +
                                `</a>` +
                                `</div>` +
                                `</div>`;
                        }
                        new WOW().init();
                    }
                    if (respon.freeqoute) {
                        let freeqoute = respon.freeqoute;
                        let contact = respon.contact;
                        serviceHtml +=
                        `<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">`+
                            `<div`+
                                ` class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">`+
                                `<h3 class="text-white mb-3">Telepon untuk Penawaran</h3>`+
                                `<p class="text-white mb-3">`+freeqoute.deskripsi+`</p>`+
                                `<h2 class="text-white mb-0">`+contact.telepon+`</h2>`+
                            `</div>`+
                        `</div>`;
                    }
                    $('#serviceSection').html(
                        serviceHtml
                    )
                    if (respon.title !== null) {
                        $('#serviceTitleSection').text(
                            respon.title
                        )
                    }
                }
            });

            // Testimonial
            $.ajax({
                type: "GET",
                url: "{{ route('web.getTestimonial') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let testimonialHtml = ''

                    for (let i = 0; i < respon.data.length; i++) {
                        const data = respon.data[i];

                        if ((data.nama !== null) || (
                                data.keterangan !== null)) {
                            testimonialHtml +=
                                `<div class="testimonial-item bg-light my-4">` +
                                `<div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">` +
                                `<img class="img-fluid rounded" src="` + (respon.path + data.img_url) +
                                `"` +
                                `style="width: 60px; height: 60px;">` +
                                `<div class="ps-4">` +
                                `<h4 class="text-primary mb-1">` + data.nama + `</h4>` +
                                `<small class="text-uppercase">__________</small>` +
                                `</div>` +
                                `</div>` +
                                `<div class="pt-4 pb-5 px-5">` +
                                data.keterangan +
                                `</div>` +
                                `</div>`;
                        }
                    }
                    $('#testimonialSection').html(
                        testimonialHtml
                    )
                    if (respon.title !== null) {
                        $('#testimonialTitleSection').text(
                            respon.title
                        )
                    }
                    // Destroy the Owl Carousel instance if it exists
                    $("#testimonialSection").owlCarousel('destroy');

                    // Reinitialize the Owl Carousel
                    $("#testimonialSection").owlCarousel({
                        autoplay: true,
                        smartSpeed: 1500,
                        dots: true,
                        loop: true,
                        center: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            576: {
                                items: 1
                            },
                            768: {
                                items: 2
                            },
                            992: {
                                items: 3
                            }
                        }
                    });

                }
            });

            // OurFeature
            $.ajax({
                type: "GET",
                url: "{{ route('web.getOurFeature') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let ourFeatureHtmlUp = ''
                    let ourFeatureHtmlDown = ''
                    let ourFeatureHtmlImg = ''
                    let title = ''

                    for (let i = 0; i < respon.data.length; i++) {
                        const data = respon.data[i];

                        if (data.name === 'our_feature_0' || data.name === 'our_feature_1') {
                            let ourFeatureJsonDecode = JSON.parse(data.value);
                            ourFeatureHtmlUp +=
                                `<div class="col-12 wow zoomIn" data-wow-delay="0.2s">` +
                                `<div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"` +
                                `style="width: 60px; height: 60px;">` +
                                `<i class="` + ourFeatureJsonDecode.icon + ` text-white"></i>` +
                                `</div>` +
                                `<h4>` + ourFeatureJsonDecode.title + `</h4>` +
                                `<p class="mb-0">` + ourFeatureJsonDecode.body + `</p>` +
                                `</div>`;
                        } else if (data.name === 'our_feature_2' || data.name === 'our_feature_3') {
                            let ourFeatureJsonDecode = JSON.parse(data.value);
                            ourFeatureHtmlDown +=
                                `<div class="col-12 wow zoomIn" data-wow-delay="0.4s">` +
                                `<div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3"` +
                                `style="width: 60px; height: 60px;">` +
                                `<i class="` + ourFeatureJsonDecode.icon + ` text-white"></i>` +
                                `</div>` +
                                `<h4>` + ourFeatureJsonDecode.title + `</h4>` +
                                `<p class="mb-0">` + ourFeatureJsonDecode.body + `</p>` +
                                `</div>`;
                        } else if (data.name === 'image') {
                            ourFeatureHtmlImg +=
                                `<img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s"` +
                                `src="` + (data.value ? (respon.path +
                                        data.value) :
                                    "{{ img_src('1-1 480.webp', 'default') }}") +
                                `" style="object-fit: cover;">`;
                        } else if (data.val === 'title') {
                            title += data.value;

                        }
                    }
                    $('#ourFeatureSection').html(
                        `<div class="col-lg-4">` +
                        `<div class="row g-5">` +
                        ourFeatureHtmlUp +
                        `</div>` +
                        `</div>` +
                        `<div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">` +
                        `<div class="position-relative h-100">` +
                        ourFeatureHtmlImg +
                        `</div>` +
                        `</div>` +
                        `<div class="col-lg-4">` +
                        `<div class="row g-5">` +
                        ourFeatureHtmlDown +
                        `</div>` +
                        `</div>`
                    )
                    if (title !== null) {
                        $('#ourFeatureTitleSection').text(
                            title
                        )
                    }
                }
            });

            //FreeQoute
            $.ajax({
                type: "GET",
                url: "{{ route('web.getFreeQoute') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let aboutHtml = ''
                    if (respon.contact != '') {
                        let contact = respon.contact;
                        $('#teleponFreeQoute').text(
                            contact.telepon
                        )
                    }

                    if (respon.ourfeature != '') {
                        let ourFeatureHtmlUp = ''
                        for (let i = 0; i < respon.ourfeature.length; i++) {
                            const ourfeature = respon.ourfeature[i];

                            if (ourfeature.name === 'our_feature_0' || ourfeature.name ===
                                'our_feature_1') {
                                let ourFeatureJsonDecode = JSON.parse(ourfeature.value);
                                if ((ourFeatureJsonDecode.title !== null) || (ourFeatureJsonDecode
                                        .icon !== null)) {
                                    ourFeatureHtmlUp +=
                                        `<div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">` +
                                        `<h5 class="mb-4"><i class="` + ourFeatureJsonDecode
                                        .icon + ` text-primary me-3"></i>` + ourFeatureJsonDecode
                                        .title +
                                        `</h5>` +
                                        `</div>`;
                                }
                            }
                        }
                        $('#featureFreeQouteSection').html(
                            ourFeatureHtmlUp
                        )
                    }

                    if (respon.data !== '') {
                        let data = respon.data;
                        $('#titleFreeQoute').text(
                            data.title
                        )
                        $('#deskripsiFreeQoute').text(
                            data.deskripsi
                        )
                    }
                }
            });

            // Team
            $.ajax({
                type: "GET",
                url: "{{ route('web.getTeam') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let teamHtml = ''

                    for (let i = 0; i < respon.data.length; i++) {
                        const data = respon.data[i];

                        let sosialMedia = ''
                        for (let z = 0; z < data.sosial_media.length; z++) {
                            const sosmed = data.sosial_media[z];

                            sosialMedia +=
                                `<a class="btn btn-lg btn-primary btn-lg-square rounded" href="` +
                                sosmed.url + `"><i ` +
                                `class="fab fa-` + sosmed.nama + ` fw-normal"></i></a>`;
                        }

                        teamHtml +=
                            `<div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">` +
                            `<div class="team-item bg-light rounded overflow-hidden">` +
                            `<div class="team-img position-relative overflow-hidden">` +
                            `<img class="img-fluid w-100" src="` + (respon.path + data.img_url) +
                            `" alt="">` +
                            `<div class="team-social">` +
                            sosialMedia +
                            `</div>` +
                            `</div>` +
                            `<div class="text-center py-4">` +
                            `<h4 class="text-primary">` + data.nama + `</h4>` +
                            `<p class="text-uppercase m-0">` + data.jabatan + `</p>` +
                            `</div>` +
                            `</div>` +
                            `</div>`;
                    }
                    $('#teamSection').html(
                        teamHtml
                    )
                }
            });

            function formatDate(inputDate) {
                const months = [
                    "Jan", "Feb", "Mar", "Apr",
                    "May", "Jun", "Jul", "Aug",
                    "Sep", "Oct", "Nov", "Dec"
                ];

                const parts = inputDate.split("-");
                const year = parts[0];
                const month = months[parseInt(parts[1]) - 1];
                const day = parts[2];

                return `${day} ${month}, ${year}`;
            }

            // Blog
            $.ajax({
                type: "GET",
                url: "{{ route('web.getBlog') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "GET",
                },
                success: function(respon) {
                    let blogHtml = '';

                    for (let i = 0; i < respon.data.length; i++) {
                        const data = respon.data[i];
                        let imgJsonDecode = JSON.parse(data.img_url);

                        // Assuming data.isi contains the text with HTML tags
                        let contentWithHTML = data.isi;

                        // Remove HTML tags
                        let contentWithoutHTML = contentWithHTML.replace(/<\/?[^>]+(>|$)/g, '');

                        // Limit the content to 200 characters
                        const maxLength = 200;
                        let truncatedContent = contentWithoutHTML.length > maxLength ?
                            contentWithoutHTML.substring(0, maxLength) + '...' :
                            contentWithoutHTML;

                        blogHtml +=
                            `<div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">` +
                            `<div class="blog-item bg-light rounded overflow-hidden">` +
                            `<div class="blog-img position-relative overflow-hidden">` +
                            `<img class="img-fluid" src="` + (respon.path + imgJsonDecode[0]) +
                            `" alt="">` +
                            `<a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4"` +
                            `href="">` + data.tags[0].kategori.nama + `</a>` +
                            `</div>` +
                            `<div class="p-4">` +
                            `<div class="d-flex mb-3">` +
                            `<small><i class="far fa-calendar-alt text-primary me-2"></i>` + formatDate(
                                data.tanggal_posting) + `</small>` +
                            `</div>` +
                            `<h4 class="mb-3">` + data.judul + `</h4>` +
                            `<p>` + truncatedContent +
                            `</p> <a class="text-uppercase" href="{{ route('web.blog') }}">Read More <i class="bi bi-arrow-right"></i></a>` +
                            `</div>` +
                            `</div>` +
                            `</div>`;
                    }

                    // Move this line inside the success callback
                    $('#blogSection').html(blogHtml);

                }
            });

        });
    </script>
@endpush
