@extends('layouts.default')
@section('title', 'Login')

@section('content')
<div class="columns is-centered">
	<div class="column is-half">
		<div class="box">
			<form action="{{ route('authenticate') }}" method='post' autocomplete="off">
				<h3 class='is-size-3 has-text-weight-bold has-text-centered'>Login</h3>
				<div class="field">
				  <label class="label">Email</label>
				  <div class="control">
				    <input class="input" type="email" name="email" value="{{ old('email') }}">
				  </div>
			   	<p class="help is-danger">@error('email') {{ $message }} @enderror</p>
				</div>
				<div class="field">
				  <label class="label">Password</label>
				  <div class="control">
				    <input class="input" type="password" name="password">
				  </div>
			   	<p class="help is-danger">@error('password') {{ $message }} @enderror</p>
				</div>
				<div class="field">
					@csrf
					<button type='submit' class="button is-info">Continue</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection