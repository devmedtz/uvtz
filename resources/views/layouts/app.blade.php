<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>M | PAY</title>
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
        <link rel="stylesheet" href="{{ asset('dist/css/main.css')}}">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{--        <link rel="stylesheet" href="{{ asset('dist/vendors/chartjs/Chart.min.css')}}">--}}
        <!-- END: Page CSS-->

        <!-- START: Page CSS-->
        <link rel="stylesheet" href="{{ asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('dist/vendors/morris/morris.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/weather-icons/css/pe-icon-set-weather.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/chartjs/Chart.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/starrr/starrr.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/ionicons/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/toastr/toastr.min.css')}}"/>
        <link rel="stylesheet" href="{{ asset('dist/vendors/sweetalert/sweetalert.css')}}">
        <link rel="stylesheet" href="{{ asset('dist/vendors/quill/quill.snow.css')}}" />
        <!-- END: Page CSS-->

        @livewireStyles
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="semi-dark">

        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <div class="loader"></div>
        </div>
        <!-- END: Pre Loader-->

        <!-- START: Header-->
        @include('layouts.partials.header')
        <!-- END: Header-->

        <!-- START: Main Menu-->
        @include('layouts.partials.sidebar')
        <!-- END: Main Menu-->

        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                {{$slot}}
            </div>
        </main>
        <!-- END: Content-->
        <!-- START: Footer-->
        @include('layouts.partials.footer')
        <!-- END: Footer-->


        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END: Back to top-->


        <!-- START: Template JS-->
        <script src="{{ asset('dist/vendors/jquery/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/moment/moment.js')}}"></script>
        <script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <!-- END: Template JS-->

        <!-- START: APP JS-->
        <script src="{{ asset('dist/js/app.js')}}"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="{{ asset('dist/vendors/raphael/raphael.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/morris/morris.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/chartjs/Chart.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/starrr/starrr.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.canvaswrapper.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.colorhelpers.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.saturated.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.browser.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.drawSeries.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.uiConstants.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.legend.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.pie.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js')}}"></script>
        <script src="{{ asset('dist/vendors/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{ asset('dist/vendors/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/jszip/jszip.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.flash.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('dist/vendors/sweetalert/sweetalert.min.js')}}"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <script src="{{ asset('dist/js/home.script.js')}}"></script>
        <script src="{{ asset('dist/js/datatable.script.js')}}"></script>
        <script src="{{ asset('dist/vendors/toastr/toastr.min.js')}}"></script>
        <script src="{{ asset('dist/js/toastr.script.js')}}"></script>
        <script src="{{ asset('dist/vendors/quill/quill.min.js')}}"></script>
        <script src="{{ asset('dist/js/mail.script.js')}}"></script>
        <script src="{{ asset('dist/vendors/jquery-inputmask/jquery.inputmask.min.js')}}"></script>
        <script src="{{ asset('dist/js/inputmask.script.js')}}"></script>
        <script src="{{ asset('dist/js/chartjs.script.js')}}"></script>
        <script src="{{ asset('dist/js/app.filemanager.js')}}"></script>
        <!-- END: Page JS-->

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
        @livewireScripts
    </body>
    <!-- END: Body-->
</html>
