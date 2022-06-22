@extends('layouts.admin')

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
		      <th>Product</th>
		      <th>Quantity, Price, Total</th>
		      <th>Description</th>
		      <th>Transaction Type</th>
		      <th>Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($transactions as $key => $transaction)
		    <tr>
		      <td>{{ $key + 1 }}</td>
		      <td>
		      	<a href='{{ route('product.show', $transaction->product->id) }}' target='_blank'>{{ $transaction->product->name }}</a>
		      </td>
            <td>
              {{ $transaction->quantity }} x {{ $transaction->unit_price }} = {{ $transaction->total }}
            </td>
          <td>{{ $transaction->description }}</td>
		      <td>{{ $transaction->type }}</td>
		      <td>
		      	<a href="{{ route('transaction.show', $transaction->id) }}" class="button is-info is-small">View</a>
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
