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
                            <span>Customers</span>
                        </div>
                    </a>
                </li>

                {{-- articles menu item here --}}
                <li class="menu">
                    <a style="text-decoration: none;" href="#article" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 3H3v18h18V3zm-2 14H5M5 7h14M10 11h4" />
                            </svg>



                            <span>Articles</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="{{ $route == 'article.index' || $route == 'article.edit' || $route == 'article.create' ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}"
                        id="article" data-parent="#accordionExample">

                        <li class="{{ $route == 'article.index' ? 'active' : '' }}">
                            <a style="text-decoration: none;" href="{{ route('article.index') }}">Article List</a>
                        </li>

                        <li class="{{ $route == 'article.create' ? 'active' : '' }}">
                            <a style="text-decoration: none;" href="{{ route('article.create') }}">Create Article</a>
                        </li>

                    </ul>

                </li>


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
                                <circle opacity="0.4" cx="12.175" cy="11.8891" r="2.63616" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
                    <ul class="{{ $route == 'change-password.index' ? 'submenu list-unstyled collapse show' : 'collapse submenu list-unstyled' }}"
                        id="settings" data-parent="#accordionExample">
                        <li class="{{ $route == 'change-password.index' ? 'active' : '' }}">
                            <a style="text-decoration: none;" href="{{ route('change-password.index') }}"> Password
                                Settings</a>
                        </li>

                    </ul>

                </li>
        </nav>
    @endif
</div>
