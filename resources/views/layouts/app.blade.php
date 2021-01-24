
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title Page-->
    <title>Tables</title>

    <!-- Fontfaces CSS -->
    <link href="{{ asset('style/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('style/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('style/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('style/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('style/css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ url('/home') }}">
                            <img src="{{ asset('style/images/icon/logo.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Events</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">List Events</a>
                                </li>
                                <li>
                                    <a href="index2.html">New Events Events</a>
                                </li>
                                <li>
                                    <a href="index3.html">Approval Events</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">

            <div class="logo">
                <div class="account-item">
                    <div class="image">
                        <a href="{{ route('home') }}">
                        <img src="{{ asset('style/images/icon/logo2.png') }}" alt="John Doe">
                    </a>
                    </div>
                    </div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('style/images/icon/logo.png') }}" alt="Cool Admin" />
                </a>
            </div>
            @guest
            @if (Route::has('login'))
                @if (Route::has('register'))
                    <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{ route('login') }}">
                            <i class="fas fa-tachometer-alt"></i>{{ __('Login') }}</a>
                            <a class="js-arrow" href="{{ route('register') }}">
                            <i class="fas fa-tachometer-alt"></i>{{ __('Register') }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
                @endif
            @endif
            @else
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Events</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ URL::to('event') }}">List Event</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('event/create') }}">Create Event</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('event/approval') }}">Approval Event</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            @endguest
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            @guest
                            </form>
                                @if (Route::has('login'))
                                @if (Route::has('register'))

                                 @endif
                                @endif
                                @else
                            </form>
                            <form class="form-header" action="" method="POST">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">

                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">

                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                        @yield('content')

            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('style/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('style/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('style/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('style/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('style/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('style/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('style/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('style/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('style/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('style/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('style/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('style/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('style/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('style/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
