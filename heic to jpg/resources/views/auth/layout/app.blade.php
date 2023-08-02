<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('auth/images/favicon.png') }}">
    <title>@yield('page_title')</title>
    <link href="{{ asset('auth/css/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">
</head>

<body class="skin-default card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">DH Web Admin</p>
        </div>
    </div>
    <section id="wrapper">
        <div class="login-register login-sidebar" style="background-image:url({{ asset('auth/images/login-register.jpg') }});">
            @yield('content')
        </div>
    </section>
    <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>
</html>