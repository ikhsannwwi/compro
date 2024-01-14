@extends('administrator.layouts.main')

@section('content')
    @push('section_header')
        <h1>Settings</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.settings') }}">Settings</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.settings.frontpage') }}">Frontpage</a></div>
            <div class="breadcrumb-item">Color</div>
        </div>
    @endpush
    @push('section_title')
        Manage Color
    @endpush
    <!-- Basic Tables start -->
    

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('admin.settings.frontpage.color.update') }}" method="post"
                    enctype="multipart/form-data" class="form" id="form" data-parsley-validate>
                    @csrf
                    @method('PUT')

                    
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="primary-color" class="form-label">primary-color</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" class="form-control" name="frontpage_primary_color"
                                        value="{{ array_key_exists('frontpage_primary_color', $settings) ? $settings['frontpage_primary_color'] : '' }}"
                                        id="primary-color" placeholder="Masukan Kode Warna" autocomplete="off">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-fill-drip"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="secondary-color" class="form-label">secondary-color</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" class="form-control" name="frontpage_secondary_color"
                                        value="{{ array_key_exists('frontpage_secondary_color', $settings) ? $settings['frontpage_secondary_color'] : '' }}"
                                        id="secondary-color" placeholder="Masukan Kode Warna" autocomplete="off">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-fill-drip"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="light-color" class="form-label">light-color</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" class="form-control" name="frontpage_light_color"
                                        value="{{ array_key_exists('frontpage_light_color', $settings) ? $settings['frontpage_light_color'] : '' }}"
                                        id="light-color" placeholder="Masukan Kode Warna" autocomplete="off">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-fill-drip"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="dark-color" class="form-label">dark-color</label>
                                <div class="input-group colorpickerinput">
                                    <input type="text" class="form-control" name="frontpage_dark_color"
                                        value="{{ array_key_exists('frontpage_dark_color', $settings) ? $settings['frontpage_dark_color'] : '' }}"
                                        id="dark-color" placeholder="Masukan Kode Warna" autocomplete="off">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-fill-drip"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" id="formSubmit" class="btn btn-primary mx-1 mb-1">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress" style="display: none;">
                                    Tunggu Sebentar...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <button type="reset" class="btn btn-secondary mx-1 mb-1">Reset</button>
                            <a href="{{ route('admin.settings.frontpage') }}" class="btn btn-danger mx-1 mb-1">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Basic Tables end -->
@endsection

@push('css')
    <link rel="stylesheet"
        href="{{ template_stisla('modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
@endpush
@push('js')
    <script src="{{ template_stisla('modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tambahkan FileInput JavaScript -->
    <script type="text/javascript">
        $(document).ready(function() {

            $(".colorpickerinput").colorpicker({
                format: 'hex',
                component: '.input-group-append',
            });

            //validate parsley form
            const form = document.getElementById("form");
            const validator = $(form).parsley();

            const submitButton = document.getElementById("formSubmit");

            submitButton.addEventListener("click", async function(e) {
                e.preventDefault();
                indicatorBlock();

                // Validate the form using Parsley
                if ($(form).parsley().validate()) {
                    indicatorSubmit();

                    // Submit the form
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
