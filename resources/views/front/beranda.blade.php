@extends('front.template.themes')
@section('content')

<section id="slider" class="slider-element slider-parallax swiper_wrapper vh-75">
    <div class="slider-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark">
                    <div class="container">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Welcome to Canvas</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Create just
                                what you need for your Perfect Website. Choose from a wide range of Elements
                                &amp; simply put them on our Canvas.</p>
                        </div>
                    </div>
                    <div class="swiper-slide-bg" style="background-image: url('/front/images/slider/swiper/1.jpg');">
                    </div>
                </div>
                <div class="swiper-slide dark">
                    <div class="container">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Beautifully Flexible</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks
                                beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with
                                Responsive functionality that can be adapted to any screen size.</p>
                        </div>
                    </div>
                    <div class="video-wrap">
                        <video poster="/front/images/videos/explore-poster.jpg" preload="auto" loop autoplay muted>
                            <source src='/front/images/videos/explore.mp4' type='video/mp4' />
                            <source src='/front/images/videos/explore.webm' type='video/webm' />
                        </video>
                        <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="container">
                        <div class="slider-caption">
                            <h2 data-animate="fadeInUp">Great Performance</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be
                                surprised to see the Final Results of your Creation &amp; would crave for more.
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide-bg"
                        style="background-image: url('/front/images/slider/swiper/3.jpg'); background-position: center top;">
                    </div>
                </div>
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number">
                <div class="slide-number-current"></div><span>/</span>
                <div class="slide-number-total"></div>
            </div>
        </div>

    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">

        {{-- <div class="promo promo-light promo-full bottommargin-lg header-stick border-top-0 p-5">
            <div class="container clearfix">
                <div class="row align-items-center">
                    <div class="col-12 col-lg">
                        <h3>Try Premium Free for <span>30 Days</span> and you'll never regret it!</h3>
                        <span>Starts at just <em>$0/month</em> afterwards. No Ads, No Gimmicks and No SPAM. Just
                            Real Content.</span>
                    </div>
                    <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                        <a href="#" class="button button-large button-circle m-0">Start Trial</a>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="container clearfix">
            <div class="heading-block center">
                <h3>KATEGORI</h3>
                <span>Sesuaikan pilihan anda dengan <strong>KATEGORI</strong> kami</span>
            </div>

            <div class="row col-mb-50">
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                        <img height="185px" class="br-20" src="{{asset('front/images/parallax/1.jpg')}}" alt="">
                        <div class="fbox-content">
                            <h3>e-Commerce Solutions<span class="subtitle">Start your Own Shop today</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                        <img height="185px" class="br-20" src="{{asset('front/images/parallax/2.jpg')}}" alt="">
                        <div class="fbox-content">
                            <h3>e-Commerce Solutions<span class="subtitle">Start your Own Shop today</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                        <img height="185px" class="br-20" src="{{asset('front/images/parallax/3.jpg')}}" alt="">
                        <div class="fbox-content">
                            <h3>e-Commerce Solutions<span class="subtitle">Start your Own Shop today</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                        <img height="185px" class="br-20" src="{{asset('front/images/parallax/7.jpg')}}" alt="">
                        <div class="fbox-content">
                            <h3>e-Commerce Solutions<span class="subtitle">Start your Own Shop today</span></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="line"></div>

        </div>

        <div class="container clearfix">
            <div class="heading-block center">
                <h2>PROMO</h2>
                <span class="text-capitalize">budget minim? gunakan <strong>PROMO</strong> dengan bijak</span>
            </div>
            <!-- Portfolio Items
        ============================================= -->
            <div id="portfolio" class="portfolio row grid-container portfolio-reveal no-gutters" data-layout="fitRows">

                <!-- Portfolio Item: Start -->
                <article class="portfolio-item col-12 col-sm-6 col-md-4 pf-media pf-icons">
                    <!-- Grid Inner: Start -->
                    <div class="grid-inner">
                        <!-- Image: Start -->
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="/front/images/portfolio/4/1.jpg" alt="Open Imagination">
                            </a>
                            <!-- Overlay: Start -->
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn"
                                    data-hover-parent=".portfolio-item">
                                    <a href="/front/images/portfolio/full/1.jpg"
                                        class="overlay-trigger-icon bg-light text-dark"
                                        data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                                        data-hover-speed="350" data-hover-parent=".portfolio-item" data-lightbox="image"
                                        title="Image"><i class="icon-line-plus"></i></a>
                                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                                        data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                                        data-hover-speed="350" data-hover-parent=".portfolio-item"><i
                                            class="icon-line-ellipsis"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"
                                    data-hover-parent=".portfolio-item"></div>
                            </div>
                            <!-- Overlay: End -->
                        </div>
                        <!-- Image: End -->
                        <!-- Decription: Start -->
                        <div class="portfolio-desc">
                            <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                            <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                        </div>
                        <!-- Description: Start -->
                    </div>
                    <!-- Grid Inner: End -->
                </article>
            </div>
        </div>

        <div class="container mt-2">
            <div class="heading-block center">
                <h2>TIPS & Trick</h2>
                {{-- <span class="text-capitalize">budget minim? gunakan <strong>PROMO</strong> dengan bijak</span>
                --}}
            </div>
            <div class="row border-between">
                <div class="col-lg-12">

                    <div class="row col-mb-50">
                        <article class="col-12">
                            <div class="row">
                                <div class="col-md-6 entry-image mb-0">
                                    <a href="#">
                                        <img src="/front/demos/blog/images/lists/1.jpg" alt="Image">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="entry-title mt-lg-0 mt-3">
                                        <div class="entry-categories"><a href="demo-blog-categories.html">Coronavirus
                                                Update - World</a></div>
                                        <h3><a href="demo-blog-single.html" class="color-underline stretched-link">Apple
                                                and Google Team Up to ‘Contact Trace’ the Coronavirus</a></h3>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><a href="#">Mar 11, 2016</a></li>
                                        </ul>
                                    </div>
                                    <div class="entry-content">
                                        <p>The technology giants said they would embed a feature in iPhones and Android
                                            devices to enable users to track infected people they’d come close to.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #content end -->
@endsection