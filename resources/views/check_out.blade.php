@extends('layouts.main')

@section('main')

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

	@if(session()->has('hapus'))
	@push('script')
		<script>								
				Swal.fire({
				icon: 'success',
				title: 'Pesanan Anda Di Cancel',
				showConfirmButton: false,
				timer: 2000
				})
		</script>
	@endpush
	@endif

	<div class="container">
		<section id="gallery">
			<a href="/products/" class="btn-ctb">Tambah Pesanan</a>
			<h2>Detail Pesanan Anda</h2>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Produk</th>
								<th scope="col">Qty</th>
								<th scope="col">Harga</th>
								<th scope="col">Jumlah Harga</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($DetailPesanans as $detailPesanan)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $detailPesanan->produk->nama_produk }}</td>
								<td>{{ $detailPesanan->qty }}</td>
								<td>Rp. {{ number_format($detailPesanan->produk->harga) }}</td>
								<td>Rp. {{number_format($detailPesanan->jumlah_harga) }}</td>
								<td>
									<form action="/check_out/{{ $detailPesanan->id }}" method="POST" class="d-inline">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger delete"><i class="fa-solid fa-trash"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-md-12">
					<div class="pull-right text-end">
						<hr />
						<h5><b>Total Pembayaran : </b>Rp. {{ number_format($pesanan->total_bayar ) }}</h5>
					</div>
					<div class="clearfix"></div>    
					<hr />
					<div class="text-end no-print">
							<a class="btn btn-danger "  href="/transaksi">
								Proceed to payment
							</a>
								<a href="dashboard/transaksi/faktur_print" rel="noopener" target="_blank" onclick="window.print();" class="btn btn-primary"><i
									class="fas fa-print"></i> 
									Print
							</a>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection