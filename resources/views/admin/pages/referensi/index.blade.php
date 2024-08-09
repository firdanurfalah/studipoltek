@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <div class="card-header">
        <a href="/admin-referensi/create" class="btn btn-primary btn-sm">Tambah</a>
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
                                    <th class="text-capitalize">gambar</th>
                                    {{-- <th class="text-capitalize">deskripsi</th> --}}
                                    <th class="text-capitalize">nama</th>
                                    <th class="text-capitalize">kategori</th>
                                    <th class="no-content text-center text-capitalize" width="20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="/gambar?rf={{$value->gambar}}" alt="" width="100px"></td>
                                    {{-- <td>{{$value->deskripsi}}</td> --}}
                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->kategori}}</td>
                                    <td>
                                        <a href="/admin-referensi/{{$value->id}}/edit"
                                            class="btn btn-primary btn-sm">Edit</a>
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
        $('#form-delete').attr('action','/admin-referensi/'+id);
    }
</script>
@endsection