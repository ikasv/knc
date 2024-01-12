@extends('layouts.app')
@section('style')
@endsection
@section('content')
    <section id="thank-you" style="background-image: url({{ url('storage/front_images/thank-you.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-end">
                        <h1>Thank you! To show Intrest</h1>
                        <h3>Lorem ipsum dolor sit amet consectetur.</h3>
                        <button class="btn btn-secondary button-primary ">Go To Home</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
