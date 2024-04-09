<div class="sidebar-wrapper sidebar-theme">


    @if (in_array(auth()->user()->user_type, ['admin', 'manager']))
        @php
            $prefix = Request::route()->getPrefix();
            $route = Route::current()->getName();
        @endphp

        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                {{-- Dashboard --}}
                <li class="menu">
                    <a style="text-decoration: none;" href="{{ route('dashboard') }}"
                        aria-expanded="{{ $route == 'dashboard' ? 'true' : 'false' }}"
                        class="{{ $route == 'dashboard' ? 'dropdown-toggle' : 'dropdown-toggle collapsed' }}">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

                </a>
                </li>

                {{-- for customers --}}
                <li class="menu">
                    <a href="{{ route('customer.index') }}"
                        aria-expanded="{{ $route == 'customer.index' ? 'true' : 'false' }}"
                        class="{{ $route == 'customer.index' ? 'dropdown-toggle' : 'dropdown-toggle collapsed' }}"
                        style="text-decoration: none;">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-users">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Members</span>
                        </div>
                    </a>
                </li>

        </nav>
    @endif
</div>
