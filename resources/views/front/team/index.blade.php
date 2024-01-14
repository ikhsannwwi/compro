@extends('front.layouts.main')

@push('title')
    Team
@endpush

@section('meta')
    <meta name="description" content="This is Team page">
    <meta name="keywords" content="team">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Team">
    <meta property="og:description" content="This is Team page">
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
                <h1 class="display-4 text-white animated zoomIn">Team Members</h1>
                <a href="{{route('web.index')}}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-main">Team Members</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-main text-uppercase">Team Members</h5>
                <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>
            </div>
            <div class="row g-5" id="teamSection">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ img_src('1-1 480.webp', 'default') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-main">Lorem ipsum</h4>
                            <p class="text-uppercase m-0">dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ img_src('1-1 480.webp', 'default') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-main">Lorem ipsum</h4>
                            <p class="text-uppercase m-0">dolor sit amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ img_src('1-1 480.webp', 'default') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-main btn-lg-square rounded" href=""><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-main">Lorem ipsum</h4>
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
        $(document).ready(function(){
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
                                `<a class="btn btn-lg btn-main btn-lg-square rounded" href="` +
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
                            `<h4 class="text-main">` + data.nama + `</h4>` +
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