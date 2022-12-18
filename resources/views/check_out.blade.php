@extends('layouts.main')

@push('head')
<link rel="stylesheet" href="{{ asset('assets') }}/css/lokasi.css">
@endpush

@if(session()->has('succes'))
	@push('script')
		<script>								
				Swal.fire({
				icon: 'success',
				title: 'Pesanan Masuk Keranjang',
				showConfirmButton: false,
				timer: 2000
				})
		</script>
	@endpush
@endif

@section('main')
	@if(session()->has('hapus'))
	@push('script')
		<script>								
				Swal.fire({
				icon: 'success',
				title: 'Pesanan Berhasil Di Cancel',
				showConfirmButton: false,
				timer: 2000
				})
		</script>
	@endpush
	@endif

	<div class="container">
		<section id="gallery">
			<div class="mb-2">
				<a href="/products/" class="btn-ctb">Tambah Pesanan</a>
				<p align="right">Tanggal Pesanan : {{ $pesanan->tgl_pesan  }}</p>
			</div>
			<h2>Detail Pesanan Anda</h2>
			@if(!empty($pesanan))
			<div class="row">
				<div class="col-md-12">
					<table class="table table-responsive-md">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Produk</th>
								<th scope="col">Qty</th>
								<th scope="col">Lama Pesanan</th>
								<th scope="col">Harga</th>
								<th scope="col">Jumlah Harga</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($DetailPesanans as $detailPesanan)
							<tr align="left">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $detailPesanan->produk->nama_produk }}</td>
								<td>{{ $detailPesanan->qty }}</td>
								<td>{{ $detailPesanan->lama_pesan }} Hari</td>
								<td>Rp. {{ number_format($detailPesanan->produk->harga) }}</td>
								<td>Rp. {{number_format($detailPesanan->jumlah_harga) }}</td>
								<td>
									<form action="/check_out/{{ $detailPesanan->id }}" method="POST" class="d-inline">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger btn-sm delete"><i class="fa-solid fa-trash"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-md-12">
					<div class="pull-right text-end">
						{{-- <hr /> --}}
						<h5><b>Total Pembayaran : </b>Rp. {{ number_format($pesanan->total_bayar ) }}</h5>
					</div>
					<div class="clearfix"></div>    
					<hr />
					@endif 

					<div class="row">
						<div class="col-lg-12">
							<h2>Lokasi Pengambilan Barang</h2>
							<form action="/konfirmasi" method="post">
								@csrf
									<div class="mb-1">
										<label for="dibayar" class="col-form-label"><b> Plilh lokasi </b></label>
									</div>
								<div class="form-check form-check-inline">
									<input type="radio" name="lokasi" value="jasa_antar" id="jasa_antar"
									hidden >
									<label for="jasa_antar">
										<div class="card mb-0">
											<div class="card-body">
													<span >Menggunakan Jasa Antar</span>
													<div class="float-end px-1 py-1">
														<i class="fas fa-check-circle"></i>
													</div>
												</div>
											</div>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" name="lokasi" value="lokasi" id="lokasi"
										hidden >
										<label for="lokasi">
											<div class="card mb-0">
												<div class="card-body">
													<span>Datang Ke Lokasi</span>
													<div class="float-end px-1 py-1">
														<i class="fas fa-check-circle"></i>
														</div>
												</div>
											</div>
										</label>
								</div>
								<div class="mt-3">
									<label for="alamat" class="form-label"><b>Alamat</b></label>
									<div id="isi" class="form-text">Isi alamat Sesuai yang Ada di google maps</div>
									<textarea class="form-control" required name="alamat" readonly id="alamat" rows="3"></textarea>
								</div>
								<div class="mt-3">
									<label for="alamat" class="form-label"><b>Jaminan</b></label>
									<select class="form-select" required aria-label="Default select example" name="jaminan">
										<option selected disabled>Pilih Barang Sebagai Jaminan</option>
										<option value="ktp">KTP</option>
										<option value="kartu pelajar">Kartu Pelajar</option>
										<option value="sim">SIM</option>
									</select>
								</div>
								<div class="text-end no-print mt-3">
									<button type="submit" class="btn btn-success check_out">  <i class="fa-solid fa-cart-shopping"></i> Pesan Sekarang</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
@push('script')
	<script>
			$('[name="lokasi"]').on('change', function() {
				if ($(this).val() == 'lokasi') {
					// alert('lokasi')
					var alamat = "Jln Baros Gg H Sulaeman Desa Sukataris Kec. Karangtengah Cianjur";
					$('#alamat').val(alamat);
					$('#isi').attr('hidden', true)
					$('#alamat').attr('readonly', true)
				}else{
					var alamat = ""
					$('#alamat').attr('readonly', false)
					$('#isi').attr('hidden', false)
					$('#alamat').val(alamat);
				}
			});

				$('.check_out').click(function(e){
					e.preventDefault()
					let data = $(this).closest('form').find('buttom').text()
					Swal.fire({
						// title: "Sudah Yakin?", 
						// 	text: "Dengan Pesanan Anda?",
						// 	buttons:true,
						// 	dangerMode: true,
							title: 'Sudah Yakin Dengan Pesanan Anda?',
							icon: "info",
							showDenyButton: true,
						// showCancelButton: true,
							denyButtonText: `Cancel`,
							confirmButtonText: 'Pesan Sekarang',
						})
						.then((req) => {
							if(req.isConfirmed) $(e.target).closest('form').submit()
							else Swal.fire.close()
						})
					})
		</script>
@endpush