@extends('front.layouts.main')

@push('title')
    Our Feature
@endpush

@section('meta')
    <meta name="description" content="This is Our Feature page">
    <meta name="keywords" content="our feature">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Our Feature">
    <meta property="og:description" content="This is Our Feature page">
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
                <h1 class="display-4 text-white animated zoomIn">Features</h1>
                <a href="{{route('web.index')}}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-main">Features</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-main text-uppercase">Why Choose Us</h5>
                <h1 class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
            </div>
            <div class="row g-5" id="ourFeatureSection">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-main rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>Best In Industry</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="bg-main rounded d-flex align-items-center justify-content-center mb-3"
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
                            <div class="bg-main rounded d-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="fa fa-users-cog text-white"></i>
                            </div>
                            <h4>Professional Staff</h4>
                            <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="bg-main rounded d-flex align-items-center justify-content-center mb-3"
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
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function(){
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
                                `<div class="bg-main rounded d-flex align-items-center justify-content-center mb-3"` +
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
                                `<div class="bg-main rounded d-flex align-items-center justify-content-center mb-3"` +
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
        });
    </script>
@endpush
