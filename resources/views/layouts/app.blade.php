{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('public/assets/css/styles.css') }}">
    <title>KNC</title>
    @yield('style')
</head>

<body>
    <section id="header">
        <nav id="top-nav" class="py-2 border-bottom">
            <div class="container mt-2 ">
                <div class="row">
                    <div class="col-5 align-self-center">

                        <div class="header-social ">
                            <a href="">
                                <i class="fa-brands fa-facebook pe-2"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-instagram pe-2"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-twitter pe-2"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-linkedin pe-2"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-7 email">
                        <a href="">
                            <span><i class="fa-solid fa-envelope pe-2"></i></span>
                            <span>info@knc@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        {{-- sec nav --}}
        <nav id="sec-nav" class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <div>
                        <img src="https://www.ozonstar.com/img/logo.png" class="logo" alt="" srcset="">
                    </div>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end drop-menue" id="navbarNav">
                    <ul class="navbar-nav gap-lg-3 gap-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our company</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Medium</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-0" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <main>
        @yield('content')
    </main>

    {{-- FOOTER  --}}
    <footer id="footer">
        <section id="first-footer" style="background-image: url({{ url('storage/front_images/banner.jpg') }})">
            <div class="container">
                <div class="row pt-5 pb-4">
                    <div class="col-md-12">
                        <div class="text-center">
                            <a href="javascript.void(0)">
                                <img src="https://www.ozonstar.com/img/logo.png" width="200" alt=""
                                    srcset="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row pb-4 footer-menue">
                    <div class="col-md-12">
                        <div class="text-center">
                            <span><a href="/">Home</a> </span>
                            <span><a href="/">Our Cpmpany</a> </span>
                            <span><a href="/">About Us</a> </span>
                            <span><a href="/">Medium</a> </span>
                            <span><a href="/">Blog</a> </span>
                            <span><a href="/">Contact</a> </span>
                        </div>
                    </div>
                </div>


                <div class="row pb-4">
                    <div class="col-md-12 ">
                        <div class="footer-info text-center">
                            <span class="pe-2"><a href=""><i class="fa-solid fa-location-dot pe-2"></i>
                                    Hawa Mahal Rd, Badi Choupad, J.D.A. Market, Pink City, Jaipur, Rajasthan 302002</a>
                            </span>
                            <span><a href=""><i class="fa-solid fa-envelope pe-2"></i>
                                    info@gmail.com</a>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-md-12">
                        <div class="footer-social ">
                            <a href="">
                                <i class="fa-brands fa-facebook pe-2"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-instagram pe-2"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-twitter pe-2"></i>
                            </a>
                            <a href="">
                                <i class="fa-brands fa-linkedin pe-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="sec-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 py-3">
                        <div class="text-center">
                            <span><a href="">
                                    Privacy Policy</a> -
                            </span>
                            <span><a href="">
                                    Cookies Policy</a> -
                            </span>
                            <span><a href="">
                                    Overant</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="myBtn" type="button" class="toTop js-toTop to-top" onclick="topFunction();"><i
                class="fa-solid fa-chevron-up"></i></button>

    </footer>
    {{-- FOOTER END  --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://www.elevateweb.co.uk/wp-content/themes/radial/jquery.elevatezoom.min.js"></script>
    @yield('script')

    <script>
        // navbar
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(window).scrollTop() > 200) {
                    $("#sec-nav").addClass("fixed-top");

                    var navbarHeight = $(".navbar").height();
                    $("body").css("padding-top", navbarHeight + "px");
                } else {
                    $("#sec-nav").removeClass("fixed-top");
                    $("body").css("padding-top", "0");
                }
            });
        });
        // navbar end
        // scroll-to-top
        $(document).ready(function() {
            var mybutton = $("#myBtn");

            $(window).scroll(function() {
                scrollFunction();
            });

            function scrollFunction() {
                if ($(document).scrollTop() > 20 || $(document.documentElement).scrollTop() > 20) {
                    mybutton.css("display", "block");
                } else {
                    mybutton.css("display", "none");
                }
            }

            mybutton.click(function() {
                $("body,html").animate({
                    scrollTop: 0
                }, 600);
            });
        });
        // scroll-to-top end
    </script>
</body>

</html>
