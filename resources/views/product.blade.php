@extends('layouts.main')
@push('head')
<link href="{{ asset('assets') }}/css/pengambilan_barang.css" rel="stylesheet">
@endpush
@section('main')

<div class="container">
	<section id="product">
		<div class="row justify-content-between">
			<div class="col-lg-6">
				<div class="product_img">
					<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}" class="d-block w-100" alt="...">
							</div>
							{{-- <div class="carousel-item">
								<img src="{{ asset('assets') }}/img/works/borneo_4.png" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item">
								<img src="{{ asset('assets') }}/img/works/borneo_3.png" class="d-block w-100" alt="...">
							</div> --}}
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				{{-- <div class="card card-body"> --}}
				<div class="product_detail">
					<div class="d-flex justify-content-between align-items-center">
						<h2>{{ $produk->nama_produk }}</h2>
						<h5 class="text-muted">Stok {{ $produk->stok }}</h5>
					</div>
					<h4>Rp. {{ number_format($produk->harga) }} Per Unit</h4>
					<p>{{ $produk->keterangan }}</p>
				</div>
				<div class="trancation">
					<div class="card">
						<div class="card-header text-center bg-dark text-white">
							<h6>Pesan Sekarang</h6>
						</div>
						<div class="card-body">
							<form method="post" action="/products/{{ $produk->nama_produk }}">
								@csrf
								<div class="row">	
									<div class="col-md-6">
										@if($errors->any())
											<div class="alert alert-danger" role="alert" id="error-alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="close">
													<span aria-hidden="true">&times;</span>
												</button>
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
											@endif
										<div class="mb-3">
											<label for="tanggal" class="form-label">Tanggal Pesanan</label>
											<input type="date" class="form-control"name="tgl_pesan" id="tanggal" required>
										</div>
										<div class="mb-3">
											<label for="lama_pesan" class="form-label">Batas Waktu</label>
											<input type="date" class="form-control" placeholder="1 Hari" name="batas_waktu" id="lama_pesan">
										</div>
									</div>
									<div class="col-md-6">
										<label for="lama_pesan" class="form-label">Lama Penyewaan</label>
										<div class="input-group mb-3">
											<input type="number" class="form-control" placeholder="1" name="lama_pesan">
											<span class="input-group-text" id="basic-addon1">Hari</span>
										</div>
										<div class="mb-4">
											<label for="lama_pesan" class="form-label">Qty</label>
											<input type="number" class="form-control" placeholder="0" name="qty" id="lama_pesan">
										</div>
									</div>
									<button type="submit" class="btn btn-success"><i class="fa-solid fa-cart-plus"></i> Masukan Keranjang</button>
								</div>
							</form>
							
						</div>
					</div>
				</div>
				{{-- </div> --}}
			</div>
		</div>
	</section>
</div>
@endsection
