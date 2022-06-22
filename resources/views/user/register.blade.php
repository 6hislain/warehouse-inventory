@extends('layouts.default')
@section('title', 'Register')

@section('content')
<div class="columns is-centered">
	<div class="column is-half">
		<div class="box">
			<form action="{{ route('user.save') }}" method='post'>
				<h3 class='is-size-3 has-text-weight-bold has-text-centered'>Register</h3>
				<div class="field">
				  <label class="label">Name</label>
				  <div class="control">
				    <input class="input @error('name') is-danger @enderror" type="text" name="name" placeholder="e.g Alex Smith" value="{{ old('name') }}">
				  </div>
			   	<p class="help is-danger">@error('name') {{ $message }} @enderror</p>
				</div>
				<div class="field">
				  <label class="label">Email</label>
				  <div class="control">
				    <input class="input @error('email') is-danger @enderror" type="email" name="email" placeholder="e.g. alexsmith@gmail.com" value="{{ old('email') }}">
				  </div>
				  <p class="help is-danger">@error('email') {{ $message }} @enderror</p>
				</div>
				<div class="field">
				  <label class="label">Password</label>
				  <div class="control">
				    <input class="input @error('password') is-danger @enderror" type="password" name="password">
				  </div>
				  <p class="help is-danger">@error('password') {{ $message }} @enderror</p>
				</div>
				<div class="field">
				  <label class="label">Confirm Password</label>
				  <div class="control">
				    <input class="input" type="password" name="password_confirmation">
				  </div>
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