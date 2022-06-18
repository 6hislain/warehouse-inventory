@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<div class="columns is-multine is-centered">
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $productCount }}</h1>
			<a href="{{ route('product.index') }}">Products &rarr;</a>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $stockInCount }}</h1>
			<a href="{{ route('transaction.index') }}">Stock in &rarr;</a>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $stockOutCount }}</h1>
			<a href="{{ route('transaction.index') }}">Stock out &rarr;</a>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $categoryCount }}</h1>
			<a href="{{ route('category.index') }}">Category &rarr;</a>
		</div>
	</div>
</div>
@endsection