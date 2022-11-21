<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>M-Pay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- third party css -->
        <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
        <link href="{{ asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">

        <livewire:scripts/>
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- START: Left SideBar-->
            @include('layouts.partials.sidebar')
            <!-- END: Left SideBar-->
            <div class="content-page">
                <div class="content">
                    <!-- START: Header-->
                    @include('layouts.partials.header')
                    <!-- END: Header-->

                    <!-- Start Page Content-->
                    <div class="container-fluid">
                        {{$slot}}
                    </div>
                </div>

                <!-- START: Footer-->
                @include('layouts.partials.footer')
                <!-- END: Footer-->
            </div>
            <!-- END: Content-->
        </div>
        <!-- END wrapper -->

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="{{ asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{ asset('assets/js/app.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js end -->
        <!-- Typehead -->
        <script src="{{ asset('assets/js/vendor/handlebars.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/typeahead.bundle.min.js')}}"></script>

        <!-- demo app -->
        <script src="{{ asset('assets/js/pages/demo.dashboard.js')}}"></script>
        <script src="{{ asset('assets/js/pages/demo.typehead.js')}}"></script>
        <!-- end demo js-->
        <!-- Timepicker -->
        <script src="{{ asset('assets/js/pages/demo.timepicker.js')}}"></script>

        <!-- END: Page JS-->
        @stack('js')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('success', event => {
                Swal.fire(
                    'Success !',
                    event.detail.message,
                    'success'
                )
            })
            window.addEventListener('fail', event => {
                Swal.fire(
                    'Failed!',
                    event.detail.message,
                    'error'
                )
            })
            window.addEventListener('show-form', event => {
                $('#form').modal('show');
            })
            window.addEventListener('hide-form', event => {
                $('#form').modal('hide');
                Swal.fire(
                    'Success!',
                    event.detail.message,
                    'success'
                )
            })
            window.addEventListener('show-delete-modal', event => {
                $('#deleteConfirmation').modal('show');
            })
            window.addEventListener('hide-delete-modal', event => {
                $('#deleteConfirmation').modal('hide');
                Swal.fire(
                    'Success!',
                    event.detail.message,
                    'success'
                )
            })
            window.addEventListener('show-form1', event => {
                $('#form1').modal('show');
            })
            window.addEventListener('hide-form1', event => {
                $('#form1').modal('hide');
                Swal.fire(
                    'Success!',
                    event.detail.message,
                    'success'
                )
            })
            window.addEventListener('show-form2', event => {
                $('#form2').modal('show');
            })
            window.addEventListener('hide-form2', event => {
                $('#form2').modal('hide');
                Swal.fire(
                    'Success!',
                    event.detail.message,
                    'success'
                )
            })
            window.addEventListener('show-form3', event => {
                $('#form3').modal('show');
            })
            window.addEventListener('hide-form3', event => {
                $('#form3').modal('hide');
                Swal.fire(
                    'Success!',
                    event.detail.message,
                    'success'
                )
            })
            window.addEventListener('show-form4', event => {
                $('#form4').modal('show');
            })
            window.addEventListener('hide-form4', event => {
                $('#form4').modal('hide');
                Swal.fire(
                    'Success!',
                    event.detail.message,
                    'success'
                )
            })
            window.addEventListener('show-checkoutModal', event => {
                $('#checkoutModal').modal('show');
            })
            window.addEventListener('hide-checkoutModal', event => {
                $('#checkoutModal').modal('hide');
                Swal.fire(
                    'Success!',
                    event.detail.message,
                    'success'
                )
            })
        </script>
        <livewire:scripts/>
    </body><!-- END: Body-->
</html>
