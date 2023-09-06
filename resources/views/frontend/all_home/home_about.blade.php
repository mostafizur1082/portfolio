@php
$about = App\Models\About::find(1);
@endphp

@php
$multiImage = App\Models\MultiImage::all();
@endphp

<section id="aboutSection" class="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <ul class="about__icons__wrap">

                                @foreach($multiImage as $image)
                                <li>

                                    <img class="light" src="{{ asset($image->multi_image) }}" alt="XD">

                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="about__content">
                                <div class="section__title">
                                    <span class="sub-title"> About me</span>
                                    <h2 class="title">{{ $about->title}}</h2>
                                </div>
                                <div class="about__exp">
                                    <div class="about__exp__icon">
                                        <img src="{{asset('frontend')}}/assets/img/icons/about_icon.png" alt="">
                                    </div>
                                    <div class="about__exp__content">
                                        <p>{{ $about->short_title }}</p>
                                    </div>
                                </div>
                                <p class="desc">{{ strip_tags($about->short_des) }}</p>
                                <a href="about.html" class="btn">Download my resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>