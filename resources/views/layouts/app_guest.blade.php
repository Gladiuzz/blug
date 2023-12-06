<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Reader | Hugo Personal Blog Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('guest/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/plugins/slick/slick.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('guest/css/style.css') }}" media="screen">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <meta property="og:title" content="Blog Website" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>

<body>
    <!-- navigation -->
    <header class="navigation fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand order-1" href="{{ route('landing-page') }}">
                    <img class="img-fluid" width="100px" src="{{ asset('guest/images/logo.png') }}" alt="Blog Icon">
                </a>
                <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">About</a>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ Auth::user()->name }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="order-2 order-lg-3 d-flex align-items-center">

                    <!-- search -->
                    <form class="search-bar" method="GET" action="{{ route('blog') }}">
                        <input id="search-query" name="search" type="search"  placeholder="Type &amp; Hit Enter...">
                    </form>

                    <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                        data-target="#navigation">
                        <i class="ti-menu"></i>
                    </button>
                </div>

            </nav>
        </div>
    </header>
    <!-- /navigation -->


    @yield('content')

    @include('includes.footer_guest')

    <!-- JS Plugins -->
    <script src="{{ asset('guest/plugins/jQuery/jquery.min.js') }}"></script>

    <script src="{{ asset('guest/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <script src="{{ asset('guest/plugins/slick/slick.min.js') }}"></script>

    <script src="{{ asset('guest/plugins/instafeed/instafeed.min.js') }}"></script>


    <!-- Main Script -->
    <script src="{{ asset('guest/js/script.js') }}"></script>
</body>

</html>
