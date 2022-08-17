<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nusa Akses | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset("images/logo/logo3.png") }}">

        
        <!-- App css -->
        <link href="{{ asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/css/app.min.css") }}" rel="stylesheet" type="text/css" id="app-style"/>
    </head>
    
    <body class="loading" data-layout-config='{"darkMode":false}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            @yield('content')
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2022 - <script>document.write(new Date().getFullYear())</script> © Willy kurniawan
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        @include('sweetalert::alert')

    </body>
</html>
