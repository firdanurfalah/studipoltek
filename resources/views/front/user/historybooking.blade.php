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
                                    <td>{{$value->tanggal}} - {{$value->jam}}</td>
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->product->nama}}</td>
                                    <td>
                                        @if($value->status == 0)
                                        <span class="badge badge-info">Proses</span>
                                        @elseif($value->status == 3)
                                        <span class="badge badge-primary">Diterima</span>
                                        @elseif($value->status == 2)
                                        <span class="badge badge-info-emphasis">Selesai
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
    <!-- Modal Bukti Pembayaran-->
    <div class="modal fade" id="modalbukti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Detail</h5>
                    <span class="" data-dismiss="modal" aria-label="Close" style="cursor: pointer">x</span>
                </div>
                <div class="modal-body">
                    <h2>No. Rekening : 0000000</h2>
                    <h2>Atas Nama : 0000000</h2>
                    <h3 id="totalharga"></h3>
                    <form action="" method="POST" id="formbukti" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="idbooking" id="idbooking" hidden>
                        <div class="form-group">
                            <label for="">Bukti Pembayaran</label>
                            <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg"
                                class="form-control @error('image') is-invalid @enderror"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img id="blah" alt="gambar" width="100" height="100" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
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
        }
        $('#idbooking').val(data.id);
        $('#formbukti').attr('action','/upload-bukti');
        let harga = new Intl.NumberFormat('id-Id', { style: 'currency', currency: 'IDR' }).format(
            data.price_total);
        $('#totalharga').html(harga);
        $('#modalbukti').modal('show');
    }
</script>
@endsection