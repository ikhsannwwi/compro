@extends('administrator.layouts.main')

@section('content')
    @push('section_header')
        <h1>Our Feature</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.our_feature') }}">Our Feature</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    @endpush
    @push('section_title')
        Our Feature
    @endpush
    <!-- Basic Tables start -->
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('admin.our_feature.update') }}" method="post" enctype="multipart/form-data"
                    class="form" id="form" data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="inputSubTitle"
                                    class="form-label">Sub Title</label>
                                <input type="text" id="inputSubTitle" data-parsley-required="true"
                                    class="form-control" placeholder="Masukan Sub Title"
                                    value="{{ array_key_exists('sub_title', $our_feature) ? $our_feature['sub_title'] : '' }}"
                                    name="sub_title" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="inputTitle"
                                    class="form-label">Title</label>
                                <input type="text" id="inputTitle" data-parsley-required="true"
                                    class="form-control" placeholder="Masukan Title"
                                    value="{{ array_key_exists('title', $our_feature) ? $our_feature['title'] : '' }}"
                                    name="title" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="inputImage" class="form-label">Image</label>
                                <div class="row">
                                    <div class="col-8" style="padding-right: 0;">
                                        <!-- Menggunakan col-8 agar input lebih lebar dan menghapus padding kanan -->
                                        <input type="text" name="image" class="form-control" value="{{ array_key_exists('image', $our_feature) ? $our_feature['image'] : '' }}" id="inputImage" readonly>
                                    </div>
                                    <div class="col-4" style="padding-left: 0;">
                                        <!-- Menggunakan col-4 agar tombol "Search" lebih kecil dan menghapus padding kiri -->
                                        <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalGallery">
                                            Search
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="accordion">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse"
                                    data-target="#our_feature-accordion-{{ $i }}"
                                    aria-expanded="{{ $i == 0 ? 'true' : 'false' }}">
                                    <h4>Our Feature {{ $i + 1 }}</h4>
                                </div>
                                <div class="accordion-body collapse {{ $i == 0 ? 'show' : '' }}"
                                    id="our_feature-accordion-{{ $i }}" data-parent="#accordion">
                                    <input type="hidden" name="id_{{ $i }}" id="inputId_{{ $i }}">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="inputIcon_{{ $i }}"
                                                    class="form-label">Icon</label>
                                                <input type="text" id="inputIcon_{{ $i }}"
                                                    class="form-control" placeholder="Masukan Icon"
                                                    value="{{ array_key_exists('our_feature_' . $i, $our_feature) ? json_decode($our_feature['our_feature_' . $i])->icon : '' }}"
                                                    name="icon_{{ $i }}" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group mandatory">
                                                <label for="inputTitle_{{ $i }}"
                                                    class="form-label">Title</label>
                                                <input type="text" id="inputTitle_{{ $i }}"
                                                    class="form-control" placeholder="Masukan Title"
                                                    value="{{ array_key_exists('our_feature_' . $i, $our_feature) ? json_decode($our_feature['our_feature_' . $i])->title : '' }}"
                                                    name="title_{{ $i }}" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mandatory">
                                                <label for="inputBody_{{ $i }}" class="form-label">Body</label>
                                                <textarea name="body_{{ $i }}" id="inputBody_{{ $i }}" class="form-control"
                                                    placeholder="Masukan Body" autocomplete="off">{{ array_key_exists('our_feature_' . $i, $our_feature) ? json_decode($our_feature['our_feature_' . $i])->body : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" id="formSubmit" class="btn btn-primary me-1 mb-1">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress" style="display: none;">
                                    Tunggu Sebentar...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <button type="reset" class="btn btn-secondary mx-2 mb-1">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('administrator.our_feature.modal.main')

    <!-- Basic Tables end -->
@endsection
@push('css')
    <link rel="stylesheet" href="{{ template_stisla('modules/magnific-popup/magnific-popup.css') }}" type="text/css">
@endpush

@push('js')
    <!-- Tambahkan FileInput JavaScript -->
    <script src="{{ template_stisla('modules/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    {{-- <script src="{{ asset('templateAdmin/assets/extensions/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('templateAdmin/assets/js/pages/parsley.js') }}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {

            $('.window-popup').magnificPopup({
                type: 'iframe'
            });

            //validate parsley form
            const form = document.getElementById("form");
            const validator = $(form).parsley();

            const submitButton = document.getElementById("formSubmit");

            // form.addEventListener('keydown', function(e) {
            //     if (e.key === 'Enter') {
            //         e.preventDefault();
            //     }
            // });

            submitButton.addEventListener("click", async function(e) {
                e.preventDefault();
                indicatorBlock();

                // Validate the form using Parsley
                if ($(form).parsley().validate()) {
                    indicatorSubmit();
                    form.submit();
                } else {
                    // Handle validation errors
                    const validationErrors = [];
                    $(form).find(':input').each(function() {
                        const field = $(this);
                        if (!field.parsley().isValid()) {
                            indicatorNone();
                            const attrName = field.attr('name');
                            const errorMessage = field.parsley().getErrorsMessages().join(
                                ', ');
                            validationErrors.push(attrName + ': ' + errorMessage);
                        }
                    });
                    console.log("Validation errors:", validationErrors.join('\n'));
                }
            });


            function indicatorSubmit() {
                submitButton.querySelector('.indicator-label').style.display =
                    'inline-block';
                submitButton.querySelector('.indicator-progress').style.display =
                    'none';
            }

            function indicatorNone() {
                submitButton.querySelector('.indicator-label').style.display =
                    'inline-block';
                submitButton.querySelector('.indicator-progress').style.display =
                    'none';
                submitButton.disabled = false;
            }

            function indicatorBlock() {
                // Disable the submit button and show the "Please wait..." message
                submitButton.disabled = true;
                submitButton.querySelector('.indicator-label').style.display = 'none';
                submitButton.querySelector('.indicator-progress').style.display =
                    'inline-block';
            }

        });
    </script>
@endpush
