@extends('layouts.admin')

@section('title', 'Product')

@section('content')
<div class="box">
  <div class='is-flex is-flex-direction-row is-justify-content-space-between'>
    <h5 class='has-text-weight-bold mb-2 is-size-5'>Product</h5>
    <a href="{{ route('product.index') }}" class="button is-primary is-small">All Products</a>
  </div>
  <div class="table-container">
    <table class="table is-fullwidth is-striped is-bordered">
      <tbody>
        <tr>
          <th>Name</th>
          <td>
            {{ $product->name }}
            <figure class="image is-128x128">
              <img src="https://bulma.io/images/placeholders/128x128.png">
              {{-- <img src="/storage/{{ substr($product->image, 6) }}" alt="{{ $product->name }}"> --}}
            </figure>
          </td>
        </tr>
        <tr>
          <th>Category</th>
          <td>{{ $product->category->name }}</td>
        </tr>
        <tr>
          <th>Total transactions</th>
          <td>{{ $transactions_count }}</td>
        </tr>
        <tr>
          <th>Buying price</th>
          <td>{{ $product->buying_price }}</td>
        </tr>
        <tr>
          <th>Selling price</th>
          <td>{{ $product->selling_price }}</td>
        </tr>
        <tr>
          <th>Currency</th>
          <td class='is-uppercase'>{{ $product->currency }}</td>
        </tr>
        <tr>
          <th>Description</th>
          <td>{{ $product->description }}</td>
        </tr>
        <tr>
          <th>Created by</th>
          <td>{{ $product->user->name }} | {{ $product->created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <h5 class='has-text-weight-bold mb-2 is-size-5'>Transactions</h5>
  <div class="table-container">
    <table class="table is-fullwidth is-bordered is-hoverable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total Price</th>
          <th>Transaction Type</th>
          <th>Description</th>
          <th>Created by</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $key => $transaction)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $transaction->quantity }}</td>
          <td>{{ $transaction->unit_price }}</td>
          <td>{{ $transaction->total }}</td>
          <td>{{ $transaction->type }}</td>
          <td>{{ $transaction->description }}</td>
          <td><small>{{ $transaction->user->name }} <br> {{ $transaction->created_at }}</small></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $transactions->links() }}
</div>
@endsection
