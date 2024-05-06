@extends('front.template.themes')
@section('content')
<section class="content">
    <div class="content-wrap">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{asset('images/test1.png')}}" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{asset('images/test1.png')}}" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{asset('images/test1.png')}}" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{asset('images/test1.png')}}" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{asset('images/test1.png')}}" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{asset('images/test1.png')}}" alt="">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <img src="{{asset('images/test1.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>
</section>
{{-- <section id="content">
    <div class="content-wrap">
        <div class="heading-block center">
            About
        </div>
    </div>
</section> --}}

<section class="filter mt-5 container clearfix">
    <div class="pencarian text-center" style="">
        <div class="row">
            <div class="col-lg-3 mr-4">
                <div class="card">
                    <div class="card-body">
                        <div class="">Sembunyikan Filter</div>
                    </div>
                </div>
            </div>
            <div class="row border border-4 p-2 col-lg-8">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center mt-2">
                        <p class="m-0">Urutkan</p>
                        <div class="badge badge-secondary ml-auto">Rekomendasi</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <select name="" id="" class="form-control">
                        <option value="">Harga</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <select name="" id="" class="form-control">
                        <option value="">Jumlah Orang</option>
                    </select>
                </div>
                <div class="col-lg-3">
                    <select name="" id="" class="form-control">
                        <option value="">Tema</option>
                    </select>
                </div>
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
                        <div class="price"><del>Rp. {{number_format($v->harga_diskon)}}</del> <b>Rp.
                                {{number_format($v->harga)}}</b></div>
                        <div class="total-booking text-secondary">98 Booking</div>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <a class="button button-small button-dark button-circle pt-2 pb-2 text-center" href="#">
                                Booking
                            </a>
                            <svg width="19" height="17" viewBox="0 0 19 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.58333 1C3.05208 1 1 3.05208 1 5.58333C1 10.1667 6.41667 14.3333 9.33333 15.3025C12.25 14.3333 17.6667 10.1667 17.6667 5.58333C17.6667 3.05208 15.6146 1 13.0833 1C11.5333 1 10.1625 1.76958 9.33333 2.9475C8.9107 2.3455 8.34923 1.8542 7.69647 1.5152C7.04371 1.1762 6.31887 0.999481 5.58333 1Z"
                                    stroke="#BABABA" stroke-width="1.66667" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <ul class="pagination justify-content-center mt-4">
            <li class="page-item"><a class="page-link" href="{{$product->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">«</span></a></li>
            @for($i = 1; $i <= $product->total(); $i++)
                <li class="page-item {{$i==$product->currentPage()?'active':''}}"><a class="page-link"
                        href="/katalog-studio?page={{$i}}">{{$i}}</a></li>
                @endfor
                <li class="page-item"><a class="page-link" href="{{$product->nextPageUrl()}}" aria-label="Next"><span
                            aria-hidden="true">»</span></a>
                </li>
        </ul>
        <div class="line"></div>

    </div>
</section>
@endsection
@section('js')
<script>
    var swiper = new Swiper(".swiper", {
      slidesPerView: 6,
      spaceBetween: 1,
      centeredSlides: true,
      initialSlide: 2,
    });
</script>

@endsection