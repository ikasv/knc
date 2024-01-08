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
                    <img src="{{ url('storage/front_images/banner.jpg') }}" alt="" srcset="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p>Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn  btn-primary button-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ url('storage/front_images/banner.jpg') }}" alt="" srcset="">

                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn  btn-primary button-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ url('storage/front_images/banner.jpg') }}" alt="" srcset="">
                    <div class="container">
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
            <div class="row featurette">
                <div class="col-lg-7 col-12 order-lg-1 order-md-1  ">

                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h2 class="featurette-heading mt-0 mb-4">Water <span class="text-muted">Taps</span></h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam natus?
                        Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                        Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem odio!
                        Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                        Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-2 order-md-2 ">
                    <div class="shadow">
                        <img src="{{ url('storage/front_images/banner.jpg') }}" class="img-fluid" srcset="">
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-md-12  mb-4 ">
                    <h2 class="featurette-heading mt-0 mb-4">What We <span class="text-muted">Offer</span></h2>
                </div>
                <div class="col-lg-4">
                    <div>
                        <img src="{{ url('storage/front_images/banner.jpg') }}" width="140" height="140"
                            class="rounded-circle	" alt="" srcset="">
                    </div>
                    <h2>Trust</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid fuga nobis, ab veniam aut illo.</p>
                    <p><a class="btn btn-secondary button-primary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div>
                        <img src="{{ url('storage/front_images/banner.jpg') }}" width="140" height="140"
                            class="rounded-circle	" alt="" srcset="">
                    </div>
                    <h2>Maximum quality</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid fuga nobis, ab veniam aut illo.</p>
                    <p><a class="btn btn-secondary button-primary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div>
                        <img src="{{ url('storage/front_images/banner.jpg') }}" width="140" height="140"
                            class="rounded-circle	" alt="" srcset="">
                    </div>
                    <h2>Aware</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid fuga nobis, ab veniam aut illo.</p>
                    <p><a class="btn btn-secondary button-primary" href="#">View details &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            {{-- slider --}}
            <div class="row">
                <div class="col-md-12  mb-4">
                    <h2 class="featurette-heading mt-0 mb-4">Popular <span class="text-muted"> Categories</span></h2>
                </div>
                <div class="slider popular-categories ">
                    {{-- @for ($i = 1; $i < 6; $i++)
                        <div class="col-md-3">
                            <a href="{{ route('products') }}" target="_blank">
                                <div class="d-flex justify-content-center flex-column align-items-center">
                                    <div class="category-box d-flex align-items-end back-image img-fluid rounded"
                                        style="background-image: url({{ url('storage/front_images/banner.jpg') }});">
                                    </div>
                                    <div class="text-center py-2">
                                        <h5>Ergotech drawer system</h5>
                                    </div>
    
                                </div>
                            </a>
                        </div>
                    @endfor --}}
                    @for ($i = 0; $i < 6; $i++)
                        <div class="mb-4">
                            <a href="{{ route('products') }}" target="_blank" >
                                <div class="d-flex justify-content-center flex-column align-items-center px-3   ">
                                    <div class="category-box rounded">
                                        <div class=" d-flex align-items-end back-image img-fluid rounded-top"
                                            style="background-image: url({{ url('storage/front_images/banner.jpg') }});">
                                        </div>
                                        <div class="w-100 bg-light py-2 px-3 rounded">
                                            <p>Water<span class="text-muted"> Tap</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>            
                    @endfor
                </div>
            </div>
            {{-- slider end --}}
            
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-lg-7 col-12 order-lg-2 order-md-1  ">

                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h2 class="featurette-heading mt-0 mb-4">Water <span class="text-muted">Taps</span></h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam natus?
                            Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                            Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem odio!
                            Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                            Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-1 order-md-2 ">
                    <div class="shadow">
                        <img src="{{ url('storage/front_images/banner.jpg') }}" class="img-fluid" srcset="">
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-lg-7 col-12 order-lg-1 order-md-1  ">

                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h2 class="featurette-heading mt-0 mb-4">Water <span class="text-muted">Taps</span></h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam natus?
                            Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                            Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem odio!
                            Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                            Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-2 order-md-2 ">
                    <div class="shadow">
                        <img src="{{ url('storage/front_images/banner.jpg') }}" class="img-fluid" srcset="">
                    </div>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette pb-5">
                <div class="col-lg-7 col-12 order-lg-2 order-md-1  ">
                    <div class="h-100 w-100 d-flex flex-column justify-content-center">
                        <h2 class="featurette-heading mt-0 mb-4">Water <span class="text-muted">Taps</span></h2>
                        <p class="content-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio ab numquam natus?
                            Consequuntur saepe consequatur at non rem magni dolorem, perferendis quam adipisci sit!
                            Quaerat dolorem odit repellendus iusto delectus molestiae dolorum tenetur distinctio quidem odio!
                            Natus, aut inventore impedit sint commodi reiciendis nostrum perferendis quasi maxime eius.
                            Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?</p>
                    </div>

                </div>
                <div class="col-lg-5 col-12 order-lg-1 order-md-2 ">
                    <div class="shadow">
                        <img src="{{ url('storage/front_images/banner.jpg') }}" class="img-fluid" srcset="">
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
                        breakpoint: 1249,
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
    </script>
@endsection

