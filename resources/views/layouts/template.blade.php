<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To Saintis</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset ("plugins/bootstrap/css/bootstrap.css") }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset ("plugins/node-waves/waves.css") }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset ("plugins/animate-css/animate.css") }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset ("plugins/morrisjs/morris.css") }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset ("css/style.css") }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset ("css/themes/all-themes.css") }}" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Sistem Informasi Saintis</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu"></ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset("images/user.png") }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} </div>
                    <div class="email"> {{ Auth::user()->username }} </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            @if (Auth::guard('manager')->check())
                            <li><a href="{{ url('profile-manager/'.Auth::user()->id)}}"><i class="material-icons">person</i>Profile</a></li>
                            @elseif (Auth::guard('siswa')->check())
                            <li><a href="{{ url('profile-siswa/'.Auth::user()->id)}}"><i class="material-icons">person</i>Profile</a></li>
                            @elseif (Auth::guard('admin')->check())
                            <li><a href="{{ url('profile-admin/'.Auth::user()->id)}}"><i class="material-icons">person</i>Profile</a></li>
                            @elseif (Auth::guard('guru')->check())
                            <li><a href="{{ url('profile-guru/'.Auth::user()->id)}}"><i class="material-icons">person</i>Profile</a></li>
                            @endif

                            <li role="seperator" class="divider"></li>
                            <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- #Menu -->
            <!-- Footer -->
            @include('layouts.footer')
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Body -->
            @yield('content')
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset ("plugins/jquery/jquery.min.js") }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset ("plugins/bootstrap/js/bootstrap.js") }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset ("plugins/bootstrap-select/js/bootstrap-select.js") }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset ("plugins/jquery-slimscroll/jquery.slimscroll.js") }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset ("plugins/node-waves/waves.js") }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset ("plugins/jquery-countto/jquery.countTo.js") }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset ("plugins/raphael/raphael.min.js") }}"></script>
    <script src="{{ asset ("plugins/morrisjs/morris.js") }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset ("plugins/chartjs/Chart.bundle.js") }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset ("plugins/flot-charts/jquery.flot.js") }}"></script>
    <script src="{{ asset ("plugins/flot-charts/jquery.flot.resize.js") }}"></script>
    <script src="{{ asset ("plugins/flot-charts/jquery.flot.pie.js") }}"></script>
    <script src="{{ asset ("plugins/flot-charts/jquery.flot.categories.js") }}"></script>
    <script src="{{ asset ("plugins/flot-charts/jquery.flot.time.js") }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset ("plugins/jquery-sparkline/jquery.sparkline.js") }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset ("js/admin.js") }}"></script>
<!--     <script src="{{ asset ("js/pages/index.js") }}"></script>
 -->
    <!-- Demo Js -->
    <script src="{{ asset ("js/demo.js") }}"></script>

    <script src="{{ asset('js/pages/charts/chartjs.js') }}"></script>
        
    @yield('customJS')
</body>

</html>