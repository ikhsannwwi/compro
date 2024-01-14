@extends('front.layouts.main')

@push('title')
    Free Qoute
@endpush

@section('meta')
    <meta name="description" content="This is Free Qoute page">
    <meta name="keywords" content="free qoute">
    <meta name="author" content="Mochammad Ikhsan Nawawi">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Free Qoute">
    <meta property="og:description" content="This is Free Qoute page">
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
                <h1 class="display-4 text-white animated zoomIn">Free Quote</h1>
                <a href="{{ route('web.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="javscript:void(0)" class="h5 text-main">Free Quote</a>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-main text-uppercase">Request A Quote</h5>
                        <h1 class="mb-0" id="titleFreeQoute">Class aptent taciti sociosqu ad litora torquent per conubia
                            nostra, per inceptos himenaeos. Ut lobortis aliquam consequat.</h1>
                    </div>
                    <div class="row gx-3" id="featureFreeQouteSection">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="fa fa-reply text-main me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-4"><i class="fa fa-phone-alt text-main me-3"></i>Lorem ipsum dolor sit amet
                            </h5>
                        </div>
                    </div>
                    <p class="mb-4" id="deskripsiFreeQoute">Vestibulum lobortis viverra lorem non maximus. Interdum et
                        malesuada fames ac ante
                        ipsum primis in faucibus. Curabitur vestibulum sapien quis cursus vestibulum. Mauris volutpat, magna
                        finibus viverra scelerisque, felis arcu pretium augue, maximus sollicitudin elit augue quis augue.
                    </p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-main d-flex align-items-center justify-content-center rounded"
                            style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-main mb-0" id="teleponFreeQoute">+012 345 6789</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-main rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form>
                            <div class="col-lg-7" id="form-messages">
                                <!-- Tempat untuk menampilkan pesan berhasil atau gagal -->
                            </div>
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" class="form-control bg-light border-0" name="nama"
                                        autocomplete="off" id="inputNama" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" name="email"
                                        autocomplete="off" id="inputEmail" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12" id="optionSendMessageForm">
                                    <select class="form-select bg-light border-0" name="service" id="inputService"
                                        style="height: 55px;">
                                        <option selected>Select A Service</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="3" placeholder="Message" id="inputMessage" name="message"
                                        autocomplete="off"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" id="triggerSubmitFormSendMessage">Request A
                                        Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
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
                                        .icon + ` text-main me-3"></i>` + ourFeatureJsonDecode
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

                    if (respon.service != '') {
                        let serviceHtml = ''

                        for (let i = 0; i < respon.service.length; i++) {
                            const service = respon.service[i];

                            let serviceJsonDecode = JSON.parse(service.value);
                            if ((serviceJsonDecode.icon !== null) || (serviceJsonDecode.title !==
                                    null) || (
                                    serviceJsonDecode.body !== null)) {
                                serviceHtml +=
                                    `<option value="` + serviceJsonDecode.title + `">` +
                                    serviceJsonDecode.title + `</option>`
                            }
                        }

                        $('#optionSendMessageForm').html(
                            `<select class="form-select bg-light border-0" name="service" id="inputService" style="height: 55px;">` +
                            `<option value="" selected>Select A Service</option>` +
                            serviceHtml +
                            `</select>`
                        );
                    }
                }
            });

            $('#triggerSubmitFormSendMessage').on('click', function(e) {
                e.preventDefault();

                let submitButton = $(this);
                let originalText = submitButton.text();
                submitButton.prop('disabled', true).text('submiting...');

                $("#form-messages").empty();

                let inputs = ['#inputMessage', '#inputNama', '#inputEmail', '#inputService'];

                inputs.forEach(function(input) {
                    $(input).prop('readonly', true);
                });

                let areInputsValid = inputs.every(function(input) {
                    return $(input).val().trim() !== '';
                });

                if (areInputsValid) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('web.free_qoute.serverside.sendMessage') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "POST",
                            nama: $('#inputNama').val(),
                            email: $('#inputEmail').val(),
                            service: $('#inputService').val(),
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
