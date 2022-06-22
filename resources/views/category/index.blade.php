@extends('layouts.admin')

@section('title', 'All Categories')

@section('content')
<div class="box">
	<div class='is-flex is-flex-direction-row is-justify-content-space-between'>
		<h5 class='has-text-weight-bold mb-2 is-size-5'>All Categories</h5>
		<a href="{{ route('category.create') }}" class="button is-primary is-small">New Category</a>
	</div>
	<div class="table-container">
		<table class="table is-fullwidth is-bordered is-hoverable">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Name</th>
		      <th>Description</th>
		      <th>Created by</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($categories as $key => $category)
		    <tr>
		      <td>{{ $key + 1 }}</td>
		      <td>{{ $category->name }}</td>
		      <td>{{ $category->description }}</td>
		      <td><small>{{ $category->user->name }} <br> {{ $category->created_at }}</small></td>
		      <td>
		      	<a href="{{ route('category.show', $category->id) }}" class="button is-info is-small">View</a>
		      	<a href="{{ route('category.edit', $category->id) }}" class="button is-warning is-small">Edit</a>
		      	<form action="{{ route('category.destroy', $category->id) }}" method='post' class='is-inline'>
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
	{{ $categories->links() }}
</div>
@endsection
