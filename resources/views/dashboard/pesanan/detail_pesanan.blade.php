<!-- Modal -->
@foreach ($pesanans as $key => $pesanan)
    <div class="modal fade" id="detailPesanan{{ $key }}" tabindex="-1" aria-labelledby="detailPesananLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPesananLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="mt-2">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th align="right">SubTotal</th>
                            </tr>
                        </thead>
                        @foreach ($pesanan->detailPesanan as $dp)
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-info">
                                            <img src="{{ asset('storage/' . $dp->produk->mainImage()->image) }}"
                                                alt="{{ $dp->produk->gambar }}" width="50px">
                                            <div>
                                                <p>{{ $dp->produk->nama_produk }}</p>
                                                <small class="d-block">
                                                    <b> Pickup : </b>
                                                    {{ date('d/M/Y', strtotime($dp->tgl_pesan)) }}
                                                    at
                                                    {{ date('H:i', strtotime($dp->tgl_pesan)) }}
                                                </small>
                                                <small class="d-block">
                                                    <b> Dropoff :
                                                    </b>{{ date('d/M/Y', strtotime($dp->batas_waktu)) }} at
                                                    {{ date('H:i', strtotime($dp->batas_waktu)) }}
                                                </small>
                                                <small>
                                                    <b> Total Hari : </b>{{ $dp->lama_pesan }} hari
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <small>Rp.
                                            {{ number_format($dp->produk->harga) }}</small>
                                    </td>
                                    <td>{{ $dp->qty }}</td>
                                    <td align="right">Rp. {{ number_format($dp->jumlah_harga) }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <div class="total-price">
                        <table class="price">
                            <tr align="right">
                                @if (empty($pesanan->ongkir) && $pesanan->pickup == 'jasa_antar')
                                    <td><b> Ongkir</b> </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                    </td>
                                @else
                                    <td><b> Ongkir</b> </td>
                                    <td>
                                        Rp. {{ number_format($pesanan->ongkir) }}
                                    </td>
                                    <td>
                                    </td>
                                @endif
                            </tr>

                            <tr class="delivery" align="right">
                                <td><b>Total Pembayaran</b> </td>
                                <td>
                                    Rp. {{ number_format($pesanan->total_bayar) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endforeach
