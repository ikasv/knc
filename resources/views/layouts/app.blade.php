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
        <nav id="top-nav" class="py-2">
            <div class="container">
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
            <div class="container d-inline">
                <div class="row align-items-center justify-content-between">
                    <div class=" col-xl-4 col-lg-3 col-md-3 col-5">
                        <a class="navbar-brand d-flex" href="#">
                            <img src="https://www.ozonstar.com/img/logo.png" class="logo img-fluid" alt=""
                                srcset="">
                        </a>
                    </div>
                    <div class="d-none search-bar col-xl-4 col-lg-3 col-md-6 col-6">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success button-primary" type="submit"><i
                                    class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <button class="col-md-2 col-sm-1 col-2 navbar-toggler border-0 text-end" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between drop-menue col-xl-5 col-lg-6 col-3"
                        id="navbarNav">
                        <form class="d-flex search-bar">
                            <input id="search" class="form-control me-2" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-success button-primary" type="submit"><i
                                    class="fas fa-search"></i></button>
                        </form>
                        <ul class="navbar-nav gap-lg-3">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about_us') }}">About us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products') }}">Our products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-0" href="{{ route('contact_us') }}">Contact us</a>
                            </li>
                        </ul>

                    </div>

                </div>




            </div>
        </nav>
    </section>
    <main>
        @yield('content')
    </main>


    {{-- footer --}}
    <section id="footer">
        <div class="container">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 pt-5 ">

                <div class="col-lg-5 col-md-6 col-12 mb-3">
                    <h5>Contact</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item d-flex align-items-center mb-2 text-white"><i
                                class="fa-solid fa-location-dot pe-2"></i>Plot No. 102,
                            103, 123 Pt. T. N Mishra Marg,
                            Santosh Nagar, Gopalpura Bypass
                            Jaipur 302015 Rajasthan India</li>
                        <li class="nav-item d-flex align-items-center mb-2 text-white"><i
                                class="fa-solid fa-phone pe-2"></i>98745 61230</li>
                        <li class="nav-item d-flex align-items-center mb-2 text-white"><i
                                class="fa-solid fa-envelope pe-2"></i>info@getpill.in
                        </li>

                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 col-12 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="javascript:void(0)" class="nav-link p-0">Home</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('about_us') }}" class="nav-link p-0">About us</a>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('products') }}" class="nav-link p-0">Our
                                products</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('contact_us') }}" class="nav-link p-0">Contact
                                us</a></li>

                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 col-12 mb-3">
                    <h5>Category</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">About</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <a href="/" class="d-flex align-items-center mb-3">
                                <img src="https://www.ozonstar.com/img/logo.png" class="logo img-fluid"
                                    alt="" srcset="">
                            </a>
                        </div>
                        <div class="col-12">
                            <h5>Follow us:</h5>
                            <ul id="footer-social" class="nav gap-3">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0"><i
                                            class="fa-brands fa-facebook p-2"></i></a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0"><i
                                            class="fa-brands fa-instagram p-2"></i></a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0"><i
                                            class="fa-brands fa-twitter p-2"></i></a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0"><i
                                            class="fa-brands fa-linkedin p-2"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="row justify-content-center">
                <div class="col-md-8 py-4">
                    <div class="text-white text-center">
                        <i class="fa-solid fa-copyright pe-2"></i>2024 K. N. C. All Rights Reserved
                    </div>
                </div>
            </div>
        </div>



    </section>
    {{-- footer end --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
