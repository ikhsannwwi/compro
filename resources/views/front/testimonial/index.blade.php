@extends('front.layouts.main')

@push('title')
    Testimonial
@endpush

@section('meta')
    <meta name="description" content="This is Testimonial page">
    <meta name="keywords" content="testimonial">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Testimonial">
    <meta property="og:description" content="This is Testimonial page">
    <meta property="og:image" content="URL to Your Image">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Judul Halaman Anda">
    <meta name="twitter:description" content="Deskripsi singkat konten halaman Anda.">
    <meta name="twitter:image" content="URL gambar terkait konten Anda">
@endsection

@push('head')
    <div class="container-fluid bg-main py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Testimonial</h1>
                <a href="{{route('web.index')}}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-main">Testimonial</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-main text-uppercase">Testimonial</h5>
                <h1 class="mb-0" id="testimonialTitleSection">Capturing the Essence of Exceptional Experiences.
                </h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s" id="testimonialSection">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="{{ img_src('1-1 360.webp', 'default') }}"
                            style="width: 60px; height: 60px;">
                        <div class="ps-4">
                            <h4 class="text-main mb-1">Lorem ipsum</h4>
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
                            <h4 class="text-main mb-1">Lorem ipsum</h4>
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
                            <h4 class="text-main mb-1">Lorem ipsum</h4>
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
                            <h4 class="text-main mb-1">Lorem ipsum</h4>
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
                                `<h4 class="text-main mb-1">` + data.nama + `</h4>` +
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