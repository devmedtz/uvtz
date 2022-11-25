<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MicroPay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

</head>
<!-- END Head-->
<!-- START: Body-->
<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- START: Main Content-->
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center">
                        <a href="index.html">
                            <span><img src="assets/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <p class="text-muted mb-4">Enter your email and password.</p>
                        </div>
                        <form action="{{ route('login') }}" method="POST" class="row row-eq-height lockscreen mb-5">
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <a href="#" class="text-muted float-end"><small>Forgot your password?</small></a>
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- START: Template JS-->

<footer class="footer footer-alt">
    © {{Carbon\Carbon::now()->format('Y')}} Microdata Ltd (+255 754 555 333)
</footer>

<!-- bundle -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>
<script src="{{ asset('assets/js/app.min.js')}}"></script>

<!-- END: Template JS-->
</body>
<!-- END: Body-->
</html>
