{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')
@section('style')
@endsection
@section('content')
    <main>

        <div id="myCarousel" class="carousel slide home-slider" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.ozone-india.com/BannerImage/124/small" alt="" srcset="">
                    <div class="container d-none">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn  btn-primary button-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.ozone-india.com/BannerImage/121/small" alt="" srcset="">

                    <div class="container d-none">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn  btn-primary button-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.ozone-india.com/BannerImage/124/small" alt="" srcset="">
                    <div class="container d-none">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn  btn-primary button-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container marketing">
            {{-- popular categories --}}
            <div class="row mt-5">
                <div class="col-md-12  mb-4">
                    <h2 class="featurette-heading mt-0 ">Popular Categories</h2>
                </div>
                <div class="slider popular-categories ">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="mb-4">
                            <a href="{{ route('products') }}" target="_blank">
                                <div class="d-flex justify-content-center flex-column align-items-center px-3   ">
                                    <div class="category-box rounded">
                                        <div class=" d-flex align-items-end back-image img-fluid rounded-top"
                                            style="background-image: url({{ url('storage/front_images/categories.jpg') }});">
                                        </div>
                                        <div class="w-100 bg-light py-3  rounded text-center ">
                                            <h5 class="mb-0">3D Adjustable Hinge</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
            {{-- popular categories end --}}

            <hr class="featurette-divider">

            <!-- Three columns of text below the carousel -->
            <div class="row mt-5">
                <div class="col-8 mb-4">
                    <div class="">
                        <h2 class="featurette-heading mt-0 ">Our Latest Products</h2>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="text-end">
                        <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill">View
                            All</a>
                    </div>
                </div>

                <div class="slider latest-products ">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="d-flex d-flex justify-content-center align-items-center px-2">
                            <div class="card " style="width: 19rem;">
                                <img src="{{ url('storage/front_images/what_we_offer.jpg') }}" class="img-fluid rounded-top"
                                    alt="...">
                                <div class="card-body text-center d-grid">
                                    <h5 class="card-title card-heading ">3D Adjustable Hinge</h5>
                                    <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill ">View
                                        details</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>



            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            <div class="row mt-5">
                <div class="col-8 mb-4">
                    <div class="">
                        <h2 class="featurette-heading mt-0 ">Most Selling Products</h2>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="text-end">
                        <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill">View
                            All</a>
                    </div>
                </div>

                <div class="slider latest-products ">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="d-flex d-flex justify-content-center align-items-center px-2">
                            <div class="card " style="width: 19rem;">
                                <img src="{{ url('storage/front_images/what_we_offer.jpg') }}" class="img-fluid rounded-top"
                                    alt="...">
                                <div class="card-body text-center d-grid">
                                    <h5 class="card-title card-heading ">3D Adjustable Hinge</h5>
                                    <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill ">View
                                        details</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>



            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            <div class="row mt-5">
                <div class="col-8 mb-4">
                    <div class="">
                        <h2 class="featurette-heading mt-0 ">New Arrival</h2>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="text-end">
                        <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill">View
                            All</a>
                    </div>
                </div>

                <div class="slider latest-products ">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="d-flex d-flex justify-content-center align-items-center px-2">
                            <div class="card " style="width: 19rem;">
                                <img src="{{ url('storage/front_images/what_we_offer.jpg') }}" class="img-fluid rounded-top"
                                    alt="...">
                                <div class="card-body text-center d-grid">
                                    <h5 class="card-title card-heading ">3D Adjustable Hinge</h5>
                                    <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill ">View
                                        details</a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>



            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette my-5">
                <div class="col-lg-7 col-12 order-lg-1 order-md-1  ">

                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h5 class="text-sub-heading">About Us</h5>
                        <h2 class="featurette-heading mt-0 mb-2">Welcome To K. N. C.</h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam
                            natus?
                            Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                            Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem
                            odio!
                            Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                            Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                        <span class="pb-3">
                            <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill ">View
                                details <i class="fa-solid fa-angle-right ps-1"></i></a>
                        </span>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-2 order-md-2 ">
                    <div class="shadow rounded">
                        <img src="{{ url('storage/front_images/bath-decoration-with-soap-bottle-towel.jpg') }}"
                            class="img-fluid rounded" srcset="">
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">



            <div class="row featurette my-5">
                <div class="col-lg-7 col-12 order-lg-2 order-md-1  ">

                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h2 class="featurette-heading mt-0 mb-4">Water Taps</h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam
                            natus?
                            Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                            Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem
                            odio!
                            Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                            Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-1 order-md-2 ">
                    <div class="shadow rounded">
                        <img src="{{ url('storage/front_images/bath-decoration-with-soap-bottle-towel.jpg') }}"
                            class="img-fluid rounded" srcset="">
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette my-5">
                <div class="col-lg-7 col-12 order-lg-1 order-md-1  ">

                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h2 class="featurette-heading mt-0 mb-4">Water Taps</h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam
                            natus?
                            Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                            Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem
                            odio!
                            Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                            Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-2 order-md-2 ">
                    <div class="shadow rounded">
                        <img src="{{ url('storage/front_images/natural-elements-spa-with-candles.jpg') }}"
                            class="img-fluid rounded" srcset="">
                    </div>
                </div>
            </div>

            <hr class="featurette-divider my-5">

            <div class="row featurette pb-5">
                <div class="col-lg-7 col-12 order-lg-2 order-md-1  ">
                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h2 class="featurette-heading mt-0 mb-4">Water Taps</h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam
                            natus?
                            Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                            Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem
                            odio!
                            Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                            Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-1 order-md-2 ">
                    <div class="shadow rounded">
                        <img src="{{ url('storage/front_images/bath-decoration-with-soap-bottle-towel.jpg') }}"
                            class="img-fluid rounded" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".popular-categories").slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                //autoplay: true,
                centerMode: false,
                prevArrow: '<button type="button" data-role="none" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>',
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1421,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            });
        });
        $(document).ready(function() {
            $(".latest-products").slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                autoplay: true,
                centerMode: false,
                prevArrow: '<button type="button" data-role="none" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>',
                autoplaySpeed: 2000,
                responsive: [{
                        breakpoint: 1421,
                        settings: {
                            slidesToShow: 4,
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                ],
            });
        });
    </script>
@endsection
