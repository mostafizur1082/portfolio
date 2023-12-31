@extends('frontend.main')

@section('title')
Mostafizur
@endsection
@section('content')

  <!-- banner-area -->
            @include('frontend.all_home.home_slide')
            <!-- banner-area-end -->

            <!-- about-area -->
            @include('frontend.all_home.home_about')
            <!-- about-area-end -->


            <!-- work-process-area -->
            <section class="work__process">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title text-center">
                                <span class="sub-title"> Working Process</span>
                                <h2 class="title">A clear product design process is the basis of success</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row work__process__wrap">
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 01</span>
                                <div class="work__process__icon">
                                    <img class="light" src="{{asset('frontend')}}/assets/img/icons/wp_light_icon01.png" alt="">
                                    <img class="dark" src="{{asset('frontend')}}/assets/img/icons/wp_icon01.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">Discover</h4>
                                    <p>Initial ideas or inspiration & Establishment of user needs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 02</span>
                                <div class="work__process__icon">
                                    <img class="light" src="{{asset('frontend')}}/assets/img/icons/wp_light_icon02.png" alt="">
                                    <img class="dark" src="{{asset('frontend')}}/assets/img/icons/wp_icon02.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">Define</h4>
                                    <p>Interpretation & Alignment of findings to project objectives.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 03</span>
                                <div class="work__process__icon">
                                    <img class="light" src="{{asset('frontend')}}/assets/img/icons/wp_light_icon03.png" alt="">
                                    <img class="dark" src="{{asset('frontend')}}/assets/img/icons/wp_icon03.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">Develop</h4>
                                    <p>Design-Led concept and Proposals hearted & assessed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">Step - 04</span>
                                <div class="work__process__icon">
                                    <img class="light" src="{{asset('frontend')}}/assets/img/icons/wp_light_icon04.png" alt="">
                                    <img class="dark" src="{{asset('frontend')}}/assets/img/icons/wp_icon04.png" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">Deliver</h4>
                                    <p>Process outcomes finalised & Implemented</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- work-process-area-end -->

            <!-- portfolio-area -->
            @include('frontend.all_home.home_portfolio')
            
            <!-- portfolio-area-end -->



            <!-- blog-area -->
            @include('frontend.all_home.home_blog')
            
            <!-- blog-area-end -->

            <!-- contact-area -->
            <section class="homeContact">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">Say hello</span>
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                                    <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="homeContact__form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter name*">
                                        <input type="email" placeholder="Enter mail*">
                                        <input type="number" placeholder="Enter number*">
                                        <textarea name="message" placeholder="Enter Massage*"></textarea>
                                        <button type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

@endsection