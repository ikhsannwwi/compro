@extends('front.layouts.main')

@push('title')
    About
@endpush

@section('meta')
    <meta name="description" content="This is About page">
    <meta name="keywords" content="about">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="About">
    <meta property="og:description" content="This is About page">
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
                <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                <a href="{{route('web.index')}}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-primary">About</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
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
                            src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
                <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>
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
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
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
        });
    </script>
@endpush
