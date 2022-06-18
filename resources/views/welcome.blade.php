@extends('layouts.default')

@section('content')
<div class="columns is-centered is-multiline">
    <div class="column is-half my-auto">
        <div class="content">
            <h1 class='is-size-1'>Keep a warehouse inventory with ease</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic in, consequuntur animi fugit, dignissimos autem, ipsa numquam cupiditate tenetur alias quae, quasi exercitationem. Ducimus excepturi neque officia temporibus, et minus?</p>
            <a href="{{ route('about') }}" class="button is-info is-rounded">Learn More</a>
        </div>
    </div>
    <div class="column is-half">
        <img src="{{ asset('img/give.svg') }}" alt="Adults giving gift to child" class='is-fullwidth'>
    </div>
    <div class="column is-12 content has-text-centered py-1">
        <h1 id='features' class='my-1'>Features</h1>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>Product</h4>
            <img src="{{ asset('img/take-notes.svg') }}" alt="Take notes" class='is-fullwidth'>
        </div>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>Stock Movement</h4>
            <img src="{{ asset('img/point-to-note.svg') }}" alt="Point to note" class='is-fullwidth'>
        </div>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>Category</h4>
            <img src="{{ asset('img/raise-hand.svg') }}" alt="Raise hand" class='is-fullwidth'>
        </div>
    </div>
    <div class="column is-3">
        <div class="box content has-text-centered">
            <h4>User Acccess</h4>
            <img src="{{ asset('img/agree.svg') }}" alt="Agree" class='is-fullwidth'>
        </div>
    </div>
</div>
@endsection