@extends('layouts.app')

@section('content')
    <section id="product-section">
        <div class="banner-img  mb-4">
            <img src="{{ url('storage/front_images/product_listing.jpg') }}" class="img-fluid w-100" alt=""
                srcset="">
        </div>
    </section>
    <div class="container">
        <div class="row mt-5 text-center mb-3">
            <h3 class="featurette-heading mt-0 ">Contact Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

        </div>
         {{-- service --}}
         <div class="row  justify-content-center">
            
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="fa-solid fa-phone fa-2x"></i>
                        <h5>Phone</h5>
                    </a>
                    <p>98745 61230</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="fa-solid fa-location-dot fa-2x"></i>
                        <h5>Location</h5>
                    </a>
                    <p class="one-line"> Plot No. 102, 103, 123 Pt. T. N Mishra Marg,
                        Santosh Nagar, Gopalpura Bypass
                        Jaipur 302015 Rajasthan India</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="single-feature">
                    <a href="#" class="title">
                        <i class="fa-solid fa-envelope fa-2x"></i>
                        <h5>Email</h5>
                    </a>
                    <p>info@knc.in</p>
                </div>
            </div>
        </div>
        {{-- service end --}}
        
        <div class="row justify-content-center featurette-divider">
            <div class="col-md-8 text-center">
                <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
            </div>
        </div>

        <div id="contact-us" class="row featurette justify-content-center">
            <div class="col-lg-9 col-12 order-lg-1 ">
<div class="text-center">
    <h3 class="featurette-heading mt-0">Contact Form</h3>
</div>
                <div class="h-100 w-100 d-flex flex-column justify-content-center">
                   
                    <form id="enquiry">
                        {{-- <input type="text" name="" id=""> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control mb-2 " placeholder="Name"
                                        aria-label="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control mb-2 " placeholder="Phone"
                                        aria-label="">

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control mb-2 " placeholder="Email"
                                        aria-label="">

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
            <div class="d-none col-lg-5 col-12 order-lg-2">
                {{-- <div class="shadow rounded">
                    <img src="{{ url('storage/front_images/bath-decoration-with-soap-bottle-towel.jpg') }}"
                        class="img-fluid rounded" srcset="">
                </div> --}}
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            {{-- <div class="contact-icon"> --}}
                                <i class="fa-solid fa-location-dot p-2"></i>
                            {{-- </div> --}}
                            Plot No. 102, 103, 123 Pt. T. N Mishra Marg,
                            Santosh Nagar, Gopalpura Bypass
                            Jaipur 302015 Rajasthan India</li>
                        <li class="nav-item mb-2">
                            {{-- <div class="contact-icon"> --}}
                                <i class="fa-solid fa-phone p-2"></i>
                            {{-- </div> --}}
                            98745 61230</li>
                        <li class="nav-item mb-2">
                            {{-- <div class="contact-icon"> --}}
                                <i class="fa-solid fa-envelope p-2"></i>
                            {{-- </div> --}}
                            info@knc.in</li>
                       
                    </ul>
            </div>
        </div>


        <div class="row justify-content-center featurette-divider">
            <div class="col-md-8 text-center">
                <img src="{{ url('storage/front_images/divider.png') }}" class="img-fluid" alt="">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-9">
                <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14229.299845127594!2d75.8272571!3d26.9249107!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db1826f8b9251%3A0x9efa3bae3f535903!2sJaipur%20City%20Tours!5e0!3m2!1sen!2sin!4v1694523674194!5m2!1sen!2sin"
            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </div>
@endsection
@section('script')
<script>
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
