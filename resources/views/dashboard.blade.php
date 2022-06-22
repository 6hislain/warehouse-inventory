@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="columns is-multine is-centered">
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $product_count }}</h1>
			<a href="{{ route('product.index') }}">Products &rarr;</a>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h6 class='is-size-6'>Total: {{ $stock_in_total }}</h6>
			<h3 class='is-size-3'>{{ $stock_in_count }}</h3>
			<a href="{{ route('transaction.index') }}">Stock in &rarr;</a>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h6 class='is-size-6'>Total: {{ $stock_out_total }}</h6>
			<h3 class='is-size-3'>{{ $stock_out_count }}</h3>
			<a href="{{ route('transaction.index') }}">Stock out &rarr;</a>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $category_count }}</h1>
			<a href="{{ route('category.index') }}">Category &rarr;</a>
		</div>
	</div>
</div>
@endsection
