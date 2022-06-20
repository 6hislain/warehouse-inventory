@extends('layouts.user')

@section('title', 'All Transactions')

@section('content')
<div class="box">
	<div class='is-flex is-flex-direction-row is-justify-content-space-between'>
		<h5 class='has-text-weight-bold mb-2 is-size-5'>All Transactions</h5>
		<a href="{{ route('transaction.create') }}" class="button is-primary is-small">New Transaction</a>
	</div>
	<div class="table-container">
		<table class="table is-fullwidth is-bordered is-hoverable">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th style='width: 20%'>Product</th>
		      <th>Description</th>
		      <th>Created by</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($transactions as $key => $transaction)
		    <tr>
		      <td>{{ $key + 1 }}</td>
		      <td>
		      	{{ $transaction->product->name }}
		      	<img src="/storage/{{ substr($transaction->product->image, 6) }}" alt="{{ $transaction->product->name }}" class='is-fullwidth'>
		      	{{ $transaction->product->buying_price }} ~
		      	{{ $transaction->product->selling_price }} <span class="is-uppercase">{{ $transaction->product->currency }}</span>
		      </td>
		      <td>
		      	Quantity: {{ $transaction->quantity }} <br> Total: {{ $transaction->total }} <hr class='my-1'>
		      	{{ $transaction->description }}
		      </td>
		      <td><small>{{ $transaction->user->name }} <br> {{ $transaction->created_at }}</small></td>
		      <td>
		      	<a href="{{ route('transaction.show', $transaction->id) }}" class="button is-info is-small">View</a>
		      	<a href="{{ route('transaction.edit', $transaction->id) }}" class="button is-warning is-small">Edit</a>
		      	<form action="{{ route('transaction.destroy', $transaction->id) }}" method='post' class='is-inline'>
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
	{{ $transactions->links() }}
</div>
@endsection