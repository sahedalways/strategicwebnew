{{-- mobile menu --}}
<style>
    .collapse-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease-in-out;
    }

    .expand-menu {
        max-height: 500px;
        transition: max-height 0.5s ease-in-out;
    }
</style>

<div class="navbar navbar-expand-lg py-3 d-lg-none d-block">
    <div class="container">
        <div class="d-flex align-items-center">
            <!-- Logo -->
            <div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/main-logo.png') }}" alt="Logo"
                        class="d-inline-block align-top col-md-4 col-8">
                </a>
            </div>
           <!-- Toggler -->
            <button class="navbar-toggler shadow-none" type="button" onclick="toggleMenu()">
                <i id="menuIcon" class="fa fa-bars"></i>
            </button>

        </div>
        <!-- Menu -->
        <div class="collapse-menu bg-shadow justify-content-end" id="navbarNav">
            <div class="navbar-nav align-items-center py-3">
                <div class="nav-item">
                    <a class="nav-link text-white menu-hover-effect {{ request()->is('/') ? 'active' : '' }}"
                        aria-current="page" href="{{ url('/') }}">Home</a>
                </div>
                <div class="nav-item ms-lg-4 ms-0">
                    <a class="nav-link text-white menu-hover-effect {{ request()->is('about-us') ? 'active' : '' }}"
                        href="{{ route('about') }}">About</a>
                </div>
                <div class="nav-item ms-lg-4 ms-0">
                    <a class="nav-link text-white menu-hover-effect {{ request()->is('services') ? 'active' : '' }}"
                        href="{{ route('service') }}">Services</a>
                </div>
                <div class="nav-item ms-lg-4 ms-0">
                    <a class="nav-link text-white menu-hover-effect {{ request()->is('pricing') ? 'active' : '' }}"
                        href="{{ route('pricing') }}">Pricing</a>
                </div>
               
           
                <div class="nav-item ms-lg-4 ms-0">
                    <a class="nav-link text-white menu-hover-effect {{ request()->is('press') ? 'active' : '' }}"
                        href="{{ route('press') }}">Press</a>
                </div>

                @if (auth()->user())
                    <div class="nav-item ms-lg-4 ms-0">
                        <a class="nav-link text-white menu-hover-effect" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            href="#">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="nav-item ms-lg-4 ms-0">
                        <a class="nav-link text-white menu-hover-effect" href="{{ route('login') }}">Login</a>
                    </div>
                @endif

                @if (auth()->guest())
                    <div class="nav-item ms-lg-4 ms-0">
                        <a class="nav-link text-white menu-hover-effect"
                            href="{{ route('register.tab') }}">Register</a>
                    </div>
                @endif
                <div class="nav-item ms-lg-4 ms-0 mt-lg-0 mt-3">
                    <a style="white-space: nowrap;" data-bs-toggle="modal" data-bs-target="#contactModal"
                        class="nav-link fw-semibold menu-button" href="#">lets
                        talk</a>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function toggleMenu() {
        var menu = document.getElementById('navbarNav');
        var icon = document.getElementById('menuIcon');
        
        if (menu.classList.contains('expand-menu')) {
            // Menu is currently expanded, collapse it
            menu.classList.remove('expand-menu');
            // Revert icon to hamburger
            icon.classList.remove('fa-times'); // Remove Font Awesome cross icon class
            icon.classList.add('fa', 'fa-bars'); // Add Font Awesome bars icon classes
        } else {
            // Menu is currently collapsed, expand it
            menu.classList.add('expand-menu');
            // Change icon to cross
            icon.classList.remove('fa-bars'); // Remove Font Awesome bars icon class
            icon.classList.add('fa', 'fa-times'); // Add Font Awesome cross icon classes
        }
    }
</script>








{{-- desktop menu --}}


<nav class="navbar navbar-expand-lg py-3 d-lg-block d-none">
    <div class="container">
        <div class="d-flex">
            <!-- Logo -->
            <div class="">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/main-logo.png') }}" alt="Logo"
                        class="d-inline-block align-top col-xl-6 col-lg-10 col-8">
                </a>
            </div>
            <!-- Toggler -->
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!-- Menu -->
        <div class="collapse navbar-collapse bg-shadow justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white menu-hover-effect {{ request()->is('/') ? 'active' : '' }}"
                        aria-current="page" href="{{ url('/') }}">Home</a>
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
                    <a class="nav-link text-white menu-hover-effect {{ request()->is('pricing') ? 'active' : '' }}"
                        href="{{ route('pricing') }}">Pricing</a>
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