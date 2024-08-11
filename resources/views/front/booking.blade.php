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
        background-color: #ff0000;
        color: #ffffff;
    }

    input:checked+span {
        background-color: #0026ff !important;
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
                    <h2 class="text-capitalize">{{$data->nama}}</h2>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="product-price"><del>RP. {{number_format($data->harga+150000)}}</del>
                            <ins>RP. {{number_format($data->harga)}}</ins>
                        </div>
                    </div>
                    <table>
                        <tbody>
                            <tr>
                                <td>Background</td>
                                <td>: {{$data->background}}</td>
                            </tr>
                            <tr>
                                <td>Waktu</td>
                                <td>: {{$data->waktu}}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Orang</td>
                                <td>: @if($data->min_orang == $data->max_orang)
                                    {{$data->min_orang}} Orang
                                    @else
                                    {{$data->min_orang . ' - ' . $data->max_orang}} Orang
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                            <small class="text-danger">Harus di isi </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="text-capitalize">nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{old('nama') ? old('nama') : Auth::user()->name}}">
                            @error('nama')
                            <small class="text-danger">Harus di isi dan tanpa ada simbol dan tanpa ada angka</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="" id="harga_per_orang" value="{{$data->harga_per_orang}}" hidden>
                            <label for="" class="text-capitalize">jumlah orang</label>
                            <select name="jumlah_orang" id="jumlah_orang" class="form-control" required>
                                @for($i = $data->min_orang; $i <= 10; $i++) <option value="{{$i}}">{{$i}}
                                    </option>
                                    @endfor
                            </select>
                            <small class="text-warning" id="tambahharga"></small>
                            @error('jumlah_orang')
                            <small class="text-danger">Harus di isi</small>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="no" class="text-capitalize">no hp</label>
                            <input type="number" name="no_hp" id="no_hp" class="form-control" 
                                value="{{old('no_hp') ? old('no_hp') : Auth::user()->no_hp}}" required>
                            @error('no_hp')
                            <small class="text-danger">Harus di isi dan panjang karakter minimal 10 sampai 15</small>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="no_hp" class="text-capitalize">No HP</label>
                            <input 
                                type="text" 
                                name="no_hp" 
                                id="no_hp" 
                                class="form-control" 
                                value="{{ old('no_hp') ? old('no_hp') : Auth::user()->no_hp }}" 
                                required 
                                {{-- pattern="\d{10}"  --}}
                                title="Harus berupa 10-13 digit angka"  maxlength="13"
                            >
                            @error('no_hp')
                            <small class="text-danger">Harus diisi dan panjang karakter harus 13 digit angka.</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="text-capitalize">tanggal</label>
                            {{-- <input type="datetime-local" name="tanggal" id="tanggal" class="form-control"> --}}
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{old('tanggal')}}" required>
                            @error('tanggal')
                            <small class="text-danger">Harus di isi</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="text-capitalize">keterangan <small>(optional)</small></label>
                            <textarea name="keterangan_user" id="keterangan_user" class="form-control"></textarea>
                            {{-- @error('keterangan')
                            <small class="text-danger">Harus di isi</small>
                            @enderror --}}
                        </div>
                        {{-- <div class="form-group">
                            <label for="" class="text-capitalize">jam</label>
                            <div class="d-flex">
                                <label class="" style="margin-right: 52px;"><input required type="radio" name="jam"
                                        id="18" class="radiox" style="border: 0"
                                        value="18.00" /><span>18.00</span></label>
                                <label class="" style="margin-right: 52px;"><input required type="radio" name="jam"
                                        id="19" class="radiox" style="border: 0"
                                        value="19.00" /><span>19.00</span></label>
                                <label class="" style="margin-right: 52px;"><input required type="radio" name="jam"
                                        id="20" class="radiox" style="border: 0"
                                        value="20.00" /><span>20.00</span></label>
                                <label class="" style="margin-right: 52px;"><input required type="radio" name="jam"
                                        id="21" class="radiox" style="border: 0"
                                        value="21.00" /><span>21.00</span></label>
                                <label class="" style="margin-right: 52px;"><input required type="radio" name="jam"
                                        id="22" class="radiox" style="border: 0"
                                        value="22.00" /><span>22.00</span></label>
                                <label class="" style="margin-right: 52px;"><input required type="radio" name="jam"
                                        id="23" class="radiox" style="border: 0"
                                        value="23.00" /><span>23.00</span></label>
                            </div>
                            @error('jam')
                            <small class="text-danger">Harus di isi</small>
                            @enderror
                        </div> --}}
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
                        <div class="form-group">
                            <label for="" class="text-capitalize">Price Total</label>
                            <input type="text" name="price_total" id="price_total" class="form-control"
                                value="{{$data->harga}}" readonly>
                            @error('price_total')
                            <small class="text-danger">Harus di isi</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <button id="pay-button" class="btn btn-primary">Pay!</button> --}}

</section>
@endsection
@section('js')
<script>
    let hargaawal = $('#price_total').val();
    let jamsekarang = dayjs().hour();
    $(document).ready(function () {
        let jams = [];
        $('#tanggal').attr('min', dayjs().format('YYYY-MM-DD'));
        let j = dayjs().hour() + 2;
        // var checkboxes = document.querySelectorAll("input[name=jam]");
        // checkboxes.forEach(e => {
        //     $('#'+e.id).removeAttr('disabled');
        //     if (e.id < j) {
        //         $('#'+e.id).attr('disabled',true);
        //     }
        //     if (!jams.indexOf(e.id)) {
        //         $('#'+e.id).attr('disabled',true);
        //     }
        //     console.log(e.id, j);
        // });
        // console.log(jams);
    })
    $('#tanggal').on('change', function () {
        return true;
        let jams = [];
        let j = dayjs($(this).val()).format('DDMMYYYY');
        let now = dayjs().format('DDMMYYYY');

        // buat semua checkbox enabled
        var checkboxes = document.querySelectorAll("input[name=jam]");
        if (j == now) {
            checkboxes.forEach(e => {
                $('#'+e.id).removeAttr('disabled');
                if (e.id < (jamsekarang + 2)) {
                    $('#'+e.id).attr('disabled',true);
                }
                if (!jams.indexOf(e.id)) {
                    $('#'+e.id).attr('disabled',true);
                }
            });
        }else{
            checkboxes.forEach(e => {
                $('#'+e.id).removeAttr('disabled');
            });
        }
        // buat semua checkbox enabled

        // ajax untuk check ketersediaan tanggal
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/checktanggal?tanggal="+$(this).val(),
        // data : {'token' : token},
        type : 'GET',
        dataType : 'json',
        success : function(result){
            // disabled jam booking sesuai database
            result.forEach(element => {
                let el = element.split('.');
                checkboxes.forEach(e => {
                    $('#'+e.id).removeAttr('disabled');
                    if (e.id == el[0]) {
                        $('#'+e.id).attr('disabled',true);
                    }
                    // if (!jams.indexOf(e.id)) {
                    //     $('#'+e.id).attr('disabled',true);
                    // }
                });
            });
        }
        });
        
    });
    $('#jumlah_orang').on('change', function () {
        let v = $(this).val();
        let x = $('#max_orang').val();
        let h = $('#harga').val();
        console.log('x',v,x,h);
        $('#tambahharga').html('');
        let harga = $('#harga_per_orang').val();
        $('#price_total').val(hargaawal);
        if (Number(v) > x) {
            let pt = Number(h) + Number((v - x) * harga);
            $('#price_total').val(pt);

            $('#tambahharga').html('Maksimal ' + x + ' orang bila lebih maka terdapat tambahan biaya, sebesar Rp.'+harga+' per orang');
        }
    })
    $('#gambar').on('change',function (e) {
        console.log(e);
        let src = URL.createObjectURL(e.target.files[0]);
        $('.imagepreview').attr('src',src);
    })
</script>

{{-- disini semua tentang midtrans --}}
{{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Uf-KAvUs6SgE1DRi">
</script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        console.log('2 clicked');
        snap.pay('{{ $snap_token }}', {
                        onSuccess: function(result){console.log(result);},
                        onPending: function(result){console.log(result);},
                        onError: function(result){console.log(result);}
                    });
};
</script> --}}

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script type="text/javascript">
    $('#pay-button').click(function (event) {
    event.preventDefault();
    
    $.post("payment", {
        _method: 'POST',
        _token: '{{ csrf_token() }}',
        // name: $('#name').val(),
        // email: $('#email').val(),
        // amount: $('#amount').val(),
        // note: $('#note').val()
    },
    function (data, status) {
        
        console.log(data);
        snap.pay(data.snap_token.snap_token, {
            onSuccess: function (result) {
                location.reload();
                console.log(result);
            },
    
            onPending: function (result) {
                location.reload();
                console.log(result);
            },
    
            onError: function (result) {
                location.reload();
                console.log(result);
            }
            
        });
        return false;
    });
    });
</script>
@endsection