@extends('front.template.themes')
@section('content')
<!-- Referensi Detail -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="single-product">
                <div class="product">
                    <div class="row gutter-40">
                        <div class="col-md-5">
                            <!-- Product Single - Gallery
									============================================= -->
                            <div class="product-image" >
                                <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                    <div class="flexslider">
                                        <div class="slider-wrap" data-lightbox="gallery">
                                            <div class="slide" data-thumb="/gambar?rf={{$kategori->gambar}}"  >
                                                <a href="/gambar?rf={{$kategori->gambar}}"
                                                    title="Pink Printed Dress - Front View"
                                                    data-lightbox="gallery-item"><img
                                                        src="/gambar?rf={{$kategori->gambar}}" alt="Pink Printed Dress">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Product Single - Gallery End -->
                        </div>
                        <div class="col-md-5 product-desc" hidden>
                            <p>{{$kategori->deskripsi}}</p>

                        </div>
                    </div>
                </div>

                <div class="line"></div>

            </div>
        </div>
</section><!-- #content end -->
<!-- #content end -->
@endsection