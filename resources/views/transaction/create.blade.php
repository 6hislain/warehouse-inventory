@extends('layouts.user')

@section('title', 'New Transaction')

@section('content')
<div class="box">
	<div class='is-flex is-flex-direction-row is-justify-content-space-between'>
		<h5 class='has-text-weight-bold mb-2 is-size-5'>New Transaction</h5>
		<a href="{{ route('transaction.index') }}" class="button is-primary is-small">All Transactions</a>
	</div>
	<form action="{{ route('transaction.store') }}" method='post'>
		<div class="columns is-multiline">
			<div class="column is-4">
			  <label class="label">Product</label>
			  <div class="select">
			  	<select name="product_id">
			  		<option value=""> -- select -- </option>
			  		@foreach ($products as $product)
			  		<option value="{{ $product->id }}">{{ $product->name }}</option>
			  		@endforeach
			  	</select>
			  </div>
		   	<p class="help is-danger">@error('product_id') {{ $message }} @enderror</p>
			</div>
			<div class="column is-4">
			  <label class="label">Quantity</label>
			  <div class="control">
			    <input class="input @error('quantity') is-danger @enderror" type="number" name="quantity" value="{{ old('quantity') }}">
			  </div>
		   	<p class="help is-danger">@error('quantity') {{ $message }} @enderror</p>
			</div>
			<div class="column is-4">
			  <label class="label">Transaction Type</label>
			  <div class="select">
			  	<select name="type">
			  		<option value=""> -- select -- </option>
			  		<option value="stock in">Stock In</option>
			  		<option value="stock out">Stock Out</option>
			  		<option value="expired">Expired</option>
			  	</select>
			  </div>
		   	<p class="help is-danger">@error('type') {{ $message }} @enderror</p>
			</div>
			<div class="column is-12">
			  <label class="label">Description</label>
			  <div class="control">
			  	<textarea name="description" rows="4" class="textarea @error('name') is-danger @enderror">{{ old('description') }}</textarea>
			  </div>
			  <p class="help is-danger">@error('description') {{ $message }} @enderror</p>
			</div>
			<div class="column is-6 field">
				@csrf
				<button type='submit' class="button is-info">Continue</button>
			</div>
		</div>
	</form>
</div>
@endsection