@extends('layouts.main')

@section('main')
@if(session()->has('succes'))
	@push('script')
		<script>								
				Swal.fire({
				icon: 'success',
				title: 'Pesanan Anda Sedang Diproses',
				showConfirmButton: false,
				timer: 2000
				})
		</script>
	@endpush
	@endif

<div class="container">
	<section id="gallery" class="mb-120">
		<h2>{{ $title }}</h2>
		<div class="row">
			<div class="col-md-6">
				<nav aria-label="breadcrumb link">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Library</li>
					</ol>
				</nav>
			</div>
			<div class="col-md-6">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2" />
					<button class="btn btn-outline-dark" type="button" id="button-addon2">Search</button>
				</div>
			</div>
		</div>
		
		<div class="my-works">
			<div class="row">
				@foreach ($produks as $produk)   
											 
				<div class="col-lg-4 col-sm-6 mb-5">
					@if ($produk->stok == 0)
					<div class="image-parent">
						<div class="card shadow-sm">
							<div class="stok">
								<img src="{{ asset('assets') }}/img/product/{{ $produk->gambar }}" class="w-100" alt="" />  
								<div class="inside-content">
									<p>Stok Habis</p>  
								</div> 
								<div class="card-body">
									<p class="fw-3">{{ $produk->nama_produk }}</p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="btn-group">
											<a href="/products/{{ $produk->nama_produk }}" class="btn btn-sm btn-ctb d-none">Pesan Sekarang</a>
										</div>
										<small class="text-muted">Rp. {{ number_format($produk->harga) }}/Hari</small>
									</div>
								</div> 

							</div>
						</div>
					</div>
					
					@else
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
							
					@endif
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!--  -->
</div>   
@endsection