@extends('layouts.main')

@section('main')
<div class="container">
	<section id="categories">
		<h2>All Categories</h2>
		<div class="categories-wrapper">
			@foreach($kategoris as $kategori)
			<div class="category">
				<a href="/categories/{{ $kategori->nama_kategori }}">
					<img src="{{ asset('assets') }}/img/categories/{{ $kategori->gambar }}" alt="" />
					<div class="inside-content">
						<p>{{ $kategori->nama_kategori }}</p>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</section>
</div>
@endsection