@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <div class="card-header">
        <a href="/product/create" class="btn btn-primary btn-sm">Tambah</a>
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
                                    <th class="text-capitalize">nama</th>
                                    <th class="text-capitalize">harga</th>
                                    <th class="text-capitalize">harga diskon</th>
                                    <th class="text-capitalize">orang</th>
                                    <th class="text-capitalize">kategori</th>
                                    <th class="text-capitalize">rekomendasi</th>
                                    <th class="text-capitalize">gambar</th>
                                    <th class="no-content text-center text-capitalize" width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->harga}}</td>
                                    <td>{{$value->harga_diskon}}</td>
                                    <td>{{$value->min_orang}} - {{$value->max_orang}} Orang</td>
                                    <td>{{$value->categori_nama}}</td>
                                    <td>{{$value->is_recommend == 1 ? 'Ya' : 'Tidak'}}</td>
                                    <td><img src="/gambar?rf={{$value->gambar}}" alt="" width="100px"></td>
                                    <td>
                                        <a href="/product/{{$value->id}}" class="btn btn-primary btn-sm">Edit</a>
                                        <span class="btn btn-danger btn-sm" onclick="hapus({{$value->id}})">Hapus</span>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Image</h5>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="" id="imageproduct" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Hapus Data?</h5>
                </div>
                <div class="modal-body text-center">
                    <form action="" method="post" id="form-delete">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm show_confirm">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT AREA -->
</div>
<!--  END CONTENT AREA  -->
<script>
    function hapus(id) {
        $('#modalhapus').modal('show');
        $('#form-delete').attr('action','/product/'+id);
    }
</script>
@endsection