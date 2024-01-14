@extends('front.layouts.main')

@push('title')
    Blog
@endpush

@section('meta')
    <meta name="description" content="This is Blog page">
    <meta name="keywords" content="blog">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Blog">
    <meta property="og:description" content="This is Blog page">
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
                <h1 class="display-4 text-white animated zoomIn">Blog</h1>
                <a href="{{ route('web.index') }}" class="h5 text-white">Home</a>
                @if (!Route::is('web.blog'))
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{route('web.blog')}}" class="h5 text-white">Blog</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-main">{{$kategoriSlug->nama}}</a>
                @else
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-main">Blog</a>
                @endif
            </div>
        </div>
    </div>
@endpush

@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8" id="blogSection">
                    <div class="row g-5">
                        @foreach ($data as $row)
                            @php
                                $jsonParse = json_decode($row->img_url);
                            @endphp
                            <div class="col-md-6" data-wow-delay="0.1s">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        <img class="img-fluid" src="{{ img_src($jsonParse[0], 'blog') }}" alt="">
                                        @if (Route::is('web.blog'))
                                        <a class="position-absolute top-0 start-0 bg-main text-white rounded-end mt-5 py-2 px-4"
                                            href="">{{ $row->tags[0]->kategori->nama }}</a>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3"><i
                                                    class="far fa-user text-main me-2"></i>{{ $row->user->name }}</small>
                                            <small><i
                                                    class="far fa-calendar-alt text-main me-2"></i>{{ date('d F, Y', strtotime($row->tanggal_posting)) }}</small>
                                        </div>
                                        <h4 class="mb-3">{{ $row->judul }}</h4>
                                        <p>{{ Str::limit(strip_tags($row->isi), 100) }}</p>
                                        <a class="text-uppercase" href="{{ route('web.blog.slug', $row->slug) }}">Read More
                                            <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-12" data-wow-delay="0.1s">
                            {{ $data->links('front.layouts.pagination.index') }}
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-main px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Categories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            @foreach ($kategori as $row)
                                <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                    href="{{ route('web.blog.kategori', $row->slug) }}"><i
                                        class="bi bi-arrow-right me-2"></i>{{ $row->nama }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Post</h3>
                        </div>
                        @foreach ($recent_post as $row)
                            @php
                                $jsonParse = json_decode($row->img_url);
                            @endphp
                            <div class="d-flex rounded overflow-hidden mb-3">
                                <img class="img-fluid" src="{{ img_src($jsonParse[0], 'blog') }}"
                                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href="{{ route('web.blog.slug', $row->slug) }}"
                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                    {{ $row->judul }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Recent Post End -->

                    <!-- Image Start -->
                    @php
                        $imgRandomPost = $random ? json_decode($random->img_url) : [0=>''];
                    @endphp
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="{{ img_src($imgRandomPost[0], 'blog') }}" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->

                    {{-- <!-- Tags Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Tag Cloud</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                            <a href="" class="btn btn-light m-1">Consulting</a>
                            <a href="" class="btn btn-light m-1">Design</a>
                            <a href="" class="btn btn-light m-1">Development</a>
                            <a href="" class="btn btn-light m-1">Marketing</a>
                            <a href="" class="btn btn-light m-1">SEO</a>
                            <a href="" class="btn btn-light m-1">Writing</a>
                            <a href="" class="btn btn-light m-1">Consulting</a>
                        </div>
                    </div>
                    <!-- Tags End -->

                    <!-- Plain Text Start -->
                    <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Plain Text</h3>
                        </div>
                        <div class="bg-light text-center" style="padding: 30px;">
                            <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita
                                kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet
                                diam</p>
                            <a href="" class="btn btn-main py-2 px-4">Read More</a>
                        </div>
                    </div>
                    <!-- Plain Text End --> --}}
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.page-item a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "{{ route('web.blog.fetchData') }}?page=" + page,
                    success: function(data) {
                        $('#blogSection').html(data);
                    },
                });
            }
        });
    </script>
@endpush
