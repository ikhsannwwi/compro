@extends('administrator.layouts.main')

@section('content')
    @push('section_header')
        <h1>Team</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.team') }}">Team</a></div>
            <div class="breadcrumb-item">Edit</div>
        </div>
    @endpush
    @push('section_title')
        Team
    @endpush
    <!-- Basic Tables start -->
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('admin.team.update') }}" method="post" enctype="multipart/form-data" class="form"
                    id="form" data-parsley-validate>
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="inputId" value="{{$data->id}}">

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="inputNama" class="form-label">Nama</label>
                                <input type="text" id="inputNama" class="form-control" placeholder="Masukan Nama" value="{{$data->nama}}"
                                    name="nama" autocomplete="off" data-parsley-required="true">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="inputJabatan" class="form-label">Jabatan</label>
                                <input type="text" id="inputJabatan" class="form-control" placeholder="Masukan Jabatan" value="{{$data->jabatan}}"
                                    name="jabatan" autocomplete="off" data-parsley-required="true">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="gambarLainnyaInputFile" class="form-label">Image</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    
                                    <div class="fileinput-preview-image thumbnail mb20">
                                        <img width="200px"
                                            src="{{ $data->img_url ? img_src($data->img_url, 'team') : '' }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="gambarLainnyaInputFile" class="btn btn-light btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <input type="file" class="d-none" id="gambarLainnyaInputFile" name="img">
                                            <!-- Tambahkan atribut "multiple" di sini -->
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 col-12">
                            <div id="sosmed">

                                <div class="sosmed-list" index-element="{{count($data->sosial_media)}}">
                                    @foreach ($data->sosial_media as $key => $row)
                                    <input type="hidden" name="sosmed[{{$key}}][id]" id="inputIdSosmed_{{$key}}" value="{{$row->id}}">
                                    <div class="row rowSosmed_{{$key}}" index-element="{{$key}}">
                                        <div class="col-md-5 col-11">
                                            <div class="form-group">
                                                <label for="inputNamaSosmed_{{$key}}" class="form-label">Sosial Media</label>
                                                <input type="text" name="sosmed[{{$key}}][nama]" class="form-control" id="inputNamaSosmed_{{$key}}" value="{{$row->nama}}"
                                                    data-parsley-required="true" placeholder="ex : 'instagram'" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-11">
                                            <div class="form-group">
                                                <label for="inputUrlSosialMedia_{{$key}}" class="form-label">Url Sosial
                                                    Media</label>
                                                <input type="text" name="sosmed[{{$key}}][url]" class="form-control" id="inputUrlSosialMedia_{{$key}}" value="{{$row->url}}"
                                                    data-parsley-required="true" placeholder="ex : 'https://instagram.com/username'" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-1">
                                            <button class="btn btn-danger btn-sm delete-sosmed" style="{{$key === 0 ? 'display: none' : ''}}" data-index="{{$key}}" data-sosmed="{{$row->id}}"
                                                type="button"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="jumlah_sosmed" value="{{count($data->sosial_media)}}" id="jumlah_sosmed">
                                <!-- Cloned sosmed-list will be inserted here -->
                            </div>
                            <button class="more-sosmed btn btn-primary btn-sm" type="button"><i class="fa fa-plus"></i> Add
                                more sosmed</button>
                        </div>
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
                            <a href="{{ route('admin.team') }}" class="btn btn-danger me-1 mb-1">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="template-sosmed d-none">
        <input type="hidden" name="sosmed[0][id]" id="inputIdSosmed_0" value="">
        <div class="col-md-5 col-11">
            <div class="form-group">
                <label for="inputNamaSosmed_0" class="form-label">Sosial Media</label>
                <input type="text" name="sosmed[0][nama]" class="form-control" id="inputNamaSosmed_0"
                    data-parsley-required="true" placeholder="ex : 'instagram'" autocomplete="off">
            </div>
        </div>
        <div class="col-md-6 col-11">
            <div class="form-group">
                <label for="inputUrlSosialMedia_0" class="form-label">Url Sosial
                    Media</label>
                <input type="text" name="sosmed[0][url]" class="form-control" id="inputUrlSosialMedia_0"
                    data-parsley-required="true" placeholder="ex : 'https://instagram.com/username'" autocomplete="off">
            </div>
        </div>
        <div class="col-md-1 col-1">
            <button class="btn btn-danger btn-sm delete-sosmed" style="display: none" data-index="0" data-sosmed=""
                type="button"><i class="fa fa-trash"></i></button>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            function addSosmedList() {
                // Use a class selector to get the count of cloned elements
                var currentIndex = $(".sosmed-list").find('.row').length;
                $('#jumlah_sosmed').val((currentIndex + 1));

                // Clone the template-sosmed
                var clonedElement = $(".template-sosmed").clone();
                clonedElement.addClass("row rowSosmed_" + currentIndex);
                clonedElement.removeClass("template-sosmed");
                clonedElement.removeClass("d-none");

                // Set the index-element attribute on the cloned element
                clonedElement.attr("index-element", currentIndex);

                // Update IDs and "for" attributes of cloned elements
                clonedElement.find("[id^='inputNamaSosmed_']").attr("id", "inputNamaSosmed_" + currentIndex);
                clonedElement.find("[id^='inputIdSosmed_']").attr("id", "inputIdSosmed_" + currentIndex);
                clonedElement.find("[id^='inputUrlSosialMedia_']").attr("id", "inputUrlSosialMedia_" +
                    currentIndex);

                clonedElement.find("[for^='inputNamaSosmed_']").attr("for", "inputNamaSosmed_" + currentIndex);
                clonedElement.find("[for^='inputUrlSosialMedia_']").attr("for", "inputUrlSosialMedia_" +
                    currentIndex);

                clonedElement.find("[name^='sosmed\\[0\\]\\[\\nama]").attr("name", "sosmed[" + currentIndex +
                    "][nama]");
                clonedElement.find("[name^='sosmed\\[0\\]\\[\\url]").attr("name", "sosmed[" + currentIndex +
                    "][url]");
                clonedElement.find("[name^='sosmed\\[0\\]\\[\\id]").attr("name", "sosmed[" + currentIndex +
                    "][id]");

                clonedElement.find(".delete-sosmed").attr("data-index", currentIndex);

                // Append the cloned element to the container
                $(".sosmed-list").append(clonedElement);

                // Show delete button for the new row, hide for the initial row
                $(".sosmed-list .delete-sosmed").show();
                $(".sosmed-list .rowSosmed_0 .delete-sosmed").hide();
            }

            // Function to handle deleting sosmed-list
            function deleteSosmedList(element, index) {
                var sosmedList = $(element).find(".rowSosmed_" + index);

                // Check if it is not the first row before deleting
                if (sosmedList.attr("index-element") !== "0") {
                    sosmedList.remove();
                    const jmlah = parseInt($('#jumlah_sosmed').val()) - 1;
                    $('#jumlah_sosmed').val(jmlah);
                }
            }

            // Event listener for "Add more sosmed" button
            $(".more-sosmed").click(function() {
                addSosmedList();
            });

            // Event listener for "Delete" button
            $("#sosmed").on("click", ".delete-sosmed", function() {
                let index = $(this).data('index');
                let sosmed = $(this).data('sosmed');
                let sosmedList = $(this).closest(".sosmed-list");

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success mx-4',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });

                swalWithBootstrapButtons.fire({
                    title: 'Apakah anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Saya yakin!',
                    cancelButtonText: 'Tidak, Batalkan!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (sosmed !== '') {
                            $.ajax({
                                type: "GET",
                                url: "{{ route('admin.team.deleteSosmed') }}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "_method": "GET",
                                    "id": sosmed, // Make sure you define the variable 'id' to be deleted
                                },
                                success: function() {
                                    deleteSosmedList(sosmedList, index);
                                    swalWithBootstrapButtons.fire({
                                        title: 'Berhasil!',
                                        text: 'Data berhasil dihapus.',
                                        icon: 'success',
                                        timer: 1500, // 2 detik
                                        showConfirmButton: false,
                                    });
                                }
                            });
                        } else {
                            deleteSosmedList(sosmedList, index);
                            swalWithBootstrapButtons.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil dihapus.',
                                icon: 'success',
                                timer: 1500, // 2 detik
                                showConfirmButton: false,
                            });
                        }
                    }
                });
            });

            // Hide delete button for the initial row
            $(".sosmed-list[index-element='0'] .delete-sosmed").hide();
        });
    </script>

    <script>
        // Fungsi untuk menangani perubahan pada file input
        function handleFileInputChange() {
            const newInput = this; // 'this' mengacu pada elemen file input yang dipicu oleh perubahan

            // Mendapatkan file yang baru dipilih
            const newFile = newInput.files[0];

            // Lakukan sesuatu dengan file yang baru dipilih
            console.log(`File Baru: ${newFile.name}, Tipe: ${newFile.type}, Ukuran: ${newFile.size} bytes`);

            // Anda dapat menambahkan logika lain sesuai kebutuhan Anda di sini
        }

        const gambarLainnyaInputFile = document.getElementById("gambarLainnyaInputFile");
        const previewContainerGambarLainnya = document.querySelector(".fileinput-preview-image");

        gambarLainnyaInputFile.addEventListener("change", function() {
            const file = this.files[0]; // Mengambil file pertama dari daftar file yang dipilih

            // Hanya melanjutkan jika file yang dipilih adalah gambar
            if (file && /^image\//.test(file.type)) {
                const imgContainer = document.createElement("div");
                imgContainer.classList.add("img-thumbnail-container");

                const img = document.createElement("img");
                img.classList.add("img-thumbnail");
                img.width = 200; // Sesuaikan ukuran gambar sesuai kebutuhan
                img.src = URL.createObjectURL(file);

                const deleteButton = document.createElement("a");
                deleteButton.classList.add("btn", "btn-danger", "btn-sm", "deleteImg");
                deleteButton.textContent = "Hapus";
                deleteButton.addEventListener("click", function() {
                    // Hapus gambar saat tombol "Hapus" diklik
                    imgContainer.remove();
                    gambarLainnyaInputFile.value = null; // Menghapus nilai file input
                });

                imgContainer.appendChild(img);
                imgContainer.appendChild(deleteButton);
                previewContainerGambarLainnya.innerHTML = ""; // Menghapus tampilan sebelumnya
                previewContainerGambarLainnya.appendChild(imgContainer);

                // Tambahkan event listener ke file input baru
                gambarLainnyaInputFile.addEventListener("change", handleFileInputChange);
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

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
