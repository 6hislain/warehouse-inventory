@extends('layouts.user')

@section('title', 'Edit Category')

@section('content')
<div class="box">
	<div class='is-flex is-flex-direction-row is-justify-content-space-between'>
		<h5 class='has-text-weight-bold mb-2 is-size-5'>Edit Category</h5>
		<a href="{{ route('category.index') }}" class="button is-primary is-small">All Categories</a>
	</div>
	<form action="{{ route('category.update', $category->id) }}" method='post'>
		@method('put')
		<div class="field">
		  <label class="label">Name</label>
		  <div class="control">
		    <input class="input @error('name') is-danger @enderror" type="text" name="name" placeholder="e.g Food, Drinks" value="{{ $category->name }}">
		  </div>
	   	<p class="help is-danger">@error('name') {{ $message }} @enderror</p>
		</div>
		<div class="field">
		  <label class="label">Description</label>
		  <div class="control">
		  	<textarea name="description" rows="4" class="textarea @error('name') is-danger @enderror">{{ $category->description }}</textarea>
		  </div>
		  <p class="help is-danger">@error('description') {{ $message }} @enderror</p>
		</div>
		<div class="field">
			@csrf
			<button type='submit' class="button is-info">Continue</button>
		</div>
	</form>
</div>
@endsection