@extends('front.template.themes')
@section('css')
<style>
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
                    <img src="{{asset('images/bg2.png')}}" width="100%" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#">
                    <img src="{{asset('images/bg2.png')}}" width="100%" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="#">
                    <img src="{{asset('images/bg2.png')}}" width="100%" alt="">
                </a>
            </div>
        </div>
</section>
<section class="mt-4">
    <div class="containter clearfix">
        <div class="tabs tabs-bb clearfix ui-tabs ui-corner-all ui-widget ui-widget-content text-center" id="tab-9">
            <ul class="tab-nav clearfix ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                role="tablist" style="justify-content: center; border:0px;">
                @foreach($kategori as $key => $value)
                <li role="tab" tabindex="0"
                    class="ui-tabs-tab ui-corner-top ui-state-default ui-tab {{$key==0?'ui-tabs-active ui-state-active':''}}"
                    aria-controls="tabs-{{$key}}" aria-labelledby="ui-id-{{$key}}" aria-selected="true"
                    aria-expanded="true"><a href="#tabs-{{$key}}" role="presentation" tabindex="-1"
                        class="ui-tabs-anchor" id="ui-id-{{$key}}">{{$value->nama}}</a></li>
                @endforeach
            </ul>

            <div class="container tab-container">
                @foreach($kategori as $key => $v)
                <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tabs-{{$key}}"
                    aria-labelledby="ui-id-{{$key}}" role="tabpanel" aria-hidden="false">
                    <div class="row">
                        @foreach($v->referensi as $key => $va)
                        <div class="col-lg-3">
                            <a href="/referensi-detail/{{$va->id}}">
                                <div class="card" style="border: 0px">
                                    <div class="card-body">
                                        <img src="/gambar?rf={{$va->gambar}}" alt="">
                                        <div class="mt-2">
                                            {{$va->nama}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>

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