@extends('layouts.admin')

@section('title', 'Category')

@section('content')
<div class="box">
  <div class='is-flex is-flex-direction-row is-justify-content-space-between'>
    <h5 class='has-text-weight-bold mb-2 is-size-5'>Category</h5>
    <a href="{{ route('category.index') }}" class="button is-primary is-small">All Categories</a>
  </div>
  <div class="table-container">
    <table class="table is-fullwidth is-striped is-bordered">
      <tbody>
        <tr>
          <th>Name</th>
          <td>{{ $category->name }}</td>
        </tr>
        <tr>
          <th>Description</th>
          <td>{{ $category->description }}</td>
        </tr>
        <tr>
          <th>Total products</th>
          <td>{{ $product_count }}</td>
        </tr>
        <tr>
          <th>Created by</th>
          <td>{{ $category->user->name }} | {{ $category->created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
  <h5 class='has-text-weight-bold mb-2 is-size-5'>Products</h5>
  <div class="table-container">
    <table class="table is-fullwidth is-bordered is-hoverable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Buying Price</th>
          <th>Selling Price</th>
          <th>Currency</th>
          <th>Description</th>
          <th>Created by</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $key => $product)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>
            {{ $product->name }}
            <figure class="image is-128x128">
              <img src="https://bulma.io/images/placeholders/128x128.png">
              {{-- <img src="/storage/{{ substr($product->image, 6) }}" alt="{{ $product->name }}"> --}}
            </figure>
          </td>
          <td>{{ $product->buying_price }}</td>
          <td>{{ $product->selling_price }}</td>
          <td class='is-uppercase'>{{ $product->currency }}</td>
          <td>{{ $product->description }}</td>
          <td><small>{{ $product->user->name }} <br> {{ $product->created_at }}</small></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $products->links() }}
</div>
@endsection
