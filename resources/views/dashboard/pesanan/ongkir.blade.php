@foreach ($pesanans as $key => $pesanan)
    <div class="modal fade" id="ongkir{{ $key }}" tabindex="-1" aria-labelledby="ongkirLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ongkirLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/pesanan/diskon/{{ $pesanan->kode_pesanan }}" method="post">
                        @csrf
                        <label for="ongkir">Tambah Ongkir</label>
                        <input type="number" class="form-control" name="ongkir" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
