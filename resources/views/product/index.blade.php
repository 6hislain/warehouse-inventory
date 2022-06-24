@extends('layouts.admin')

@section('title', 'All Products')

@section('content')
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item has-text-weight-bold" href="{{ route('product.index') }}">
      All Products
    </a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-end">
      <div class="navbar-item">
        <a class="button is-primary is-small" href="{{ route('product.create') }}">
          New Product
        </a>
      </div>
    </div>
  </div>
</nav>

<div class="columns is-multiline is-centered my-3">
  @foreach ($products as $product)
  <div class="column is-3">
    <div class="card">
      <div class="card-image">
        <figure class="image is-3by2">
          <img src="https://bulma.io/images/placeholders/128x128.png">
          {{-- <img src="/storage/{{ substr($product->image, 6) }}" alt="{{ $product->name }}"> --}}
        </figure>
      </div>
      <div class="card-content p-3">
        <p class='title is-6 my-1'>{{ $product->name }}</p>
        <p class='subtitle is-6 my-1'>
          {{ $product->buying_price }} ~ {{ $product->selling_price }}
          <span class="is-uppercase">{{ $product->currency }}</span>
        </p>
        <p class='is-size-7 mt-1'>{{ $product->description }}</p>
      </div>
      <footer class="card-footer">
        <a href="{{ route('product.show', $product->id) }}" class="card-footer-item">View</a>
        <a href="{{ route('product.edit', $product->id) }}" class="card-footer-item">Edit</a>
        <form action="{{ route('product.destroy', $product->id) }}" method='post' class='is-inline my-auto'>
          @method('delete')
          @csrf
          <button type='submit' class="button is-ghost card-footer-item">Delete</button>
        </form>
      </footer>
    </div>
  </div>
  @endforeach
</div>

{{ $products->links() }}
@endsection
