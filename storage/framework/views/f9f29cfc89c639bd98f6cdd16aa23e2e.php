  <nav class="navbar navbar-expand-lg py-3">
      <div class="container">
          <div class="d-flex">
              <!-- Logo -->
              <div class="">
                  <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                      <img src="<?php echo e(asset('images/main-logo.png')); ?>" alt="Logo"
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
                      <a class="nav-link text-white menu-hover-effect <?php echo e(request()->is('/') ? 'active' : ''); ?>"
                          aria-current="page" href="<?php echo e(url('/')); ?>">Home</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0">
                      <a class="nav-link text-white menu-hover-effect <?php echo e(request()->is('pricing') ? 'active' : ''); ?>"
                          href="<?php echo e(route('pricing')); ?>">Pricing</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0">
                      <a class="nav-link text-white menu-hover-effect <?php echo e(request()->is('about-us') ? 'active' : ''); ?>"
                          href="<?php echo e(route('about')); ?>">About</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0">
                      <a class="nav-link text-white menu-hover-effect <?php echo e(request()->is('services') ? 'active' : ''); ?>"
                          href="<?php echo e(route('service')); ?>">Services</a>
                  </li>
                  <li class="nav-item ms-lg-4 ms-0">
                      <a class="nav-link text-white menu-hover-effect <?php echo e(request()->is('press') ? 'active' : ''); ?>"
                          href="<?php echo e(route('press')); ?>">Press</a>
                  </li>

                  <?php if(auth()->user()): ?>
                      <li class="nav-item ms-lg-4 ms-0">
                          <a class="nav-link text-white menu-hover-effect" href="<?php echo e(route('logout')); ?>"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                              href="#">Logout</a>

                          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                          </form>
                      </li>
                  <?php else: ?>
                      <li class="nav-item ms-lg-4 ms-0">
                          <a class="nav-link text-white menu-hover-effect" href="<?php echo e(route('login')); ?>">Login</a>
                      </li>
                  <?php endif; ?>

                  <?php if(auth()->guest()): ?>
                      <li class="nav-item ms-lg-4 ms-0">
                          <a class="nav-link text-white menu-hover-effect"
                              href="<?php echo e(route('register.tab')); ?>">Register</a>
                      </li>
                  <?php endif; ?>
                  <li class="nav-item ms-lg-4 ms-0 mt-lg-0 mt-3">
                      <a style="white-space: nowrap;" data-bs-toggle="modal" data-bs-target="#contactModal"
                          class="nav-link fw-semibold menu-button" href="#">lets
                          talk</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
<?php /**PATH C:\xampp\htdocs\strategicwebnew\resources\views/frontend/include/header_top.blade.php ENDPATH**/ ?>