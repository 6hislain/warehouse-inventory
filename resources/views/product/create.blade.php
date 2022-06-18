@extends('layouts.user')

@section('title', 'New Product')

@section('content')
<div class="box">
	<div class='is-flex is-flex-direction-row is-justify-content-space-between'>
		<h5 class='has-text-weight-bold mb-2 is-size-5'>New Product</h5>
		<a href="{{ route('product.index') }}" class="button is-primary is-small">All Products</a>
	</div>
	<form action="{{ route('product.store') }}" method='post' enctype="multipart/form-data">
		<div class="columns is-multiline">
			<div class="column is-4">
			  <label class="label">Name</label>
			  <div class="control">
			    <input class="input @error('name') is-danger @enderror" type="text" name="name" placeholder="e.g Bread" value="{{ old('name') }}">
			  </div>
		   	<p class="help is-danger">@error('name') {{ $message }} @enderror</p>
			</div>
			<div class="column is-4">
			  <label class="label">Buying Price</label>
			  <div class="control">
			    <input class="input @error('buying_price') is-danger @enderror" type="number" name="buying_price" value="{{ old('buying_price') }}">
			  </div>
		   	<p class="help is-danger">@error('buying_price') {{ $message }} @enderror</p>
			</div>
			<div class="column is-4">
			  <label class="label">Selling Price</label>
			  <div class="control">
			    <input class="input @error('selling_price') is-danger @enderror" type="number" name="selling_price" value="{{ old('selling_price') }}">
			  </div>
		   	<p class="help is-danger">@error('selling_price') {{ $message }} @enderror</p>
			</div>
			<div class="column is-4">
			  <label class="label">Product Image</label>
			  <div class="control">
			  	<div class="file">
					  <label class="file-label">
					    <input class="file-input" type="file" name="image" accept="image/*">
					    <span class="file-cta">
					      <span class="file-icon">&#10595;</span>
					      <span class="file-label">
					        Choose a file…
					      </span>
					    </span>
					  </label>
					</div>
			  </div>
		   	<p class="help is-danger">@error('image') {{ $message }} @enderror</p>
			</div>
			<div class="column is-4">
			  <label class="label">Currency</label>
			  <div class="select">
			  	<select name="currency">
			  		<option value=""> -- select -- </option>
			  		<option value="usd">USD</option>
			  		<option value="eur">EUR</option>
			  		<option value="gbp">GBP</option>
			  	</select>
			  </div>
		   	<p class="help is-danger">@error('currency') {{ $message }} @enderror</p>
			</div>
			<div class="column is-4">
			  <label class="label">Product Category</label>
			  <div class="select">
			  	<select name="category_id">
			  		<option value=""> -- select -- </option>
			  		@foreach ($categories as $category)
			  		<option value="{{ $category->id }}">{{ $category->name }}</option>
			  		@endforeach
			  	</select>
			  </div>
		   	<p class="help is-danger">@error('category_id') {{ $message }} @enderror</p>
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