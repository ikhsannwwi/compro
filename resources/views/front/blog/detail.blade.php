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
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Blog</h1>
                <a href="{{ route('web.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ route('web.blog') }}" class="h5 text-white">Blog</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-primary">{{ $data->judul }}</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <!-- Blog Start -->
    @php
        $imgParse = json_decode($data->img_url);
    @endphp
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        {{-- <img class="img-fluid w-100 rounded mb-5" src="{{ img_src($imgParse[0], 'blog') }}" alt=""> --}}
                        <div id="image" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($imgParse as $key => $item)
                                    <li data-target="#image" data-slide-to="{{ $key }}"
                                        @if ($key === 0) class="active" @endif></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($imgParse as $key => $item)
                                    <div class="carousel-item @if ($key === 0) active @endif ">
                                        <img class="d-block w-100" src="{{ img_src($item, 'blog') }}" alt="First slide">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#image" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#image" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <h1 class="mb-4">{{ $data->judul }}</h1>
                        {!! $data->isi !!}
                    </div>
                    <!-- Blog Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0"><span id="countComment">{{ count($data->komentar_blog) + count($data->komentar_blog_reply) }}</span>
                                Comments</h3>
                        </div>
                        <div id="sectionCommentHtml">
                            @foreach ($comment as $row)
                            <div class="comment-section">
                                <div class="d-flex mb-4">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar{{ mt_rand(1, 8) }}.png"
                                        class="img-fluid rounded" style="width: 45px; height: 45px;">
                                    <div class="ps-3">
                                        <h6><a href="">Anonymous</a>
                                            <small><i>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</i></small>
                                        </h6>
                                        <p>{{ $row->isi }}</p>
                                        <button class="btn btn-sm btn-light triggerReplay">Reply</button>
                                        <div class="panel sectionReply d-none">
                                            <div class="panel-body">
                                                <textarea class="form-control" rows="2" placeholder="What are you thinking?"></textarea>
                                                <div class="mt-2 clearfix">
                                                    <a href="javascript:void(0)"
                                                        data-id="{{ $row->id }}"
                                                        class="btn btn-sm btn-light triggerCommentReply"><i class="fas fa-pencil-alt"></i>
                                                        Share</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($row->reply as $item)
                                    <div class="d-flex ms-5 mb-4">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar{{ mt_rand(1, 8) }}.png"
                                            class="img-fluid rounded" style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6><a href="">Anonymous</a>
                                                <small><i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</i></small>
                                            </h6>
                                            <p>{{ $item->isi }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Leave A Comment</h3>
                        </div>
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment" name="comment" id="inputComment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" id="triggerSubmitCommment">Leave Your Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
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
                        $imgRandomPost = json_decode($random->img_url);
                    @endphp
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="{{ img_src($imgRandomPost[0], 'blog') }}" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
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
            $('#triggerSubmitCommment').on('click', function(e) {
                e.preventDefault();

                var submitButton = $(this);

                if ($('#inputComment').val() != '') {
                    // Disable the submit button and show loading state
                    submitButton.prop('disabled', true).text('Submitting...');

                    $.ajax({
                        type: "POST",
                        url: "{{ route('web.blog.slug.comment', $data->slug) }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "POST",
                            "comment": $('#inputComment').val(),
                        },
                        success: function(respon) {
                            // Enable the submit button and restore its original text
                            submitButton.prop('disabled', false).text('Submit');
                            $('#countComment').text(respon.count);

                            $.ajax({
                                url: "{{ route('web.blog.fetchData.comment') }}",
                                data: {
                                    slug: "{{ $data->slug }}"
                                },
                                success: function(data) {
                                    $('#sectionCommentHtml').html(data);
                                    $('#inputComment').val('')
                                },
                            });
                        }
                    });
                }
            })

            $('.triggerCommentReply').on('click', function(e) {
                e.preventDefault();

                var comment_id = $(this).data('id');

                // Find the closest comment section
                var commentSection = $(this).closest('.comment-section');

                // Find the textarea within the comment section
                var textarea = commentSection.find('.sectionReply textarea');

                // Your code to handle the reply
                if (textarea.val() != '') {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('web.blog.slug.comment.reply', $data->slug) }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "POST",
                            "comment": textarea.val(),
                            komentar_id: comment_id
                        },
                        success: function(respon) {
                            $('#countComment').text(respon.count);
                            $.ajax({
                                url: "{{ route('web.blog.fetchData.comment') }}",
                                data: {
                                    slug: "{{ $data->slug }}",
                                },
                                success: function(data) {
                                    $('#sectionCommentHtml').html(data);
                                    textarea.val('');
                                },
                            });
                        }
                    });
                }
            });

            $('.triggerReplay').on('click', function() {
                var sectionReply = $(this).closest('.comment-section').find('.sectionReply');
                if (sectionReply.hasClass('d-none')) {
                    sectionReply.removeClass('d-none');
                } else {
                    sectionReply.addClass('d-none');
                }
            });
        });
    </script>
@endpush

@push('css')
    <style>
        .img-sm {
            width: 46px;
            height: 46px;
        }

        .panel {
            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
            border-radius: 0;
            border: 0;
            margin-bottom: 15px;
        }

        .panel .panel-footer,
        .panel>:last-child {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }

        .panel .panel-heading,
        .panel>:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .panel-body {
            padding: 20px 15px;
        }


        .media-block .media-left {
            display: block;
            float: left
        }

        .media-block .media-right {
            float: right
        }

        .media-block .media-body {
            display: block;
            overflow: hidden;
            width: auto
        }

        .middle .media-left,
        .middle .media-right,
        .middle .media-body {
            vertical-align: middle
        }
    </style>
@endpush