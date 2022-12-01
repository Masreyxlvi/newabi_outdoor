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
					<h2>{{ $produk->nama_produk }}</h2>
					<h4>Rp. {{ number_format($produk->harga) }} Per Unit</h4>
					<p>{{ $produk->keterangan }}</p>
				</div>
				<div class="trancation">
					<div class="card">
						<div class="card-header text-center">
							<h6>Pesan Sekarang</h6>
						</div>
						<div class="card-body">
							<form>
								<div class="mb-3">
									<label for="exampleInputEmail1" class="form-label">Email address</label>
									<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
									<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
								</div>
								<div class="mb-3">
									<label for="exampleInputPassword1" class="form-label">Password</label>
									<input type="password" class="form-control" id="exampleInputPassword1">
								</div>
								<div class="mb-3">
									<div class="form-check form-check-inline">
										<input type="radio" name="dibayar" value="belum_dibayar" id="belum_dibayar"
										hidden >
										<label for="belum_dibayar">
											<div class="card mb-0">
												 <div class="card-body">
														<span >Bawa Sendiri</span>
														<div class="float-end px-1 py-1">
															<i class="fas fa-check-circle"></i>
														</div>
												 </div>
											</div>
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" name="dibayar" value="dibayar" id="dibayar"
										hidden >
										<label for="dibayar">
											<div class="card mb-0">
												 <div class="card-body">
														<span>Menggunakan Jasa Antar</span>
														<div class="float-end px-1 py-1">
															<i class="fas fa-check-circle"></i>
														</div>
												 </div>
											</div>
										</label>
									</div>

								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
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
