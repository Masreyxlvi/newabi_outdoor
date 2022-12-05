@extends('layouts.main')
@section('main')

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
					<div class="col-lg-12">
						<div class="card-form">
							<div class="accent-pills mt-5">
								<p>Pesan Sekarang</p>
							</div>
							<form action="/products/{{ $produk->nama_produk }}" method="post" class="custom-form">
								@csrf
								<div class="controlled-form mb-4">
									<label class="custom-label"  for="tgl_pesan">Tanggal Pesanan :</label>
									<input type="text" readonly data-toggle="datepicker" class="custom-input" name="tgl_pesan" id="tgl_pesan" />
								</div>
								<div class="controlled-form mb-4">
									<label class="custom-label" for="qty">Qty :</label>
									<input type="number"  class="custom-input" name="qty" id="qty" />
								</div>
								<div class="controlled-form mb-4">
									<label class="custom-label" for="lama_pesan">Lama Pesanan</label>
									<input type="number" class="custom-input" name="lama_pesan" id="lama_pesan" />
								</div>
								<div class="controlled-form mb-4">
									<label class="custom-label" for="nama">Batas Waktu :</label>
									<input type="text" readonly data-toggle="datepicker" class="custom-input" name="batas_waktu" id="batas_waktu" />
								</div>
								<div class="controlled-form">
									<button class="btn-kontak align-self-end" type="submit">Masukan Keranjang</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</div>
@endsection

@push('script')
	<script>
		$('[data-toggle="datepicker"]').datepicker({
			format: 'yyyy-mm-dd',
			autoHide: true,
		});

		Date.prototype.toDateInputValue = (function() {
						var local = new Date(this);
						local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
						return local.toJSON().slice(0,10);
					}); 
				$('#tgl_pesan').val(new Date().toDateInputValue());

	</script>
@endpush
