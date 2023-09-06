@extends('frontend.main')
@section('title')
Contact||Mostafizur
@endsection
@section('content')

	 <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Contact Me</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        @foreach($multiImage as $image)
                        <li><img src="{{ asset($image->multi_image) }}"></li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- contact-map -->
            <div id="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd"
                    allowfullscreen loading="lazy"></iframe>
            </div>
            <!-- contact-map-end -->

            <!-- contact-area -->
            <div class="contact-area">
                <div class="container">
                	 @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form method="post" action="{{ route('store.message') }}" class="contact__form">
                    	@csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input name="name" type="text" placeholder="Enter your name*">
                            </div>
                            <div class="col-md-6">
                                <input name="email" type="email" placeholder="Enter your mail*">
                            </div>
                            <div class="col-md-6">
                                <input name="subject" type="text" placeholder="Enter your subject*">
                            </div>
                            <div class="col-md-6">
                                <input name="phone" type="text" placeholder="Your Phone*">
                            </div>
                        </div>
                        <textarea name="message" id="message" placeholder="Enter your massage*"></textarea>
                        <button type="submit" class="btn">send massage</button>
                    </form>
                </div>
            </div>
            <!-- contact-area-end -->

@endsection