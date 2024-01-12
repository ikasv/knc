@extends('layouts.app')
@section('content')
    <section id="product-section">
        <div class="banner-img  mb-4">
            <img src="{{ url('storage/front_images/product_listing.jpg') }}" class="img-fluid w-100" alt=""
                srcset="">
        </div>
    </section>
    <div class="container">
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
                        Aut commodi quas veritatis non minus praesentium fugiat itaque, cum voluptatibus similique?Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Officiis recusandae facere reiciendis cupiditate
                        provident, a nesciunt fugit eligendi dolor, quo minus mollitia cumque in veritatis sint harum,
                        consequatur tempora beatae!
                    </p>

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

         {{-- why choose us --}}

         <div id="faq" class="row featurette my-5">
            <div class="col-md-12 mb-4">
                <div>
                    <h3 class="featurette-heading mt-0 ">Why Choose Us</h3>
                </div>
            </div>
            <div class="faq__accordian-main-wrapper" id="faq__accordian-main-wrapper">
                <div class="faq__accordion-wrapper">
                    <a class="faq__accordian-heading rounded active" href="javascript:void(0)">What is Lorem Ipsum</a>

                    <div class="faq__accordion-content" style="display: block;">
                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                            as opposed to using 'Content here, content here', making it look like readable English. Many
                            desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                            text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
                    </div>
                </div>
                <div class="faq__accordion-wrapper">
                    <a class="faq__accordian-heading rounded " href="javascript:void(0)">What is Lorem Ipsum</a>
                    <div class="faq__accordion-content" style="display: none;">
                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                            as opposed to using 'Content here, content here', making it look like readable English. Many
                            desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                            text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
                    </div>
                </div>
                <div class="faq__accordion-wrapper">
                    <a class="faq__accordian-heading rounded" href="javascript:void(0)">What is Lorem Ipsum</a>
                    <div class="faq__accordion-content" style="display: none;">
                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                            as opposed to using 'Content here, content here', making it look like readable English. Many
                            desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                            text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
                    </div>
                </div>
                <div class="faq__accordion-wrapper">
                    <a class="faq__accordian-heading rounded" href="javascript:void(0)">What is Lorem Ipsum</a>
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
