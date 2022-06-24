@extends('layouts.default')

@section('content')
<div class="columns is-centered is-multiline">
    <div class="column is-half my-auto">
        <div class="content">
            <h1 class='is-size-1'>Keep a warehouse inventory with ease</h1>
            <p>This is a demo project, with minimum functionalities. It is built using Laravel 9 and Bulma CSS. It has four tables: user, product, category, and transaction - each user is able to see and manage his or her own content</p>
            <a href="{{ route('about') }}" class="button is-info is-rounded">Learn More</a>
        </div>
    </div>
    <div class="column is-half">
        <img src="{{ secure_asset('img/give.svg') }}" alt="Adults giving gift to child" class='is-fullwidth'>
    </div>
    <div class="column is-12 content has-text-centered py-1">
        <h1 id='features' class='my-1'>Features</h1>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>Manage Products</h4>
            <img src="{{ secure_asset('img/take-notes.svg') }}" alt="Take notes" class='is-fullwidth'>
        </div>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>Stock Movement</h4>
            <img src="{{ secure_asset('img/point-to-note.svg') }}" alt="Point to note" class='is-fullwidth'>
        </div>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>Categorize</h4>
            <img src="{{ secure_asset('img/raise-hand.svg') }}" alt="Raise hand" class='is-fullwidth'>
        </div>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>User Acccess</h4>
            <img src="{{ secure_asset('img/agree.svg') }}" alt="Agree" class='is-fullwidth'>
        </div>
    </div>
    <div class="colum is-12 content pt-6 pb-2">
        <p class='has-text-weight-bold has-text-centered'>&copy; {{ date('Y') }} Warehouse Inventory</p>
    </div>
</div>
@endsection
