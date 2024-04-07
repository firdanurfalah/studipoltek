@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">

                <a href="/categori/create" class="btn btn-primary btn-sm">Tambah</a>

            </div>
        </div>


        <!-- CONTENT AREA -->
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-content-area br-4">
                    <div class="widget-one">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>

                                    <th>nama</th>
                                    <th>gambar</th>
                                    <th>harga</th>
                                    <th>deskripsi</th>



                                    <th class="no-content text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categori as $key => $value)
                                <tr>

                                    <td>{{$value->nama}}</td>
                                    <td> <img width="120px" src="/gambar?rf={{$value->gambar}}"
                                            onclick="showImage('{{$value->gambar}}')"> </td>

                                    <td>{{$value->harga}}</td>
                                    <td>{{$value->deskripsi}}</td>





                                    <td>
                                        <a href="/categori/{{$value->id}}"
                                            class="btn btn-primary btn-sm d-block d-none">Edit</a>
                                        <br>
                                        <form action="{{ route('categori.destroy', $value->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a type="submit"
                                                class="btn btn-danger btn-sm show_confirm d-block d-none">Hapus</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

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
                        <img src="" alt="" id="imagecategori" width="100%">
                    </div>
                </div>
            </div>
        </div>



        <!-- CONTENT AREA -->

    </div>
</div>
<!--  END CONTENT AREA  -->
<script>
    function showImage(foto) {
        $('#imagecategori').attr('src','/gambar?rf=/'+foto);
        $('#exampleModal').modal('show');
    }
</script>
@endsection