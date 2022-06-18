@extends('layouts.user')

@section('title', 'All Products')

@section('content')
<div class="box">
	<div class='is-flex is-flex-direction-row is-justify-content-space-between'>
		<h5 class='has-text-weight-bold mb-2 is-size-5'>All Products</h5>
		<a href="{{ route('product.create') }}" class="button is-primary is-small">New Product</a>
	</div>
	<div class="table-container">
		<table class="table is-fullwidth is-bordered is-hoverable">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th style='width: 20%'>Name</th>
		      <th>Details</th>
		      <th>Created by</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($products as $key => $product)
		    <tr>
		      <td>{{ $key + 1 }}</td>
		      <td>
		      	{{ $product->name }}
		      	<img src="/storage/{{ substr($product->image, 6) }}" alt="{{ $product->name }}" class='is-fullwidth'>
		      </td>
		      <td>
		      	{{ $product->buying_price }} ~
		      	{{ $product->selling_price }} <span class="is-uppercase">{{ $product->currency }}</span> <hr class='my-1'>
		      	{{ $product->description }}
		      </td>
		      <td><small>{{ $product->user->name }} <br> {{ $product->created_at }}</small></td>
		      <td>
		      	<a href="{{ route('product.show', $product->id) }}" class="button is-info is-small">View</a>
		      	<a href="{{ route('product.edit', $product->id) }}" class="button is-warning is-small">Edit</a>
		      	<form action="{{ route('product.destroy', $product->id) }}" method='post' class='is-inline'>
		      		@method('delete')
		      		@csrf
			      	<button type='submit' class="button is-danger is-small">Delete</button>
			      </form>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
	{{ $products->links() }}
</div>
@endsection