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

                {{-- Customer --}}
                @if (hasAccessForManager('View Members'))
                    <li class="menu">
                        <a href="{{ route('customer.index') }}"
                            aria-expanded="{{ $route == 'customer.index' ? 'true' : 'false' }}"
                            class="{{ $route == 'customer.index' ? 'dropdown-toggle' : 'dropdown-toggle collapsed' }}"
                            style="text-decoration: none;">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span>Members</span>
                            </div>
                        </a>
                    </li>
                @endif


                @if (hasAccessForManager('Member Booking'))
                    <li class="menu">
                        <a href="{{ route('book-for-guest.index') }}"
                            aria-expanded="{{ $route == 'book-for-guest.index' ? 'true' : 'false' }}"
                            class="{{ $route == 'book-for-guest.index' ? 'dropdown-toggle' : 'dropdown-toggle collapsed' }}"
                            style="text-decoration: none;">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                    </rect>
                                    <line x1="8" y1="3" x2="8" y2="21"></line>
                                    <line x1="16" y1="3" x2="16" y2="21"></line>
                                    <line x1="3" y1="8" x2="21" y2="8"></line>
                                    <line x1="3" y1="16" x2="21" y2="16"></line>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>

                                <span>Book For Guest</span>
                            </div>
                        </a>
                    </li>
                @endif


                @if (hasAccessForManager('Add VIP Code'))
                    <li class="menu">
                        <a href="{{ route('vip-codes.index') }}"
                            aria-expanded="{{ $route == 'vip-codes.index' || $route == 'vip-codes.create' ? 'true' : 'false' }}"
                            class="{{ $route == 'vip-codes.index' || $route == 'vip-codes.create' ? 'dropdown-toggle' : 'dropdown-toggle collapsed' }}"
                            style="text-decoration: none;">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>


                                <span>VIP Codes</span>
                            </div>
                        </a>
                    </li>
                @endif





                </a>
                </li>


                {{-- Games --}}
                @if (hasAccessForManager('View Games'))
                    <li class="menu">
                        <a style="text-decoration: none;" href="#games" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M8.58 9 3 4.42a1.51 1.51 0 0 1 0-2.12L4.42 3M15.42 9 21 3.42a1.51 1.51 0 0 1 2.12 0L19 4.42M15.42 14.58 21 20.17a1.51 1.51 0 0 1 0 2.12L19 19.58M8.58 14.58 3 20.17a1.51 1.51 0 0 1-2.12 0L4.42 19.58M12 2V22" />
                                </svg>





                                <span>Games</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="{{ $route == 'games.index' || $route == 'games.play-times' ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}"
                            id="games" data-parent="#accordionExample">

                            <li class="{{ $route == 'games.index' ? 'active' : '' }}">
                                <a style="text-decoration: none;" href="{{ route('games.index') }}">Game List</a>
                            </li>

                            <li class="{{ $route == 'games.play-times' ? 'active' : '' }}">
                                <a style="text-decoration: none;" href="{{ route('games.play-times') }}">Play
                                    Times</a>
                            </li>

                        </ul>
                    </li>
                @endif


                {{-- Game Details --}}
                {{-- @if (hasAccessForManager('Add Game Details'))
                    <li class="menu">
                        <a style="text-decoration: none;" href="#gamesDetails" data-toggle="collapse"
                            aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                    </rect>
                                    <line x1="12" y1="8" x2="12" y2="16"></line>
                                    <line x1="8" y1="12" x2="16" y2="12"></line>
                                </svg>



                                <span>Home Section</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="{{ $route == 'game-details.index' || $route == 'game-details.edit' ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}"
                            id="gamesDetails" data-parent="#accordionExample">

                            <li class="{{ $route == 'game-details.index' ? 'active' : '' }}">
                                <a style="text-decoration: none;" href="{{ route('game-details.index') }}">Play With
                                    Us</a>
                            </li>

                        </ul>
                    </li>
                @endif --}}



                {{-- Setting --}}
                <li class="menu">
                    <a style="text-decoration: none;" href="#settings" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                        <div class="">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.8067 7.62361L20.1842 6.54352C19.6577 5.6296 18.4907 5.31432 17.5755 5.83872V5.83872C17.1399 6.09534 16.6201 6.16815 16.1307 6.04109C15.6413 5.91402 15.2226 5.59752 14.9668 5.16137C14.8023 4.88415 14.7139 4.56839 14.7105 4.24604V4.24604C14.7254 3.72922 14.5304 3.2284 14.17 2.85767C13.8096 2.48694 13.3145 2.27786 12.7975 2.27808H11.5435C11.037 2.27807 10.5513 2.47991 10.194 2.83895C9.83669 3.19798 9.63717 3.68459 9.63961 4.19112V4.19112C9.6246 5.23693 8.77248 6.07681 7.72657 6.0767C7.40421 6.07336 7.08846 5.98494 6.81123 5.82041V5.82041C5.89606 5.29601 4.72911 5.61129 4.20254 6.52522L3.53435 7.62361C3.00841 8.53639 3.3194 9.70261 4.23 10.2323V10.2323C4.8219 10.574 5.18653 11.2056 5.18653 11.8891C5.18653 12.5725 4.8219 13.2041 4.23 13.5458V13.5458C3.32056 14.0719 3.00923 15.2353 3.53435 16.1454V16.1454L4.16593 17.2346C4.41265 17.6798 4.8266 18.0083 5.31619 18.1474C5.80578 18.2866 6.33064 18.2249 6.77462 17.976V17.976C7.21108 17.7213 7.73119 17.6516 8.21934 17.7822C8.70749 17.9128 9.12324 18.233 9.37416 18.6717C9.5387 18.9489 9.62711 19.2646 9.63046 19.587V19.587C9.63046 20.6435 10.487 21.5 11.5435 21.5H12.7975C13.8505 21.5001 14.7055 20.6491 14.7105 19.5962V19.5962C14.7081 19.088 14.9089 18.6 15.2682 18.2407C15.6275 17.8814 16.1155 17.6807 16.6236 17.6831C16.9452 17.6917 17.2596 17.7798 17.5389 17.9394V17.9394C18.4517 18.4653 19.6179 18.1544 20.1476 17.2438V17.2438L20.8067 16.1454C21.0618 15.7075 21.1318 15.186 21.0012 14.6964C20.8706 14.2067 20.5502 13.7894 20.111 13.5367V13.5367C19.6718 13.284 19.3514 12.8666 19.2208 12.3769C19.0902 11.8873 19.1603 11.3658 19.4154 10.928C19.5812 10.6383 19.8214 10.3982 20.111 10.2323V10.2323C21.0161 9.70289 21.3264 8.54349 20.8067 7.63277V7.63277V7.62361Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <circle opacity="0.4" cx="12.175" cy="11.8891" r="2.63616"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                            <span>Settings</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="{{ $route == 'site-setting' || $route == 'change-password.index' || $route == 'manage-access.index' ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}"
                        id="settings" data-parent="#accordionExample">
                        @if (hasAccessForManager('Site Settings'))
                            <li class="{{ $route == 'site-setting' ? 'active' : '' }}">
                                <a style="text-decoration: none;" href="{{ route('site-setting') }}">Site
                                    Settings</a>
                            </li>
                        @endif

                        @if (auth()->user()->user_type == 'admin')
                            <li class="{{ $route == 'manage-access.index' ? 'active' : '' }}">
                                <a style="text-decoration: none;" href="{{ route('manage-access.index') }}">Access
                                    Settings</a>
                            </li>
                        @endif



                        <li class="{{ $route == 'change-password.index' ? 'active' : '' }}">
                            <a style="text-decoration: none;" href="{{ route('change-password.index') }}"> Password
                                Settings</a>
                        </li>

                    </ul>

                </li>


                {{-- Report --}}
                @if (hasAccessForManager('Cancel History') ||
                        hasAccessForManager('Booking History') ||
                        hasAccessForManager('Game Info') ||
                        hasAccessForManager('User Booking Info') ||
                        hasAccessForManager('Booking Status'))


                    <li class="menu">
                        <a style="text-decoration: none;" href="#report" data-toggle="collapse"
                            aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 3H3v18h18V3zm-2 14H5M5 7h14M10 11h4" />
                                </svg>



                                <span>Reports</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="{{ $route == 'booking-info.index' || $route == 'cancel-booking.index' || $route == 'game-report.index' || $route == 'user-booking-info.index' || $route == 'booking-status' ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}"
                            id="report" data-parent="#accordionExample">
                            @if (hasAccessForManager('Booking History'))
                                <li class="{{ $route == 'booking-info.index' ? 'active' : '' }}">
                                    <a style="text-decoration: none;"
                                        href="{{ route('booking-info.index') }}">Booking Info</a>
                                </li>
                            @endif

                            @if (hasAccessForManager('Booking Status'))
                                <li class="{{ $route == 'booking-status' ? 'active' : '' }}">
                                    <a style="text-decoration: none;" href="{{ route('booking-status') }}">
                                        Booking Status</a>
                                </li>
                            @endif

                            @if (hasAccessForManager('Cancel History'))
                                <li class="{{ $route == 'cancel-booking.index' ? 'active' : '' }}">
                                    <a style="text-decoration: none;"
                                        href="{{ route('cancel-booking.index') }}">Cancelled Booking Info</a>
                                </li>
                            @endif


                            @if (hasAccessForManager('Game Info'))
                                <li class="{{ $route == 'game-report.index' ? 'active' : '' }}">
                                    <a style="text-decoration: none;" href="{{ route('game-report.index') }}">Game
                                        Report</a>
                                </li>
                            @endif


                            @if (hasAccessForManager('User Booking Info'))
                                <li class="{{ $route == 'user-booking-info.index' ? 'active' : '' }}">
                                    <a style="text-decoration: none;"
                                        href="{{ route('user-booking-info.index') }}">User Booking Info</a>
                                </li>
                            @endif

                        </ul>

                    </li>
                @endif

        </nav>
    @endif
</div>
