@extends('front.template.themes')
@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <h2 class="">Form Booking</h2>
            <div class="row gutter-40 ">
                <div class="col-md-5">
                    <!-- Product Single - Gallery
                            ============================================= -->
                    <div class="product-image">
                        <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                            <div class="flexslider">
                                <div class="slider-wrap" data-lightbox="gallery">
                                    <div class="slide" data-thumb="/gambar?rf={{$data->gambar}}">
                                        <a href="/gambar?rf={{$data->gambar}}" title="Pink Printed Dress - Front View"
                                            data-lightbox="gallery-item"><img src="/gambar?rf={{$data->gambar}}"
                                                alt="Pink Printed Dress">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sale-flash badge badge-danger p-2">Sale!</div>
                    </div><!-- Product Single - Gallery End -->
                </div>
                <div class="col-md-5 product-desc">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="product-price"><del>RP. {{number_format($data->harga+150000)}}</del>
                            <ins>RP. {{number_format($data->harga)}}</ins>
                        </div>
                    </div>
                    <p>{{$data->deskripsi}}</p>
                </div>
            </div>
            <form action="/proses-booking" method="POST" class="col-md-10 mt-4" enctype="multipart/form-data">
                @csrf
                <input type="text" name="product_id" id="product_id" value="{{$data->id}}" hidden>
                <div class="form-group">
                    <label for="" class="text-capitalize">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                    <small class="text-danger">Harus di isi</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="text-capitalize">nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                    @error('nama')
                    <small class="text-danger">Harus di isi</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="text-capitalize">no hp</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control">
                    @error('no_hp')
                    <small class="text-danger">Harus di isi</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="text-capitalize">tanggal dan jam</label>
                    <input type="datetime-local" name="tanggal" id="tanggal" class="form-control">
                    @error('tanggal')
                    <small class="text-danger">Harus di isi</small>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="" class="text-capitalize">Bukti DP</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <div class="w-50">
                        <img src="" alt="" class="imagepreview">
                    </div>
                    @error('gambar')
                    <small class="text-danger">Harus di isi</small>
                    @enderror
                </div>
                <button class="btn btn-primary">Booking</button>
            </form>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $('#gambar').on('change',function (e) {
        console.log(e);
        let src = URL.createObjectURL(e.target.files[0]);
        $('.imagepreview').attr('src',src);
    })
</script>
@endsection