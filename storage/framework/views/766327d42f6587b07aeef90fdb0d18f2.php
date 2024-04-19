<?php $__env->startSection('title', 'Strategic Web - Login'); ?>
<?php $__env->startSection('content'); ?>

    <style>
         .form-group input {
        /* background: #ededed; */
    }

    .full-height-center-content {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-body {
        background: white;
    }

    .nav-link {
        background: #3f51b5;
        color: #fff !important;
    }

    .nav-link.active:before {
        display: block;
        content: "";
        width: 100%;
        height: 2px;
        bottom: 5px;
        left: 0;
        bottom: -1px;
        z-index: 0;
        position: absolute;
        background: #3f51b5;
        transition: all 0.3s ease-in-out;
    }

    .nav-link.active {
        background: #E6E6FA !important;
        color: #fff !important;
        -webkit-text-fill-color: #4169E1 !important;
    }

    .nav-link {
        color: #fff;
    }

    .custom-button-style {
        background: #6c5ce7;
        color: #fff;
    }

    .custom-button-style:hover {
        background: #5347b3;
        color: #fff;
    }


    a.custom-link {
        color: gray;
    }

    a.custom-link:hover {
        color: black;
    }

    h4.primary-text-color {
        color: #6c5ce7;
    }

    .form-group input {
        /* background: #809f86; */
    }
    </style>

    <div style="background: #ededed;" class="full-height-center-content">

        <div class="row justify-content-center align-items-center w-100 my-5">
            
            <div class="col-md-6">
                <?php if(session('message')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body p-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item me-1">
                                <a class="nav-link<?php echo e(request()->routeIs('login') ? ' active' : ''); ?>" id="top-profile-tab"
                                    id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                                    aria-selected="<?php echo e(request()->routeIs('login') ? 'true' : 'false'); ?>">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php echo e(request()->routeIs('register.tab') ? ' active' : ''); ?>"
                                    id="register-tab" data-toggle="tab" href="#register" role="tab"
                                    aria-controls="register"
                                    aria-selected="<?php echo e(request()->routeIs('register.tab') ? 'true' : 'false'); ?>">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade <?php echo e(request()->routeIs('login') ? ' show active' : ''); ?>"
                                id="login" role="tabpanel" aria-labelledby="login-tab">
                                <form id="loginForm" class="custom-form-bg w-100" method="POST"
                                    data-action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="p-3 py-2">
                                        <div class="d-flex w-100 align-items-center justify-content-between">
                                            <h4 class="primary-text-color"><?php echo e(__('Login')); ?></h4>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="px-4 py-2">
                                            <label class="fw-semibold primary-text-color form-label"
                                                for="email">Email</label>
                                            <input id="email" type="email"
                                                class="p-2 form-control w-100  no-outline <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email"
                                                autofocus placeholder="Type email address">
                                        </div>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="px-4 invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div id="email_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class=" px-4 py-2">
                                            <label class="fw-semibold form-label primary-text-color"
                                                for="password">Password</label>
                                            <input placeholder="Type password" id="password" type="password"
                                                class="p-2 form-control w-100  no-outline <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="password" required autocomplete="current-password">
                                        </div>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="px-4 invalid-feedback" role="alert"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div id="password_error" class="error-message text-center"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="px-4 py-2">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me">
                                        <label class="form-check-label" for="remember_me">
                                            Remember me
                                        </label>
                                        </div>

                                        </div>
                                    </div>
                                    <div class="text-center my-4">
                                        <button id="login-btn" type="button"
                                            class="btn custom-button-style col-md-5 col-8 py-2">Login now</button>
                                    </div>

                                    <div class="text-center my-4"><button hidden disabled type="button"
                                            class="btn custom-button-style col-md-5 col-8 py-2" id="loadingSubmittingBtn"> <i
                                                class="fa fa-spinner fa-spin me-3"></i>
                                            Loging</button></div>

                                    <div class="text-center">
                                        <a class="custom-link" href="<?php echo e(route('password.request')); ?>">Forgot password?</a>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade <?php echo e(request()->routeIs('register.tab') ? ' show active' : ''); ?>"
                                id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form id="registerForm" method="POST" data-action="<?php echo e(route('register')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="p-3 py-2">

                                        <h4 class="primary-text-color">Register</h4>

                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="name">Name</label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="" required autocomplete="name" autofocus
                                                placeholder="Type your name">
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div id="name_error" class="error-message text-center"></div>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="registerEmail">Email</label>
                                            <input id="registerEmail" type="email" class="form-control"
                                                name="registerEmail" value="" required autocomplete="email"
                                                autofocus placeholder="Type email address">
                                            <?php $__errorArgs = ['registerEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div id="register_email_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="Phone-No">Phone No</label>
                                            <input class="form-control" name="phone_number" value=""
                                                type="number" id="phone_number" placeholder="Type phone number">
                                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div id="phone_number_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="password">Password</label>
                                            <input placeholder="Type password" id="registerPassword" value=""
                                                type="password" class="form-control" name="registerPassword" required
                                                autocomplete="new-password">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div id="register_password_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="con-password">Confirm
                                                Password</label>
                                            <input id="password_confirmation" type="password" class="form-control"
                                                value="" name="password_confirmation" required
                                                autocomplete="new-password" placeholder="Type confirm password">
                                        </div>
                                        <div id="confirm_password_error" class="error-message text-center"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group px-4 py-2">
                                            <label class="form-label primary-text-color" for="gender">Gender</label>
                                            <select name="gender" id="gender"
                                                class="form-control">
                                                <option value="" disabled>Select your gender</option>
                                                <option selected value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>


                                    <div class="text-center my-4">
                                        <button type="button" class="btn custom-button-style col-md-5 col-8 py-2"
                                            id="register-btn">Register now</button>
                                    </div>

                                    <div class="text-center my-4">
                                        <button hidden disabled type="button"
                                            class="btn custom-button-style col-md-5 col-8 py-2" id="loadingRegisteringBtn">
                                            <i class="fa fa-spinner fa-spin me-3"></i> Registering
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="<?php echo e(asset('/user_assets')); ?>/js/login.js"></script>
        <script src="<?php echo e(asset('/user_assets')); ?>/js/register.js"></script>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\strategicwebnew\resources\views/auth/login.blade.php ENDPATH**/ ?>