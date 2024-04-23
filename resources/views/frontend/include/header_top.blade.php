
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Navbar</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg py-3">
  <div class="container">

    <div class="d-flex justify-content-between">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/main-logo.png') }}" alt="Logo"
                class="d-inline-block align-top col-md-4 col-8">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
      </button>
    </div>

  <div class="collapse navbar-collapse bg-shadow justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav align-items-center">
        <li class="nav-item">
            <a class="nav-link text-white menu-hover-effect {{ request()->is('/') ? 'active' : '' }}"
                aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item ms-lg-4 ms-0">
            <a class="nav-link text-white menu-hover-effect {{ request()->is('pricing') ? 'active' : '' }}"
                href="{{ route('pricing') }}">Pricing</a>
        </li>
        <li class="nav-item ms-lg-4 ms-0">
            <a class="nav-link text-white menu-hover-effect {{ request()->is('about-us') ? 'active' : '' }}"
                href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item ms-lg-4 ms-0">
            <a class="nav-link text-white menu-hover-effect {{ request()->is('services') ? 'active' : '' }}"
                href="{{ route('service') }}">Services</a>
        </li>
        <li class="nav-item ms-lg-4 ms-0">
            <a class="nav-link text-white menu-hover-effect {{ request()->is('press') ? 'active' : '' }}"
                href="{{ route('press') }}">Press</a>
        </li>

        @if (auth()->user())
            <li class="nav-item ms-lg-4 ms-0">
                <a class="nav-link text-white menu-hover-effect" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    href="#">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        @else
            <li class="nav-item ms-lg-4 ms-0">
                <a class="nav-link text-white menu-hover-effect" href="{{ route('login') }}">Login</a>
            </li>
        @endif

        @if (auth()->guest())
            <li class="nav-item ms-lg-4 ms-0">
                <a class="nav-link text-white menu-hover-effect"
                    href="{{ route('register.tab') }}">Register</a>
            </li>
        @endif
        <li class="nav-item ms-lg-4 ms-0 mt-lg-0 mt-3">
            <a style="white-space: nowrap;" data-bs-toggle="modal" data-bs-target="#contactModal"
                class="nav-link fw-semibold menu-button" href="#">lets
                talk</a>
        </li>
    </ul>

   
  </div>
  </div>
</nav>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
