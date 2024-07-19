@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <div class="card-header">
    </div>

    <!-- CONTENT AREA -->
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-content-area br-4">
                    <div class="widget-one">
                        <table id="table" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-capitalize" width="10%">no</th>
                                    <th class="text-capitalize">no hp</th>
                                    <th class="text-capitalize">tanggal dan jam</th>
                                    <th class="text-capitalize">nama</th>
                                    <th class="text-capitalize">produk</th>
                                    <th class="text-capitalize">status</th>
                                    <th class="text-capitalize">Link</th>
                                    <th class="no-content text-center text-capitalize" width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($x as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    {{-- <td><img src="/gambar?rf={{$value->gambar}}" alt="" width="100px"></td> --}}
                                    <td>{{$value->nohp}}</td>
                                    <td>{{$value->tanggal}} - @if($value->last_edit_user != Auth::id())
                                        <span class="badge badge-success" title="admin yg menentukan jam">
                                            {{$value->jam}}
                                        </span>
                                        @else
                                        <span class="badge badge-warning" title="anda yg menentukan jam">
                                            {{$value->jam}}
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->product ? $value->product->nama : ''}}</td>
                                    <td>
                                        @if($value->status == 0)
                                        <span class="badge badge-info">Proses</span>
                                        @elseif($value->status == 3)
                                        <span class="badge badge-primary">Diterima</span>
                                        @elseif($value->status == 2)
                                        <span class="badge badge-dark">Selesai
                                            Pembayaran</span>
                                        @elseif($value->status == 1)
                                        <span class="badge badge-success">Selesai
                                            Pemotretan</span>
                                        @else
                                        <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($value->link)
                                        <a href="{{$value->link}}" target="_blank">Google Drive</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="/admin-referensi/{{$value->id}}/edit"
                                            class="btn btn-primary btn-sm">Edit</a> --}}
                                        <span class="btn btn-info btn-sm" onclick="detail({{$value}})">Detail</span>
                                        <span class="btn btn-warning btn-sm" onclick="bukti({{$value}})">Bukti
                                            Pembayaran</span>
                                        {{-- @if($value->jam != 'kosong' && $value->status == 0)
                                        @else
                                        @endif --}}
                                        {{-- @if($value->jam != 'kosong' && $value->status == 0) <span
                                            class="btn btn-warning btn-sm" onclick="konfirmasi({{$value}})">Konfirmasi
                                            Jam</span>
                                        @elseif($value->jam != 'kosong' && $value->status > 3)
                                        <span class="btn btn-warning btn-sm" onclick="bukti({{$value}})">Bukti
                                            Pembayaran</span>
                                        @elseif($value->jam == 'kosong' && $value->status == 0)
                                        @else
                                        <span class="btn btn-warning btn-sm" onclick="bukti({{$value}})">Bukti
                                            Pembayaran</span>
                                        @endif --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Konfirmasi Jam-->
    <div class="modal fade" id="modalkonfirmasijam" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Konfirmasi Jam</h5>
                    <span class="" data-dismiss="modal" aria-label="Close" style="cursor: pointer">x</span>
                </div>
                <div class="modal-body">
                    <h3 id="totalharga"></h3>
                    <form action="/konfirmasijam" method="GET" id="formkonfirmasijam">
                        @csrf
                        <input type="text" name="idbookingjam" id="idbookingjam" hidden>
                        <div class="form-group">
                            <label for="">Konfirmasi Jam</label>
                            {{-- <select name="status" id="status" class="form-control">
                                <option value="3">Lanjut</option>
                                <option value="0">Ganti</option>
                                <option value="99">Cancel</option>
                            </select> --}}
                        </div>
                        <div class="form-group" id="inputjam">
                            <label for="">Jam</label>
                            <input type="time" name="jam" id="jam" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <span class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close"
                            style="cursor: pointer">Tutup</span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bukti Pembayaran-->
    <div class="modal fade" id="modalbukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Detail</h5>
                    <span class="" data-dismiss="modal" aria-label="Close" style="cursor: pointer">x</span>
                </div>
                <div class="modal-body">
                    <h3 id="totalharga"></h3>
                    <form action="" method="POST" id="formbukti" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="idbooking" id="idbooking" hidden>
                        <div class="form-group">
                            <label for="">Konfirmasi Jam</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="3">Lanjut</option>
                                <option value="99">Cancel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tipe Pembayaran</label>
                            <select name="type" id="type" class="form-control">
                                <option value="2">Bayar Langsung</option>
                                <option value="1">Transfer</option>
                            </select>
                        </div>
                        <div class="form-group" id="koltransfer" hidden>
                            <h2>No. Rekening : BRI 584501029474534</h2>
                            <h2>Atas Nama : M. Sufi Ali</h2>
                            <label for="">Bukti Pembayaran</label>
                            <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg"
                                class="form-control @error('image') is-invalid @enderror"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img id="blah" alt="gambar" width="100" height="100" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <span class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close"
                            style="cursor: pointer">Tutup</span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Detail</h5>
                    <span class="" data-dismiss="modal" aria-label="Close" style="cursor: pointer">x</span>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="" width="100%" id="imagedetail">
                    <div class="d-flex">
                        <span id="kiri" class="">Kiri</span>
                        <span id="kanan" class="ml-auto">Kanan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
</div>
<!--  END CONTENT AREA  -->
<script>
    $('#type').on('change', function () {
        let v = $(this).val();
        $('#koltransfer').attr('hidden',true);
        if (v == 1) {
            $('#koltransfer').removeAttr('hidden');
        }
    })
    $('#status').on('change', function () {
        let v = $(this).val();
        showjam(v);
    })
    function showjam(i) {
        $('#inputjam').attr('hidden',true);
        if (i == 0) {
            $('#inputjam').removeAttr('hidden');
        }
    }
    function konfirmasi(data) {
        $('#modalkonfirmasijam').modal('show');
        showjam(3);
        $('#idbookingjam').val(data.id);
        $('#jam').val(data.jam);
    }
    function detail(data) {
        $('#imagedetail').attr('src','/gambar?rf='+data.product.gambar)
        $('#kiri').html(data.product.nama);
        let harga = new Intl.NumberFormat('id-Id', { style: 'currency', currency: 'IDR' }).format(
            data.price_total);
        $('#kanan').html(harga);
        $('#modalhapus').modal('show');
    }
    function bukti(data) {
        if (data.upload != 'kosong') {
            $('#blah').attr('src','/gambar?rf='+data.upload)
            // $('#koltransfer').removeAttr('hidden');
            $('#type').val(1);
            $('#type').change();
        }
        $('#idbooking').val(data.id);
        $('#status').val(data.status);
        $('#formbukti').attr('action','/upload-bukti');
        let harga = new Intl.NumberFormat('id-Id', { style: 'currency', currency: 'IDR' }).format(
            data.price_total);
        $('#totalharga').html(harga);
        $('#modalbukti').modal('show');
    }
</script>
@endsection