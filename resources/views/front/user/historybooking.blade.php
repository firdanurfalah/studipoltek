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
                                        Proses
                                        @elseif($value->status == 1)
                                        Diterima
                                        @else
                                        Ditolak
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a href="/admin-referensi/{{$value->id}}/edit"
                                            class="btn btn-primary btn-sm">Edit</a> --}}
                                        <span class="btn btn-info btn-sm" onclick="detail({{$value}})">Detail</span>
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
    <!-- Modal -->
    <div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Detail</h5>
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
        console.log(data);
        $('#imagedetail').attr('src','/gambar?rf='+data.product.gambar)
        $('#kiri').html(data.product.nama);
        let harga = new Intl.NumberFormat('id-Id', { style: 'currency', currency: 'IDR' }).format(
            data.price_total);
        $('#kanan').html(harga);
        $('#modalhapus').modal('show');
    }
</script>
@endsection