@extends('front.layouts.main')

@push('title')
    Service
@endpush

@section('meta')
    <meta name="description" content="This is Service page">
    <meta name="keywords" content="service">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Service">
    <meta property="og:description" content="This is Service page">
    <meta property="og:image" content="URL to Your Image">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Judul Halaman Anda">
    <meta name="twitter:description" content="Deskripsi singkat konten halaman Anda.">
    <meta name="twitter:image" content="URL gambar terkait konten Anda">
@endsection

@push('head')
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Services</h1>
                <a href="{{route('web.index')}}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-primary">Services</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
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
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
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
        });
    </script>
@endpush
