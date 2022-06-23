@extends('layouts.default')

@section('title', 'Stats')

@section('content')
<div class="columns is-multine is-centered">
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $user_count }}</h1>
			<p>Users</p>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $product_count }}</h1>
			<p>Products</p>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $transaction_count }}</h1>
			<p>Transactions</p>
		</div>
	</div>
	<div class="column is-3">
		<div class="box">
			<h1 class='is-size-1'>{{ $category_count }}</h1>
			<p>Categories</p>
		</div>
	</div>
</div>
@endsection
