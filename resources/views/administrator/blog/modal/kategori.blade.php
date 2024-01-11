<!-- Modal Detail Module -->
<input type="hidden" id="kategori_id" multiple value="{{ Route::is('admin.blog.edit') ?  $kategoriIds->implode(',')  : '' }}">
<div class="modal fade" tabindex="-1" role="dialog" id="modalKategori" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKategoriLabel">Kategori</h5>
                <button type="button" class="close" id="buttonCloseModuleModal" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalKategoriBody">
                <table class="table" id="datatableModalKategori">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width="">Nama</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="selectDataKategori">Pilih</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('#modalKategori').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);

            // Get the value of inputkategoriProject
            var inputkategoriProject = $("#kategori_id").val();

            // Now, you can initialize a new DataTable on the same table.
            $("#datatableModalKategori").DataTable().destroy();
            $('#datatableModalKategori tbody').remove();
            var data_table_modal_kategori = $('#datatableModalKategori').DataTable({
                "oLanguage": {
                    "oPaginate": {
                        "sFirst": "<i class='ti-angle-left'></i>",
                        "sPrevious": "&#8592;",
                        "sNext": "&#8594;",
                        "sLast": "<i class='ti-angle-right'></i>"
                    }
                },
                processing: true,
                serverSide: true,
                order: [
                    [0, 'asc']
                ],
                // scrollX: true, // Enable horizontal scrolling
                ajax: {
                    url: '{{ route('admin.blog.getDataKategori') }}',
                    dataType: "JSON",
                    type: "GET",
                },
                columns: [{
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                ],
                "rowCallback": function(row, data) {
                    // Check if inputkategoriProject is not empty and data.id matches
                    if (inputkategoriProject) {
                        // Check if data.id is in the array
                        if (inputkategoriProject.includes(data.id.toString())) {
                            $(row).addClass('selected');
                        }
                    }
                }
            });


            // Click event for row selection
            $('#datatableModalKategori tbody').on('click', 'tr', function() {
                // Toggle the 'selected' class on the clicked row
                $(this).toggleClass('selected');
            });

            // Click event for "Pilih" button
            $('#selectDataKategori').on('click', function() {
                // Get all selected rows
                var selectedRows = $('#datatableModalKategori tbody tr.selected');

                // Check if any row is selected
                if (selectedRows.length > 0) {
                    // Extract IDs from selected rows
                    var selectedIds = selectedRows.map(function() {
                        var data = data_table_modal_kategori.row(this).data();
                        return data.id;
                    }).get();
                    var selectedNames = selectedRows.map(function() {
                        var data = data_table_modal_kategori.row(this).data();
                        return data.nama;
                    }).get();
                    // Create JSON strings
                    var selectedIdsJSON = JSON.stringify(selectedIds);
                    var selectedNamesJSON = JSON.stringify(selectedNames);

                    // Update the input fields with JSON strings
                    $("#kategori_id").val(selectedIds);
                    $("#inputKategori").val(selectedIdsJSON);
                    $("#inputKategoriName").val(selectedNamesJSON);
                    $('#buttonCloseModuleModal').click();


                } else {
                    // Inform the user that no row is selected
                    Swal.fire({
                        title: "Peringatan!",
                        text: "Pilih salah satu data.",
                        icon: "warning"
                    });
                }
            });

        });
    </script>
@endpush
