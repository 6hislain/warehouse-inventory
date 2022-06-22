@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="box">
  <div class='is-flex is-flex-direction-row is-justify-content-space-between'>
    <h5 class='has-text-weight-bold mb-2 is-size-5'>Settings</h5>
    <a href="{{ route('user.show', auth()->user()->id) }}" class="button is-primary is-small">User Profile</a>
  </div>
  <form action="{{ route('user.update', auth()->user()->id) }}" method='post' enctype="multipart/form-data">
    @method('put')
    <div class="columns is-multiline">
      <div class="column is-4">
        <label class="label">Name</label>
        <div class="control">
          <input class="input @error('name') is-danger @enderror" type="text" name="name" value="{{ auth()->user()->name }}">
        </div>
         <p class="help is-danger">@error('name') {{ $message }} @enderror</p>
      </div>
      <div class="column is-4">
        <label class="label">Email</label>
        <div class="control">
          <input class="input @error('email') is-danger @enderror" type="email" name="email" value="{{ auth()->user()->email }}">
        </div>
         <p class="help is-danger">@error('email') {{ $message }} @enderror</p>
      </div>
      <div class="column is-4">
        <label class="label">Profile Picture</label>
        <div class="control">
          <div class="file">
            <label class="file-label">
              <input class="file-input" type="file" name="image" accept="image/*">
              <span class="file-cta">
                <span class="file-icon">&#10595;</span>
                <span class="file-label">
                  Choose a file…
                </span>
              </span>
            </label>
          </div>
        </div>
        <p class="help is-danger">@error('image') {{ $message }} @enderror</p>
      </div>
      <div class="column is-12">
        <label class="label">Bio</label>
        <div class="control">
          <textarea name="bio" rows="4" class="textarea @error('bio') is-danger @enderror">{{ old('bio') }}</textarea>
        </div>
        <p class="help is-danger">@error('bio') {{ $message }} @enderror</p>
      </div>
      <div class="column is-6 field">
        @csrf
        <button type='submit' class="button is-info">Continue</button>
      </div>
    </div>
  </form>
</div>
@endsection
