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
    <section id="product-section">
        <div class="banner-img  mb-4">
            {{-- <div class="banner-img img-fluid mb-4"
            style="background-image: url({{ url('storage/front_images/banner.jpg') }})"> --}}
            {{-- <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Example headline.</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                </div>
            </div> --}}
            <img src="{{ url('storage/front_images/product_listing.jpg') }}" class="img-fluid w-100" alt=""
                srcset="">
        </div>
    </section>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6" id="product-preview">

                <div class="img_producto_container" data-scale="1.6">
                    <img src="{{ url('storage/front_images/bath-decoration-with-soap-bottle-towel.jpg') }}" class="dslc-lightbox-image img_producto"
                        alt="">
                    {{-- <a
                      class="dslc-lightbox-image img_producto"
                      href="{{ url('storage/front_images/468.jpg') }}"
                      target="_self"
                      style="background-image:url({{ url('storage/front_images/468.jpg') }})"
                    >
                    </a> --}}
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <h4 class="text-heading">Thick Door Auto Soft-Close Concealed Hinge</h4>
                    <p class="text-small">( Concealed Hinge )</p>
                    <p class="text-sub-heading"> SKU Code <span class="detail-text">: OEC-501-C2S-SC (15°)</span></p>
                    <p><a class="btn btn-secondary button-primary" href="#">View details »</a></p>
                </div>
            </div>



        </div>

        {{-- tabs --}}
        <div class="row pb-4">
            <div class="col-md-12">
                <ul class="nav nav-tabs info-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-sub-heading" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Features</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-sub-heading" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">Specification</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-sub-heading" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                            aria-selected="false">Application</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class="ul lh-lg">
                            <li>Auto close mechanism for thick doors</li>
                            <li>Hinge equipped with 2 hole screw-on mounting plates</li>
                            <li>Range of door thickness: 20-28mm</li>
                            <li>Opening angle: 95°</li>
                            <li>Cup diameter: 40mm</li>
                            <li>Cup height: 13mm</li>
                            <li>3D Adjustment: Overlay +2/-4mm; Depth +/-2mm; Height +/-2mm</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <ul class="ul lh-lg">
                            <li>Auto close mechanism for thick doors</li>
                            <li>Hinge equipped with 2 hole screw-on mounting plates</li>
                            <li>Range of door thickness: 20-28mm</li>
                            <li>Opening angle: 95°</li>
                            <li>Cup diameter: 40mm</li>
                            <li>Cup height: 13mm</li>
                            <li>3D Adjustment: Overlay +2/-4mm; Depth +/-2mm; Height +/-2mm</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <ul class="ul lh-lg">
                            <li>Auto close mechanism for thick doors</li>
                            <li>Hinge equipped with 2 hole screw-on mounting plates</li>
                            <li>Range of door thickness: 20-28mm</li>
                            <li>Opening angle: 95°</li>
                            <li>Cup diameter: 40mm</li>
                            <li>Cup height: 13mm</li>
                            <li>3D Adjustment: Overlay +2/-4mm; Depth +/-2mm; Height +/-2mm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- tabs end --}}

        {{-- related product --}}
        <div class="row pb-4">
            <div class="col-md-12  mb-4">
                <h2 class="featurette-heading mt-0 mb-4">Releated Product</h2>
            </div>
            <div class="slider releated-product">
                @for ($i = 0; $i < 6; $i++)
                    <div class="mb-4">
                        <a href="" target="_blank">
                            <div class="d-flex justify-content-center flex-column align-items-center px-3   ">
                                <div class="category-box rounded">
                                    <div class=" d-flex align-items-end back-image img-fluid rounded-top"
                                        style="background-image: url({{ url('storage/front_images/what_we_offer.jpg') }});">
                                    </div>
                                    <div class="w-100 bg-light py-2 px-3 rounded">
                                        <p class="text-small">OEC-451-A2S-SC (0°)</p>
                                        <p class="text-dark">Auto Soft-Close Concealed Hinge</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>
        {{-- related product end --}}
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".releated-product").slick({
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
     
        $(".img_producto_container")
            .on("mouseover", function() {
                $(this)
                    .children(".img_producto")
                    .css({
                        transform: "scale(" + $(this).attr("data-scale") + ")"
                    });
            })
            .on("mouseout", function() {
                $(this)
                    .children(".img_producto")
                    .css({
                        transform: "scale(1)"
                    });
            })
            .on("mousemove", function(e) {
                $(this)
                    .children(".img_producto")
                    .css({
                        "transform-origin": ((e.pageX - $(this).offset().left) / $(this).width()) * 100 +
                            "% " +
                            ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +
                            "%"
                    });
            });
    </script>
@endsection
