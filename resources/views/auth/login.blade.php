<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>M| PAY</title>
        <link rel="shortcut icon" href="dist/images/favicon.ico" />
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- START: Template CSS-->
        <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.theme.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/simple-line-icons/css/simple-line-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/flags-icon/css/flag-icon.min.css')}}">

        <!-- END Template CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet" href="{{ asset('dist/vendors/social-button/bootstrap-social.css')}}"/>
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="{{ asset('dist/css/main.css')}}">
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->
    <!-- START: Body-->
    <body id="main-container" class="default">
        <!-- START: Main Content-->
        <div class="container">
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12">
                    <form action="{{ route('login') }}" method="POST" class="row row-eq-height lockscreen  mt-5 mb-5">
                        @csrf
                        <div class="lock-image col-12 col-sm-5"></div>
                        <div class="login-form col-12 col-sm-7">
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-secondary" type="submit"> Log In </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END: Content-->

        <!-- START: Template JS-->
        <script src="{{ asset('dist/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/moment/moment.js')}}"></script>
        <script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <!-- END: Template JS-->
    </body>
    <!-- END: Body-->
</html>
