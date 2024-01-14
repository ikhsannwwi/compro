@extends('front.layouts.main')

@push('title')
    Contact
@endpush

@section('meta')
    <meta name="description" content="This is Contact page">
    <meta name="keywords" content="contact">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Contact">
    <meta property="og:description" content="This is Contact page">
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
                <h1 class="display-4 text-white animated zoomIn">Contact Us</h1>
                <a href="{{ route('web.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-main">Contact</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-main text-uppercase">Contact Us</h5>
                <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-main d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-main mb-0">
                                {{ array_key_exists('telepon', $contact) ? $contact['telepon'] : '+62 345 6789' }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-main d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Email to get free quote</h5>
                            <h4 class="text-main mb-0">
                                {{ array_key_exists('email', $contact) ? $contact['email'] : 'info@example.com' }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-main d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Visit our office</h5>
                            <h4 class="text-main mb-0">
                                {{ array_key_exists('address', $contact) ? $contact['address'] : '123 Street, Food, Konoha' }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form>
                        <div class="col-lg-7" id="form-messages">
                            <!-- Tempat untuk menampilkan pesan berhasil atau gagal -->
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" name="nama"
                                    autocomplete="off" id="inputNama" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" name="email"
                                    autocomplete="off" id="inputEmail" name="email" id="inputEmail"
                                    placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" name="subject" autocomplete="off"
                                    id="inputSubject" placeholder="Subject" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" name="message" autocomplete="off" id="inputMessage"
                                    placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-main w-100 py-3" type="submit"
                                    id="triggerSubmitFormSendMessage">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    {!! array_key_exists('location', $contact)
                        ? $contact['location']
                        : '<div class="mapouter">
                                            <div class="gmap_canvas"><iframe
                                                    src="https://maps.google.com/maps?q=jl%20cijawura&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                                    frameborder="0" scrolling="no" style="width: 490px; height: 400px;"></iframe>
                                                <style>
                                                    .mapouter {
                                                        position: relative;
                                                        height: 400px;
                                                        width: 490px;
                                                        background: #fff;
                                                    }
                    
                                                    .maprouter a {
                                                        color: #fff !important;
                                                        position: absolute !important;
                                                        top: 0 !important;
                                                        z-index: 0 !important;
                                                    }
                                                </style><a href="https://blooketjoin.org">blooketjoin</a>
                                                <style>
                                                    .gmap_canvas {
                                                        overflow: hidden;
                                                        height: 400px;
                                                        width: 490px
                                                    }
                    
                                                    .gmap_canvas iframe {
                                                        position: relative;
                                                        z-index: 2
                                                    }
                                                </style>
                                            </div>
                                        </div>' !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection


@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#triggerSubmitFormSendMessage').on('click', function(e) {
                e.preventDefault();

                let submitButton = $(this);
                let originalText = submitButton.text();
                submitButton.prop('disabled', true).text('submiting...');

                $("#form-messages").empty();

                let inputs = ['#inputMessage', '#inputNama', '#inputEmail', '#inputSubject'];

                inputs.forEach(function(input) {
                    $(input).prop('readonly', true);
                });

                let areInputsValid = inputs.every(function(input) {
                    return $(input).val().trim() !== '';
                });

                if (areInputsValid) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('web.contact.serverside.sendMessage') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "POST",
                            nama: $('#inputNama').val(),
                            email: $('#inputEmail').val(),
                            subject: $('#inputSubject').val(),
                            message: $('#inputMessage').val(),
                        },
                        success: function(respon) {
                            inputs.forEach(function(input) {
                                $(input).val('');
                            });

                            submitButton.text(originalText).prop('disabled', false);

                            inputs.forEach(function(input) {
                                $(input).prop('readonly', false);
                            });
                            $("#form-messages").html(
                                '<div class="alert alert-success">Formulir berhasil dikirim!</div>'
                            );
                            setTimeout(function() {
                                $("#form-messages").empty();
                            }, 10000);
                        }
                    });
                } else {
                    setTimeout(function() {
                        inputs.forEach(function(input) {
                            $(input).prop('readonly', false);
                        });

                        submitButton.text(originalText).prop('disabled', false);
                        $("#form-messages").html(
                            '<div class="alert alert-danger">Formulir gagal dikirim. Silakan coba lagi!</div>'
                        );
                        setTimeout(function() {
                            $("#form-messages").empty();
                        }, 10000);
                    }, 2000);
                }
            });
        });
    </script>
@endpush
