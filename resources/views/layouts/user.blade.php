<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>@yield('title', env('APP_NAME'))</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		@yield('styles')
	</head>
	<body class='has-background-white-ter'>
		<main class='container is-fullhd m-3'>
			<div class="columns is-multiline is-centered">
				<div class="column is-2">
					<div class="box">
						<h5 class='has-text-weight-bold has-text-centered mb-2 is-size-5'>{{ auth()->user()->name }}</h5>
						<aside class="menu">
						  <p class="menu-label">
						    General
						  </p>
						  <ul class="menu-list">
						    <li><a href='{{ route("home") }}'>Home</a></li>
						    <li>
                                <a href='{{ route("dashboard") }}' class='@if (app()->view->getSections()["title"] == "Dashboard") is-active @endif'>Dashboard</a>
                            </li>
						  </ul>
						  <p class="menu-label">
						    Administration
						  </p>
						  <ul class="menu-list">
						    <li>
                                <a href="{{ route('product.index') }}" class='@if (app()->view->getSections()["title"] == "All Products") is-active @endif'>Product</a>
                            </li>
						    <li>
                                <a href="{{ route('category.index') }}" class='@if (app()->view->getSections()["title"] == "All Categories") is-active @endif'>Category</a>
                            </li>
						    <li>
                                <a href="{{ route('transaction.index') }}" class='@if (app()->view->getSections()["title"] == "All Transactions") is-active @endif'>Transaction</a>
                            </li>
						  </ul>
						  <p class="menu-label">
						    More
						  </p>
						  <ul class="menu-list">
						    <li><a href="{{ route('user.edit', auth()->user()->id) }}">Settings</a></li>
						    <li><a href="{{ route('user.show', auth()->user()->id) }}">User profile</a></li>
						    <li><a href='{{ route("logout") }}'>Log out</a></li>
						  </ul>
						</aside>
					</div>
				</div>
				<div class="column">@yield('content')</div>
			</div>
		<main>
		<script src="{{ asset('js/app.js') }}"></script>
		@yield('scripts')
	</body>
</html>
