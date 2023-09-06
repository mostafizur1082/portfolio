@extends('frontend.main')

@section('content')

	<!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">{{ $catname->blog_category }}</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
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


            <!-- blog-area -->
            <section class="standard__blog">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">

                        	@foreach($categoryblog as $blog)
                            <div class="standard__blog__post">
                                <div class="standard__blog__thumb">
                                    <a href="{{ route('blog.details',$blog->id) }}"><img src="{{ asset($blog->image) }}" height="430px" width="850px" ></a>
                                    <a href="{{ route('blog.details',$blog->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                                </div>
                                <div class="standard__blog__content">
                                    
                                    <h2 class="title"><a href="{{ route('blog.details',$blog->id) }}">{{ $blog->title }}</a></h2>

                                   {{-- <p>{!! Str::limit($blog->description, 200) !!}</p> --}}

                                    <ul class="blog__post__meta">

                                        <li><i class="fal fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}</li>
                                    </ul>
                                </div>
                            </div>
 						@endforeach
                        </div>


                        <div class="col-lg-4">
                            <aside class="blog__sidebar">
                                <div class="widget">
                                    <form action="#" class="search-form">
                                        <input type="text" placeholder="Search">
                                        <button type="submit"><i class="fal fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Recent Blog</h4>
                                    <ul class="rc__post">
                                    	@foreach($allblog as $blog)
                                        <li class="rc__post__item">
                                            <div class="rc__post__thumb">
                                                <a href="{{ route('blog.details',$blog->id) }}"><img src="{{ asset($blog->image) }}" height="90px" width="90px"></a>
                                            </div>
                                            <div class="rc__post__content">
                                                <h5 class="title"><a href="{{ route('blog.details',$blog->id) }}">{{ $blog->title }}</a></h5>
                                                <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                        

                                    </ul>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Categories</h4>
                                    <ul class="sidebar__cat">
                                    	@foreach($categories as $category)
                                        <li class="sidebar__cat__item"><a href="{{ route('category.blog',$category->id) }}">{{ $category->blog_category }} </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Popular Tags</h4>
                                    <ul class="sidebar__tags">
                                        <li><a href="blog.html">Business</a></li>
                                        <li><a href="blog.html">Design</a></li>
                                        <li><a href="blog.html">apps</a></li>
                                        <li><a href="blog.html">landing page</a></li>
                                        <li><a href="blog.html">data</a></li>
                                        <li><a href="blog.html">website</a></li>
                                        <li><a href="blog.html">book</a></li>
                                        <li><a href="blog.html">Design</a></li>
                                        <li><a href="blog.html">product design</a></li>
                                        <li><a href="blog.html">landing page</a></li>
                                        <li><a href="blog.html">data</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>


                    </div>
                </div>
            </section>
            <!-- blog-area-end -->

@endsection