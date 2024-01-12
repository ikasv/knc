@extends('layouts.app')
@section('style')
@endsection
@section('content')
<main>
    {{-- home slider --}}
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
    {{-- home slider end --}}

    <div class="container marketing">


        {{-- popular categories --}}
        <div class="row mt-4">
            <div class="col-md-12  mb-4">
                <h3 class="featurette-heading mt-0 ">Popular Categories</h3>
            </div>
            <div class="slider popular-categories ">
                @for ($i = 0; $i < 6; $i++) <div class="my-3">
                    <a href="{{ route('products') }}" target="_blank">
                        <div class="d-flex justify-content-center flex-column align-items-center px-3   ">
                            <div class="category-box">
                                <div id="overlay"
                                    class=" d-flex align-items-center justify-content-center back-image img-fluid "
                                    style="background-image: url({{ url('storage/front_images/categories.jpg') }});">
                                    <div class="overlay-box"></div>
                                    <h5 class="mb-0 text-white">3D Adjustable Hinge</h5>
                                </div>
                                {{-- <div class="w-100 bg-light py-3  rounded text-center ">
                                    <h5 class="mb-0">3D Adjustable Hinge</h5>
                                </div> --}}
                            </div>
                        </div>
                    </a>
            </div>
            @endfor
        </div>
    </div>
    {{-- popular categories end --}}
    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>

    {{-- service --}}
    <div class="row mt-5">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="single-feature">
                <a href="#" class="title">
                    <i class="fa-solid fa-sack-dollar fa-2x"></i>
                    <h5>Money back gurantee</h5>
                </a>
                <p>Shall open divide a one</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="single-feature">
                <a href="#" class="title">
                    <i class="fa-solid fa-truck-fast fa-2x"></i>
                    <h5>Free Delivery</h5>
                </a>
                <p>Shall open divide a one</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="single-feature">
                <a href="#" class="title">
                    <i class="fa-solid fa-headphones fa-2x"></i>
                    <h5>Alway support</h5>
                </a>
                <p>Shall open divide a one</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="single-feature">
                <a href="#" class="title">
                    <i class="fas fa-shield-alt fa-2x"></i>
                    <h5>Secure payment</h5>
                </a>
                <p>Shall open divide a one</p>
            </div>
        </div>
    </div>
    {{-- service end --}}

    {{--
    <hr class="featurette-divider"> --}}
    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>

    {{-- latest products --}}
    <div class="row mt-5">
        <div class="col-8 mb-4">
            <div class="">
                <h3 class="featurette-heading mt-0 ">Our Latest Products</h3>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="text-end">
                <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill">View
                    All</a>
            </div>
        </div>

        <div class="slider latest-products ">
            @for ($i = 0; $i < 6; $i++) <div class="d-flex d-flex justify-content-center align-items-center px-2">
                <div class="card " style="width: 19rem;">
                    <img src="{{ url('storage/front_images/what_we_offer.jpg') }}" class="img-fluid rounded-top"
                        alt="...">
                    <div class="card-body p-3 pb-0">
                        <h5 class="card-title card-heading mb-2">3D Adjustable Hinge</h5>
                        <p class="mb-2 product-status">In-stock</p>
                    </div>
                    <div class="d-grid">
                        <a href="" class="btn btn-secondary btn-sm button-primary border-0 ">View
                            details</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
    {{-- latest products end --}}




    <!-- START THE FEATURETTES -->

    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>
    {{-- Most Selling Products --}}
    <div class="row mt-5">
        <div class="col-8 mb-4">
            <div class="">
                <h3 class="featurette-heading mt-0 ">Most Selling Products</h3>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="text-end">
                <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill">View
                    All</a>
            </div>
        </div>

        <div class="slider latest-products ">
            @for ($i = 0; $i < 6; $i++) <div class="d-flex d-flex justify-content-center align-items-center px-2">
                <div class="card " style="width: 19rem;">
                    <img src="{{ url('storage/front_images/what_we_offer.jpg') }}" class="img-fluid rounded-top"
                        alt="...">
                    <div class="card-body p-3 pb-0">
                        <h5 class="card-title card-heading ">3D Adjustable Hinge</h5>
                        <p class="mb-2 product-status">In-stock</p>
                        {{-- <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill ">View
                            details</a> --}}
                    </div>
                    <div class="d-grid">
                        <a href="" class="btn btn-secondary btn-sm button-primary border-0 ">View
                            details</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
    {{-- Most Selling Products end --}}





    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>
    {{-- New Arrival --}}
    <div class="row mt-5">
        <div class="col-8 mb-4">
            <div class="">
                <h3 class="featurette-heading mt-0 ">New Arrival</h3>
            </div>
        </div>
        <div class="col-4 mb-4">
            <div class="text-end">
                <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill">View
                    All</a>
            </div>
        </div>

        <div class="slider latest-products ">
            @for ($i = 0; $i < 6; $i++) <div class="d-flex d-flex justify-content-center align-items-center px-2">
                <div class="card " style="width: 19rem;">
                    <img src="{{ url('storage/front_images/what_we_offer.jpg') }}" class="img-fluid rounded-top"
                        alt="...">
                    <div class="card-body p-3 pb-0">
                        <h5 class="card-title card-heading ">3D Adjustable Hinge</h5>
                        <p class="mb-2 product-status">In-stock</p>
                        {{-- <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill ">View
                            details</a> --}}
                    </div>
                    <div class="d-grid">
                        <a href="" class="btn btn-secondary btn-sm button-primary border-0 ">View
                            details</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
    {{-- New Arrival --}}

    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>

    {{-- new product --}}
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="main_title mb-4">
                <h3><span>New Products</span></h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="new_product">
                <h5 class="text-uppercase">collection</h5>
                <h3 class="text-uppercase">Lorem ipsum dolor sit amet</h3>
                <div class="product-img">
                    <img class="img-fluid" src="https://www.ozone-india.com/BannerImage/124/small" alt="">
                </div>

                <a href="#" class="btn btn-sm btn-secondary rounded-pill button-primary">View detail</a>
            </div>
        </div>
        <div class="col-lg-6 mt-5 mt-lg-0">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="{{ url('storage/front_images/categories.jpg') }}" alt="">

                        </div>
                        <div class="product-btm">
                            <a href="#" class="d-block">
                                <h5>Lorem Ipsum Dolor</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="{{ url('storage/front_images/categories.jpg') }}" alt="">
                        </div>
                        <div class="product-btm">
                            <a href="#" class="d-block">
                                <h5>Lorem Ipsum Dolor</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="{{ url('storage/front_images/categories.jpg') }}" alt="">
                        </div>
                        <div class="product-btm">
                            <a href="#" class="d-block">
                                <h5>Lorem Ipsum Dolor</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <img class="img-fluid w-100" src="{{ url('storage/front_images/categories.jpg') }}" alt="">
                        </div>
                        <div class="product-btm">
                            <a href="#" class="d-block">
                                <h5>Lorem Ipsum Dolor</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- new product end --}}

    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>

    {{-- about us --}}
    <div class="row featurette my-5">
        <div class="col-lg-7 col-12 order-lg-1 order-md-1  ">
            <div class="h-100 w-100 d-flex flex-column justify-content-center">
                <h5 class="text-sub-heading">About Us</h5>
                <h3 class="featurette-heading mt-0 mb-4">Welcome To K. N. C.</h3>
                <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam
                    natus?
                    Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                    Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem
                    odio!
                    Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                    Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                <span class="pb-3">
                    <a href="" class="btn btn-secondary btn-sm button-primary rounded-pill ">Learn More<i
                            class="fa-solid fa-angle-right ps-1"></i></a>
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
    {{-- about us end --}}
    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>
    {{-- send enquiry --}}
    <div id="send-enquiry" class="row featurette my-5">
        <div class="col-lg-7 col-12 order-lg-2 order-md-1  ">

            <div class="h-100 w-100 d-flex flex-column justify-content-center">
                <h3 class="featurette-heading mt-0 mb-4">Send Enquiry</h3>
                <form id="enquiry">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2 " placeholder="Name" aria-label="">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2 " placeholder="Phone" aria-label="">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control mb-2 " placeholder="Email" aria-label="">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="" id="" class="form-control mb-2 " cols="30" rows="5"
                                    placeholder="Message"></textarea>

                            </div>

                        </div>

                    </div>

                    <button class="btn btn-outline-success button-primary mb-3" type="submit">Submit</button>
                </form>
            </div>

        </div>
        <div class="col-lg-5 col-12 order-lg-1 order-md-2 ">
            <div class="shadow rounded">
                <img src="{{ url('storage/front_images/bath-decoration-with-soap-bottle-towel.jpg') }}"
                    class="img-fluid rounded" srcset="">
            </div>
        </div>
    </div>
    {{-- send enquiry end --}}


    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>
    {{-- why choose us --}}

    <div id="faq" class="row featurette my-5">
        <div class="col-md-12 mb-4">
            <div>
                <h3 class="featurette-heading mt-0 ">Why Choose Us</h3>
            </div>
        </div>
        <div class="faq__accordian-main-wrapper" id="faq__accordian-main-wrapper">
            <div class="faq__accordion-wrapper">
                <a class="faq__accordian-heading rounded active" href="#">What is Lorem Ipsum</a>

                <div class="faq__accordion-content" style="display: block;">
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using 'Content here, content here', making it look like readable English. Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
                </div>
            </div>
            <div class="faq__accordion-wrapper">
                <a class="faq__accordian-heading rounded " href="#">What is Lorem Ipsum</a>
                <div class="faq__accordion-content" style="display: none;">
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using 'Content here, content here', making it look like readable English. Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
                </div>
            </div>
            <div class="faq__accordion-wrapper">
                <a class="faq__accordian-heading rounded" href="#">What is Lorem Ipsum</a>
                <div class="faq__accordion-content" style="display: none;">
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using 'Content here, content here', making it look like readable English. Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
                </div>
            </div>
            <div class="faq__accordion-wrapper">
                <a class="faq__accordian-heading rounded" href="#">What is Lorem Ipsum</a>
                <div class="faq__accordion-content" style="display: none;">
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                        as opposed to using 'Content here, content here', making it look like readable English. Many
                        desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
                </div>
            </div>
        </div>
    </div>
    {{-- why choose us end --}}


    <div class="row justify-content-center featurette-divider">
        <div class="col-md-8 text-center">
            <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
        </div>
    </div>
    {{-- test --}}
    <div class="row featurette pb-5">
        <div class="col-lg-7 col-12 order-lg-2 order-md-1  ">
            <div class="h-100 w-100 d-flex flex-column justify-content-center">
                <h3 class="featurette-heading mt-0 mb-4">Water Taps</h3>
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
    {{-- test --}}

    </div>
</main>
@endsection
@section('script')
<script>
    $(document).ready(function() {
            $(".popular-categories").slick({
                slidesToShow: 5,
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
                    {
                        breakpoint: 531,
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
                // autoplay: true,
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

       //why choose us
        $('.faq__accordian-heading').click(function(e) {
            e.preventDefault();
            if (!$(this).hasClass('active')) {
                $('.faq__accordian-heading').removeClass('active');
                $('.faq__accordion-content').slideUp(500);
                $(this).addClass('active');
                $(this).next('.faq__accordion-content').slideDown(500);
            } else if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).next('.faq__accordion-content').slideUp(500);
            }
        });
</script>
@endsection