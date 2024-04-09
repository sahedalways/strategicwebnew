  <nav class="navbar navbar-expand-lg py-3">
      <div class="container">
          <div class="d-flex">
              <!-- Logo -->
              <div class="">
                  <a class="navbar-brand" href="#">
                      <img src="{{ asset('images/main-logo.png') }}" alt="Logo"
                          class="d-inline-block align-top col-md-3 col-10">
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
                      <a class="nav-link text-white menu-hover-effect active" aria-current="page"
                          href="home.html">Home</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0">
                      <a class="nav-link text-white menu-hover-effect" href="about.html">About</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0">
                      <a class="nav-link text-white menu-hover-effect" href="service.html">Services</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0">
                      <a class="nav-link text-white menu-hover-effect" href="press.html">Press</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0 mt-lg-0 mt-3">
                      <a style="white-space: nowrap;" data-bs-toggle="modal" data-bs-target="#contactModal"
                          class="nav-link fw-semibold menu-button" href="#">lets
                          talk</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  {{-- contact form below --}}
  @include('frontend.components._contact_form_modal')
