@extends('layouts.main')

@push('head')
<link rel="stylesheet" href="{{ asset('assets') }}/css/single_product.css">
@endpush
@section('main')

	<div class="container-sm single-product">
		<div class="row">
			<div class="col-6">
				<img src="{{ asset('assets') }}/img/product/borneo_3.png" width="100%">
			</div>
			<div class="col-6">
				<p>Home / Borneo 3</p>
				<h1>Tenda Bornoe 3</h1>
				<h4>Rp. 50.000</h4>
				<form action="">
					<input type="text" data-toggle="datepicker"  name="tgl_pesan"> 
					<span id="tgl"><i class="fa-solid fa-calendar-days fs-4" ></i></span>
					<input type="number" name="lama_pesan">
					<input type="text" data-toggle="datepicker"  name="batas_waktu">
					<input type="number" name="qty">
					<button class="btn btn-dark">Add To Cart</button>
				</form>
				<h3>Product Details</h3>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque numquam, quas perspiciatis sit voluptate possimus aspernatur cupiditate quos commodi, repellendus optio perferendis enim, veritatis consequatur.</p>
			</div>
		</div>
	</div>


@endsection