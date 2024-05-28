@extends('front.template.themes')
@section('css')
<style>
    .sale-position {
        top: 35%;
        left: -8px;
        transform: rotate(-25deg);
        font-size: 30px;
        background-color: #F7B600;
        z-index: 9;
    }

    @media (min-width:769px) {
        .sale-position {
            top: 33%;
        }
    }

    @media (max-width:768px) {
        .sale-position {
            top: 14%;
        }
    }

    @media (max-width:480px) {
        .sale-position {
            top: 9%;
        }
    }

    @media (max-width:375px) {
        .sale-position {
            top: 12%;
        }
    }

    #header-wrap {
        background-color: #596F63 !important;
    }


    .sticky-header.full-header #header-wrap {
        border: 0px !important;
    }

    .full-header {
        border: 0px !important;
    }

    .full-header .primary-menu .menu-container {
        border: 0px !important;
    }

    .full-header #logo {
        border: 0px !important;
    }

    #logo a {
        color: white;
    }

    .menu-link {
        color: white;
    }

    .button.button-dark {
        color: black;
        background-color: white;
    }
</style>
@endsection
@section('content')
<section class="slider">
    <div class="swiper" style="background-color: #596F63">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="#">
                    <img class="images" src="{{asset('images/bg2.png')}}" width="100%" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#">
                    <img class="images" src="{{asset('images/bg2.png')}}" width="100%" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#">
                    <img class="images" src="{{asset('images/bg2.png')}}" width="100%" alt="">
                </a>
            </div>
        </div>
</section>
<div class="sale-flash badge badge-success p-2 text-uppercase sale-position">
    Sale!</div>
<section class="mt-4">
    <div class="container">
        <h2>Serbu Promonya Sekarang Juga!</h2>
        <div class="row">
            @foreach($promo as $key => $va)
            <div class="col-lg-4 mb-4">
                <div class="card text-white" style="background-color: {{$key%2 == 1 ? '#9E81BB' : '#EE6B8B' }} ">
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
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    var swiper = new Swiper(".swiper", {
      slidesPerView: 3,
      spaceBetween: 2,
      centeredSlides: true,
      height: 5,
      initialSlide: 1,
    });
</script>
@endsection