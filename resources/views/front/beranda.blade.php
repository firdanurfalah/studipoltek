@extends('front.template.themes')
@section('content')
<style>
    .top-cart-number::before {
        background-color: #ff0000;
    }

    .title {
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        font-family: 'Poppins'
    }

    .imagetext {
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
{{-- <section id="slider" class="slider-element slider-parallax swiper_wrapper vh-75">
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
</section> --}}

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">

        <div class="container clearfix">
            <div class="row">
                <div class="col-lg-6">
                    <span class="text-secondary">Ms. Studio</span>
                    <p>
                    <h2 class="m-0">Masih Bingung Cari</h2>
                    <h2 style="font-weight: bold">Studio Foto ?</h2>
                    </p>
                    <p class="text-secondary m-0" style="font-size: 16px">Yuk, booking sekarang! </p>
                    <p class="text-secondary" style="font-size: 16px">
                        Dapatkan promo
                        menarik dari Ms. Studio
                    </p>
                    <div class="d-flex">
                        <a class="button button-small button-dark button-circle pt-2 pb-2" href="/katalog-studio">
                            Booking Now
                        </a>
                        <a class="button button-small button-dark button-circle pt-2 pb-2" href="/referensi">
                            Style Reference
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="/images/1.png" alt="" width="100%">
                </div>
            </div>
        </div>

        <div class="container clearfix mt-4">
            <div class="heading-block center">
                <h3>Best Recomendation</h3>
            </div>

            <div class="row col-mb-50 justify-content-center">
                @foreach($product as $key => $v)
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <span class="top-cart-number"
                                style="top: -10px; right: -10px; width: 2rem; height: 2rem; line-height: 2rem;">
                                HOT
                            </span>
                            <img style="border-radius: 10px" src="/gambar?rf={{$v->gambar}}" alt="" width="100%">
                            <div class="title">{{$v->nama}}</div>
                            <div class="price">
                                <b>Rp. {{number_format($v->harga)}}</b>
                                @if($v->harga_diskon > 0)
                                <del>Rp. {{number_format($v->harga_diskon)}}</del>
                                @endif
                            </div>
                            {{-- <div class="total-booking text-secondary">98 Booking</div> --}}
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <a class="button button-small button-dark button-circle pt-2 pb-2 text-center"
                                    href="/produk/{{$v->id}}">
                                    Booking
                                </a>
                                <a href="/setfavorit/{{$v->id}}">
                                    <svg width="19" height="17" viewBox="0 0 19 17"
                                        fill="{{in_array($v->id,$favorit) ? 'red' : 'none'}}"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.58333 1C3.05208 1 1 3.05208 1 5.58333C1 10.1667 6.41667 14.3333 9.33333 15.3025C12.25 14.3333 17.6667 10.1667 17.6667 5.58333C17.6667 3.05208 15.6146 1 13.0833 1C11.5333 1 10.1625 1.76958 9.33333 2.9475C8.9107 2.3455 8.34923 1.8542 7.69647 1.5152C7.04371 1.1762 6.31887 0.999481 5.58333 1Z"
                                            stroke="#BABABA" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="line"></div>

        </div>

        <div class="card" style="background-color: #d2d2fc">
            <div class="sale-flash badge badge-success p-2 text-uppercase"
                style="top: 5px; left: -8px; transform: rotate(-25deg); font-size: 30px; background-color: #F7B600">
                Sale!</div>
            <div class="heading-block center">
                <h2 class="">Ramadhan Sale</h2>
                <span class="text-capitalize">Dapatkan promo spesial bulan ramadhan</span>
            </div>
            <!-- Promo
                ============================================= -->
            <div class="container">
                <div class="row">
                    @foreach($promo as $key => $va)
                    <div class="col-lg-4 mb-4">
                        <div class="card text-white"
                            style="background-color: {{$key%2 == 1 ? '#9E81BB' : '#EE6B8B' }} ">
                            <div class="card-body">
                                <div>
                                    <img src="/gambar?rf={{$va->gambar}}" alt="Open Imagination" width="100%">
                                    <div class="imagetext"></div>
                                </div>
                                <div class="text-right">s&k berlaku</div>
                                <p class="m-0">{{strlen($va->deskripsi) > 60 ? substr($va->deskripsi,0,60).'...' :
                                    $va->deskripsi}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-lg-4">
                        <div class="card" style="background-color: #EE6B8B">
                            <div class="card-body">
                                <img src="/front/images/portfolio/4/1.jpg" alt="Open Imagination">
                                <div class="text-right">s&k berlaku</div>
                                <p class="m-0">Paket Couple hanya 40 ribu saja. Segera booking sebelum promo
                                    berakhir
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="background-color: #FDC45B">
                            <div class="card-body">
                                <img src="/front/images/portfolio/4/1.jpg" alt="Open Imagination">
                                <div class="text-right">s&k berlaku</div>
                                <p class="m-0">Paket Couple hanya 40 ribu saja. Segera booking sebelum promo
                                    berakhir
                                </p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- <div id="portfolio" class="portfolio row grid-container portfolio-reveal no-gutters"
                    data-layout="fitRows">

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
                                            data-hover-speed="350" data-hover-parent=".portfolio-item"
                                            data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
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
                </div> --}}
            </div>
        </div>
        <div class="container mt-2">
            <div class="heading-block center">
                <h2>Capture Your Precious Moments</h2>
                {{-- <span class="text-capitalize">budget minim? gunakan <strong>PROMO</strong> dengan bijak</span>
                --}}
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/images/11.png">
                            <h4>Affordable Prices</h4>
                            <p class="m-0 text-secondary">Abadikan momen indah Anda dengan harga terjangkau di studio
                                kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/images/12.png">
                            <h4>Best Quality</h4>
                            <p class="m-0 text-secondary">Kualitas terbaik dengan teknologi kamera terbaik kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/images/13.png">
                            <h4>Costume Ready</h4>
                            <p class="m-0 text-secondary">Pilihan kostum menarik siap
                                mempercantik setiap sesi foto Anda</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row border-between">
                <div class="col-lg-12">
                    <div class="row col-mb-50">
                        @foreach($article as $key => $value)
                        <article class="col-12">
                            <div class="row">
                                <div class="col-md-6 entry-image mb-0">
                                    <a href="#">
                                        <img src="/gambar?rf={{$value->gambar}}" alt="Image">
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="entry-title mt-lg-0 mt-3">
                                        <h3><a href="#" class="color-underline stretched-link">
                                                {{$value->judul}}</a></h3>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><a
                                                    href="#">{{\Carbon\Carbon::parse($value->created_at)->format('d-m-Y')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry-content">
                                        {{$value->deskripsi}}
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="container clearfix mt-4">
            <div class="heading-block center">
                <h3>New Arrival</h3>
            </div>

            <div class="row col-mb-50 justify-content-center">
                @foreach($arrival as $key => $v)
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <span class="top-cart-number"
                                style="top: -10px; right: -10px; width: 2rem; height: 2rem; line-height: 2rem;">
                                HOT
                            </span>
                            <img style="border-radius: 10px" src="/gambar?rf={{$v->gambar}}" alt="" width="100%">
                            <div class="title">{{$v->nama}}</div>
                            <div class="price">
                                <b>Rp.
                                    {{number_format($v->harga)}}</b>
                                @if($v->harga_diskon > 0)
                                <del>Rp. {{number_format($v->harga_diskon)}}</del>
                                @endif
                            </div>
                            {{-- <div class="total-booking text-secondary">98 Booking</div> --}}
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <a class="button button-small button-dark button-circle pt-2 pb-2 text-center"
                                    href="/produk/{{$v->id}}">
                                    Booking
                                </a>
                                <a href="/setfavorit/{{$v->id}}">
                                    <svg width="19" height="17" viewBox="0 0 19 17"
                                        fill="{{in_array($v->id,$favorit) ? 'red' : 'none'}}"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.58333 1C3.05208 1 1 3.05208 1 5.58333C1 10.1667 6.41667 14.3333 9.33333 15.3025C12.25 14.3333 17.6667 10.1667 17.6667 5.58333C17.6667 3.05208 15.6146 1 13.0833 1C11.5333 1 10.1625 1.76958 9.33333 2.9475C8.9107 2.3455 8.34923 1.8542 7.69647 1.5152C7.04371 1.1762 6.31887 0.999481 5.58333 1Z"
                                            stroke="#BABABA" stroke-width="1.66667" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- #content end -->
@endsection