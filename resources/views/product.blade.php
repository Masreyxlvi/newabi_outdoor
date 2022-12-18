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

					{{-- @if(session()->has('error'))
						@push('script')
							<script>								
								
							</script>
						@endpush
					@endif --}}

				
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
									<label class="custom-label" for="qty">Jumlah Barang :</label>
									<input type="number"  class="custom-input @error('qty') is-invalid @enderror"  name="qty" id="qty" />
								</div>
								<div class="controlled-form mb-4">
									<label class="custom-label" for="lama_pesan">Lama Pesanan :</label>
									<div class="d-inline text-center">
										<input type="text" class="custom-inputs" name="lama_pesan" id="lama_pesan" />
										<input type="text" disabled class="custom-select text-center" value="Hari" style="width: 15%">
										{{-- <select class="custom-select" id="day" style="width: 25%">
											<option selected value="1">Hari</option>
											<option value="2">Minggu</option>
										</select> --}}
										
									</div>
								</div>
								<div class="controlled-form mb-4">
									<label class="custom-label" for="nama">Batas Waktu :</label>
									<input type="text" readonly class="custom-input" name="batas_waktu" id="batas_waktu"/>
								</div>
								<div class="controlled-form">
									<button class="btn-kontak align-self-end" type="submit">	<i class="fa-solid fa-cart-shopping"></i> Masukan Keranjang</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</div>

	<section id="works">
		<div class="container">
			<div class="heading">
				<h2>{{ $title }}</h2>
				<!-- <p class="sm-center">Berikut adalah karya-karya yang dari Kami</p> -->
			</div>
			<div class="my-works">
				<div class="row">
					@foreach ($produks as $produk)                  
					<div class="col-lg-4 col-sm-6 mb-5">
						<div class="image-parent">
							<div class="card shadow-sm">
								<img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}" class="w-100" alt="" />   
								<div class="card-body">
									<p class="fw-3">{{ $produk->nama_produk }}</p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<a href="/products/{{ $produk->nama_produk }}" class="btn btn-sm btn-ctb">Pesan Sekarang</a>
										</div>
										<small class="text-muted">Rp. {{ number_format($produk->harga) }}/Hari</small>
									</div>
								</div> 
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
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

		
		function batasWaktu(){
				var tgl_pesan = document.getElementById('tgl_pesan').value;
				var lama_pesan = document.getElementById('lama_pesan').value;
				var lama_pesan = document.getElementById('lama_pesan').value;


				const today = new Date(tgl_pesan);
				var tomorow = new Date(today);
				// lama_pesan.toString()
				tomorow.setDate(Number(lama_pesan) + today.getDate())
				tomorow.toLocaleDateString();

				const year = tomorow.getFullYear()
				const bulan = tomorow.getMonth() + 1
				const day = tomorow.getDate()

				$('#batas_waktu').val(year+'-'+bulan+'-'+day);
		}

		$('#lama_pesan').on('keyup change', function() {
			batasWaktu(this)
		})
		$('#tgl_pesan').on('keyup change', function() {
			batasWaktu(this)
		})

		$('#qty').on('keyup change', function() {
			const qty = document.getElementById('qty');
			var stok = {{ $produk->stok }};
			// alert(stok)
			if(qty.value > stok){
				Swal.fire({
					icon: 'error',
					title: 'Jumlah Stok Tidak Tersedia',
					text: 'Stok Tersedia : ' + stok, 
					showConfirmButton: false,
					timer: 2500
				})
				$('#qty').val(stok);
			}
			
		})



	</script>
@endpush
