@extends('layouts.admin')

@section('title', 'Transaction')

@section('content')
<div class="box">
  <div class='is-flex is-flex-direction-row is-justify-content-space-between'>
    <h5 class='has-text-weight-bold mb-2 is-size-5'>Transaction</h5>
    <a href="{{ route('transaction.index') }}" class="button is-primary is-small">All Transactions</a>
  </div>
  <div class="table-container">
    <table class="table is-fullwidth is-striped is-bordered">
      <tbody>
        <tr>
          <th>Product</th>
          <td>{{ $transaction->product->name }}</td>
        </tr>
        <tr>
          <th>Quantity</th>
          <td>{{ $transaction->quantity }}</td>
        </tr>
        <tr>
          <th>Unit price</th>
          <td class='is-uppercase'>{{ $transaction->unit_price }} {{ $transaction->product->currency }}</td>
        </tr>
        <tr>
          <th>Total</th>
          <td class='is-uppercase'>{{ $transaction->total }} {{ $transaction->product->currency }}</td>
        </tr>
        <tr>
          <th>Transaction type</th>
          <td>{{ $transaction->type }}</td>
        </tr>
        <tr>
          <th>Created by</th>
          <td>{{ $transaction->user->name }} | {{ $transaction->created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <h5 class='has-text-weight-bold mb-2 is-size-5'>Product</h5>
  <div class="table-container">
    <table class="table is-fullwidth is-striped is-bordered">
      <tbody>
        <tr>
          <th>Name</th>
          <td>
            {{ $transaction->product->name }}
            <figure class="image is-128x128">
              <img src="/storage/{{ substr($transaction->product->image, 6) }}" alt="{{ $transaction->product->name }}">
            </figure>
          </td>
        </tr>
        <tr>
          <th>Buying price</th>
          <td>{{ $transaction->product->buying_price }}</td>
        </tr>
        <tr>
          <th>Selling price</th>
          <td>{{ $transaction->product->selling_price }}</td>
        </tr>
        <tr>
          <th>Currency</th>
          <td class='is-uppercase'>{{ $transaction->product->currency }}</td>
        </tr>
        <tr>
          <th>Description</th>
          <td>{{ $transaction->product->description }}</td>
        </tr>
        <tr>
          <th>Created by</th>
          <td>{{ $transaction->product->user->name }} | {{ $transaction->product->created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection
