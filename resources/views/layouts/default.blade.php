<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', env('APP_NAME'))</title>
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    @yield('styles')
  </head>
  <body class='has-background-white-ter'>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item is-uppercase has-text-weight-bold" href="{{ route('home') }}">
          {{ env('APP_NAME') }}
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="{{ route('home') }}">
            Home
          </a>
          <a class="navbar-item" href="{{ route('home') }}#features">
            Features
          </a>
          <a class="navbar-item" href="{{ route('about') }}">
            About
          </a>
          <a class="navbar-item" href="{{ route('stats') }}">
            Stats
          </a>

          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Contact
            </a>
            <div class="navbar-dropdown">
              <a class="navbar-item" target='_blank' href="https://warehouse1nventory.herokuapp.com">
                Demo
              </a>
              <a class="navbar-item" target='_blank' href="https://github.com/6hislain/warehouse-inventory">
                GitHub
              </a>
              <hr class="navbar-divider">
              <a class="navbar-item" target='_blank' href="https://bio.link/6hislain">
                Author
              </a>
            </div>
          </div>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              @auth
              <a class="button is-info" href="{{ route('dashboard') }}">
                Dashboard
              </a>
              <a class="button is-light" href="{{ route('logout') }}">
                Log out
              </a>
              @else
              <a class="button is-info" href="{{ route('register') }}">
                Register
              </a>
              <a class="button is-light" href="{{ route('login') }}">
                Log in
              </a>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </nav>

    <main class='container my-4'>
      <div class='mx-3'>@yield('content')</div>
    <main>

    <script src="{{ secure_asset('js/app.js') }}"></script>
    @yield('scripts')
  </body>
</html>
