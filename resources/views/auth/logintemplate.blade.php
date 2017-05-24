<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Sistem Infromasi Saintis</title>
    <!-- Favicon-->
<!--     <link rel="icon" href="../../favicon.ico" type="image/x-icon">
 -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset ('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset ("plugins/node-waves/waves.css") }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset ("plugins/animate-css/animate.css") }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset ("css/style.css") }}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Sistem Informasi<b> Saintis</b></a>
            @yield('user')
        </div>
        <div class="card">
            <div class="body">
                 @yield('content')
             </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset ("plugins/jquery/jquery.min.js") }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset ("plugins/bootstrap/js/bootstrap.js") }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset ("plugins/node-waves/waves.js") }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset ("plugins/jquery-validation/jquery.validate.js") }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset ("js/admin.js") }}"></script>
    <script src="{{ asset ("js/pages/examples/sign-in.js") }}"></script>
</body>

</html>