@extends('layouts.default')

@section('title', 'User')

@section('content')
<div class="columns is-centered">
  <div class="column is-8">
    <div class="box">
      <div class="table-container">
        <table class="table is-fullwidth is-striped is-hoverable">
          <tbody>
            <tr>
              <td colspan="2" class='has-text-centered'>
                {{ $user->name }}
                @if ($user->image)
                <figure class="image is-128x128 mx-auto my-2">
                  <img src="/storage/{{ substr($user->image, 6) }}" alt="{{ $user->name }}">
                </figure>
                @endif
              </td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th>Total categories</th>
              <td>{{ $category_count }}</td>
            </tr>
            <tr>
              <th>Total products</th>
              <td>{{ $product_count }}</td>
            </tr>
            <tr>
              <th>Total transactions</th>
              <td>{{ $transaction_count }}</td>
            </tr>
            <tr>
              <th>Biography</th>
              <td>{{ $user->bio }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
