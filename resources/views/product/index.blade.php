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
            <img src="{{ url('storage/front_images/product_listing.jpg') }}" class="img-fluid w-100" alt=""
                srcset="">
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center gap-2 my-4  ">
            <div id="filter" class="col-xl-2 col-12 ">
                <div class="row">
                    <div class="col-md-6">
                        <a id="filter-toggler" class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filter-by-category" aria-controls="filter-by-category" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="fa-solid fa-filter pe-2 "></i> Filter
                        </a>
                    </div>
                </div>
                <div class="navbar-collapse" id="filter-by-category">
                    <div class="row card mb-4">
                        <div class=" px-0">
                            <div class="border-bottom">
                                <h5 class="p-2 mb-0">Sort by Categories</h5>
                            </div>
                            <div class=" short-category py-2">
                                @for ($i = 0; $i < 10; $i++)
                                    <div class="form-check gap-2">
                                        <input id="filter_{{ $i }}" name="filter_{{ $i }}"
                                            type="checkbox" class="form-check-input" value="">
                                        <label class="form-check-label" for="filter_{{ $i }}">
                                            ANTIHISTAMINE TREATMENT
                                        </label>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                    <div class="row card mb-4">
                        <div class="px-0">
                            <div class="border-bottom">
                                <h5 class="p-2 mb-0">Sort by Sub-categories</h5>
                            </div>
                            <div class=" short-category py-2">
                                @for ($i = 0; $i < 10; $i++)
                                    <div class="form-check gap-2">
                                        <input id="sub_category_{{ $i }}" name="sub_category_{{ $i }}"
                                            type="checkbox" class="form-check-input" value="">
                                        <label class="form-check-label" for="sub_category_{{ $i }}">
                                            ANTIHISTAMINE TREATMENT
                                        </label>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-9 col-md-12">
                <div class="row">
                    <div class="col-xl-8 col-6 mb-3">
                        <h3 class="featurette-heading mt-0 ">Water Taps</h3>
                    </div>
                    <div class="col-xl-4 col-6 text-end mb-3">
                        {{-- <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample"><i class="fa-solid fa-filter pe-2"></i> Filter</a> --}}
                    </div>

                    {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body" id="filter">
                            <details>
                                <summary class="pb-2">By Categories</summary>
                                <div class="short-category card mb-3 p-3">
                                    @for ($i = 0; $i < 15; $i++)
                                        <div class="form-check">
                                            <input id="category_{{ $i }}" name="category_{{ $i }}"
                                                type="checkbox" class="form-check-input" value="63">
                                            <label class="form-check-label" for="category_{{ $i }}">
                                                ANTIHISTAMINE TREATMENT
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </details>

                            <details>
                                <summary class="pb-2">By Material</summary>
                                <div class="short-category card mb-3 p-3">
                                    @for ($i = 0; $i < 15; $i++)
                                        <div class="form-check">
                                            <input id="material_{{ $i }}" name="material_{{ $i }}"
                                                type="checkbox" class="form-check-input" value="63">
                                            <label class="form-check-label" for="material_{{ $i }}">
                                                ANTIHISTAMINE TREATMENT
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </details>

                            <button class="btn btn-secondary btn-sm button-primary rounded-pill">Apply Filter</button>
                        </div>
                    </div> --}}
                    @for ($i = 0; $i < 15; $i++)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <div class="d-flex d-flex justify-content-center align-items-center mb-4">
                                <div class="card " style="width: 19rem;">
                                    <img src="{{ url('storage/front_images/what_we_offer.jpg') }}"
                                        class="img-fluid rounded-top" alt="...">
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
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            function handleWindowSize() {
                if ($(window).width() > 1200) {
                    $('#filter-by-category').removeClass('collapse');
                    $('#filter-toggler').addClass('d-none');
                } else {
                    $('#filter-by-category').addClass('collapse');
                    $('#filter-toggler').removeClass('d-none');
                }
            }

            handleWindowSize();

            var resizeTimer;
            $(window).on('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    handleWindowSize();
                }, 250);
            });
        });
    </script>
@endsection
