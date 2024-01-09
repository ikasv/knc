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
        <div class="banner-img  mb-4" >
            {{-- <div class="banner-img img-fluid mb-4" style="background-image: url({{ url('storage/front_images/banner.jpg') }})"> --}}
            {{-- <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Example headline.</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                </div>
            </div> --}}
            <img src="{{ url('storage/front_images/product_listing.jpg') }}" class="img-fluid w-100" alt="" srcset="">
        </div>
    </section>
  <div class="container">
    {{-- <div class="row">
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
    </div> --}}
    <div class="row my-4">
        <div class="h-100 w-100 d-flex flex-column justify-content-center">
            <h2 class="featurette-heading mt-0 mb-4">Water <span class="text-muted">Taps</span></h2>
        </div>

        @for ($i = 0; $i < 10; $i++)
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 product-listing mb-4">
            <a href="{{ route('product') }}" target="_blank" >
                <div class="category-box d-flex justify-content-center flex-column align-items-center rounded">
                    <div class=" d-flex align-items-end back-image img-fluid rounded-top"
                        style="background-image: url({{ url('storage/front_images/categories.jpg') }});">
                    </div>
                    <div class="w-100 bg-light py-2 px-3 rounded">
                        <p>OEC-451-A2S-SC (0°)</p>
                        <p class="text-dark">Auto Soft-Close Concealed Hinge</p>
                    </div>
                </div>
            </a>
        </div>            
        @endfor
    </div>
  </div>
@endsection
@section('script')
@endsection
