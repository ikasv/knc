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
        <div class="row pb-5">
            <div class="col-md-6" id="product-preview">
                {{-- <img src="{{ url('storage/front_images/trust.jpg') }}" class="img-fluid w-100" alt="" srcset=""> --}}
                {{-- <div > --}}
                    <img id="zoom_03"
                        src="{{ url('storage/front_images/468.jpg') }}"
                        data-zoom-image="{{ url('storage/front_images/468.jpg') }} "
                        >

                    {{-- <div class="clearfix"></div> --}}

                    {{-- <a id="prev"> Previous </a>
                    <a id="next"> Next </a> --}}

                    {{-- <div class="clearfix"></div> --}}

                    {{-- <div id="gallery_01">
                                 
                                    <a  href=" #" class="elevatezoom-gallery active" data-update=""
                        data-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image1.png"
                        data-zoom-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image1.jpg">
                        <img src="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image1.png"
                            width="100" /></a>

                        <a href="#" class="elevatezoom-gallery"
                            data-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image2.png"
                            data-zoom-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image2.jpg"><img
                                src="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image2.png"
                                width="100" /></a>

                        <a href="tester" class="elevatezoom-gallery"
                            data-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image3.png"
                            data-zoom-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image3.jpg">
                            <img src="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image3.png"
                                width="100" />
                        </a>

                        <a href="tester" class="elevatezoom-gallery"
                            data-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image4.png"
                            data-zoom-image="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/large/image4.jpg"
                            class="slide-content"><img
                                src="https://www.elevateweb.co.uk/wp-content/themes/radial/zoom/images/small/image4.png"
                                width="100" /></a>

                    </div> --}}
                {{-- </div> --}}
            </div>
            <div class="col-md-6">
                <div>
                    <p class="text-heading">Thick Door Auto Soft-Close Concealed Hinge</p>
                    <p class="text-small">( Concealed Hinge )</p>
                    <p class="text-sub-heading"> SKU Code <span class="detail-text">: OEC-501-C2S-SC (15°)</span></p>
                    <p><a class="btn btn-secondary button-primary" href="#">View details »</a></p>
                </div>
            </div>


            
        </div>

        {{-- tabs --}}
        <div class="row">
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
                <h2 class="featurette-heading mt-0 mb-4">Releated <span class="text-muted"> Product</span></h2>
            </div>
            <div class="slider releated-product">
                 @for ($i=0; $i < 6; $i++)
                        <div class="mb-4">
                            <a href="{{ route('product') }}" target="_blank">
                                <div class="d-flex justify-content-center flex-column align-items-center px-3   ">
                                    <div class="category-box rounded">
                                        <div class=" d-flex align-items-end back-image img-fluid rounded-top"
                                            style="background-image: url({{ url('storage/front_images/banner.jpg') }});">
                                        </div>
                                        <div class="w-100 bg-light py-2 px-3 rounded">
                                            <p>OEC-451-A2S-SC (0°)</p>
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
                //test
                //initiate the plugin and pass the id of the div containing gallery images
                $("#zoom_03").elevateZoom({
                    gallery: 'gallery_01',
                    cursor: 'pointer',
                    easing: true,
                    galleryActiveClass: 'active',
                    imageCrossfade: true,
                    lensOpacity: 0.2,
                    zoomWindowWidth: 500,
                    zoomWindowHeight: 500,
                    lensBorderColour:"#00437a",
                    // lensSize: 400,
                    borderColour: "transparent",
                    lensBorderSize: 2,
                    // lenszoom: true,
                    scrollZoom: true,
                    loadingIcon: 'https://www.elevateweb.co.uk/spinner.gif'
                });

                //pass the images to Fancybox
                $("#zoom_03").bind("click", function(e) {
                    var ez = $('#zoom_03').data('elevateZoom');
                    $.fancybox(ez.getGalleryList());
                    return false;
                });
            </script>
        @endsection
