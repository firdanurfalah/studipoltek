@extends('front.template.themes')
@section('content')
<!-- Content
============================================= -->
<section id="content">
    <div class="container clearfix mb-4">
        <div class="heading-block center">
            <h2>PROMO</h2>
        </div>
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
                                    class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall"
                                    data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"
                                    data-hover-parent=".portfolio-item" data-lightbox="image" title="Image"><i
                                        class="icon-line-plus"></i></a>
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
</section>
<!-- #content end -->
@endsection