@extends('front.template.themes')
@section('content')
<style>
    label {
        display: block;
        padding: 5px;
        position: relative;
    }

    label input {
        display: none;
    }

    .radiox[disabled]+span {
        background-color: #000000;
        color: #ffffff;
    }

    label span {
        border: 1px solid #ccc;
        width: 56px;
        height: 26px;
        position: absolute;
        overflow: hidden;
        line-height: 2;
        text-align: center;
        border-radius: 10px;
        font-size: 10pt;
        left: 0;
        top: 50%;
        margin-top: -7.5px;
    }

    input:checked+span {
        background: #ccf;
        border-color: #ccf;
    }
</style>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="card-body p-2">
                    <h4 class="m-0">Booking</h4>
                </div>
            </div>
            <div class="row gutter-40 mt-4">
                <div class="col-md-3">
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

                        {{-- <div class="sale-flash badge badge-danger p-2">Sale!</div> --}}
                    </div><!-- Product Single - Gallery End -->
                    <span><i class="icon-exclamation-sign mt-4 mr-2"></i>Datang
                        15 menit sebelum sesi foto
                        dimulai</span>
                </div>
                <div class="col-md-4 product-desc">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="product-price"><del>RP. {{number_format($data->harga+150000)}}</del>
                            <ins>RP. {{number_format($data->harga)}}</ins>
                        </div>
                    </div>
                    <div class="text-secondary">
                        @if($data->min_orang == $data->max_orang)
                        {{$data->min_orang}} Orang
                        @else
                        {{$data->min_orang . ' - ' . $data->max_orang}} Orang
                        @endif
                    </div>
                    <p>{{$data->deskripsi}}</p>
                </div>
                <input type="text" name="max_orang" id="max_orang" value="{{$data->max_orang}}" hidden>
                <input type="text" name="harga" id="harga" value="{{$data->harga}}" hidden>
                <div class="col-md-5">
                    <h4>Isi Fomulir :</h4>
                    <form action="/proses-booking" method="POST" class="col-md-10 mt-4" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="product_id" id="product_id" value="{{$data->id}}" hidden>
                        <div class="form-group" hidden>
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
                            <label for="" class="text-capitalize">jumlah orang</label>
                            <select name="jumlah_orang" id="jumlah_orang" class="form-control">
                                @for($i = $data->min_orang; $i <= 10; $i++) <option value="{{$i}}">{{$i}}
                                    </option>
                                    @endfor
                            </select>
                            <small class="text-warning" id="tambahharga"></small>
                            @error('jumlah_orang')
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
                            <label for="" class="text-capitalize">tanggal</label>
                            {{-- <input type="datetime-local" name="tanggal" id="tanggal" class="form-control"> --}}
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                            @error('tanggal')
                            <small class="text-danger">Harus di isi</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="text-capitalize">jam</label>
                            <div class="d-flex">
                                <label class="" style="margin-right: 52px;"><input type="radio" name="jam" id="18"
                                        class="radiox" style="border: 0" value="18.00" /><span>18.00</span></label>
                                <label class="" style="margin-right: 52px;"><input type="radio" name="jam" id="19"
                                        class="radiox" style="border: 0" value="19.00" /><span>19.00</span></label>
                                <label class="" style="margin-right: 52px;"><input type="radio" name="jam" id="20"
                                        class="radiox" style="border: 0" value="20.00" /><span>20.00</span></label>
                                <label class="" style="margin-right: 52px;"><input type="radio" name="jam" id="21"
                                        class="radiox" style="border: 0" value="21.00" /><span>21.00</span></label>
                                <label class="" style="margin-right: 52px;"><input type="radio" name="jam" id="22"
                                        class="radiox" style="border: 0" value="22.00" /><span>22.00</span></label>
                                <label class="" style="margin-right: 52px;"><input type="radio" name="jam" id="23"
                                        class="radiox" style="border: 0" value="23.00" /><span>23.00</span></label>
                            </div>
                            @error('jam')
                            <small class="text-danger">Harus di isi</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2" hidden>
                            <label for="" class="text-capitalize">Bukti DP</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                accept="image/png, image/gif, image/jpeg">
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
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        let jams = ['22'];
        $('#tanggal').attr('min', dayjs().format('YYYY-MM-DD'));
        let j = dayjs().hour() - 2;
        var checkboxes = document.querySelectorAll("input[name=jam]");
        checkboxes.forEach(e => {
            $('#'+e.id).removeAttr('disabled');
            if (e.id < j) {
                $('#'+e.id).attr('disabled',true);
            }
            if (!jams.indexOf(e.id)) {
                $('#'+e.id).attr('disabled',true);
            }
            console.log(e.id);
        });
        console.log(jams);
    })
    $('#jumlah_orang').on('change', function () {
        let v = $(this).val();
        let x = $('#max_orang').val();
        let h = $('#harga').val();
        $('#tambahharga').html('');
        let harga = h/x;
        if (v > x) {
            $('#tambahharga').html('Maksimal ' + x + ' orang bila lebih maka terdapat tambahan biaya, sebesar Rp.'+harga.toFixed()+' per orang');
        }
    })
    $('#gambar').on('change',function (e) {
        console.log(e);
        let src = URL.createObjectURL(e.target.files[0]);
        $('.imagepreview').attr('src',src);
    })
</script>
@endsection