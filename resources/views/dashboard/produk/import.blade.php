<div class="modal fade" id="importData" tabindex="-1" aria-labelledby="importDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/dashboard/produk/import" method="POST" enctype="multipart/form-data" id="import-form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importpenjemputan-label">Import Data Penjemputan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-none align-items-center justify-content-between bg-white p-2 shadow-md mb-3"
                        id="import-file-card">
                        <div class="d-flex align-items-center">
                            <div class="h1 p-3 mb-0"><i class="fa fa-file-excel"></i></div>
                            <div>
                                <h6 class="mb-0 filename">File.xlsx</h6>
                                <div class="text-sm filesize">30kb</div>
                            </div>
                        </div>
                        <div class="p-3">
                            <button type="button" class="close" id="remove-import-file">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="text-center py-5" id="select-import-file">
                        <div>Upload file</div>
                        <label for="file-import" class="btn btn-info mt-1 font-weight-normal">
                            <span>Pilih file</span>
                        </label>
                        <div>Klik <a href="penjemputan/download">disini</a> untuk
                            mengunduh
                            template</div>
                    </div>
                    <input type="file" class="custom-file-input" id="file-import" name="file" hidden>
                    <button class="btn btn-primary w-100"><i class="fas fa-download mr-2"></i>Import data</button>
                </div>
            </div>
        </form>
    </div>
</div>



@push('script')
    <script>
        const removeImportFile = () => {
            $("#file-import").val(null);
            $(".filename").val("");
            $(".filesize").val("");
            $("#import-file-card").addClass("d-none");
            $("#import-file-card").removeClass("d-flex");
            $("#select-import-file").removeClass("d-none");
            $("#select-import-file").addClass("d-block");
        };
        $(function() {
            $('[name="file"]').on("change", () => {
                let filename = $("#file-import")[0].files[0].name;
                let filesize = $("#file-import")[0].files[0].size;
                $(".filename").text((filename) ?? "");
                $(".filesize").text((filesize) ?? "");
                $("#import-file-card").removeClass("d-none");
                $("#import-file-card").addClass("d-flex");
                $("#select-import-file").addClass("d-none");
                $("#select-import-file").removeClass("d-block");
            });
            $("#remove-import-file").on("click", removeImportFile);
        });
    </script>
@endpush
