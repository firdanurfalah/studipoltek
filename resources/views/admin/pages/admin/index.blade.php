@extends('admin.layout.main')
@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">

                <a href="/adminxxx/create" class="btn btn-primary btn-sm">Tambah</a>

            </div>
        </div>


        <!-- CONTENT AREA -->
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-content-area br-4">
                    <div class="widget-one">
                        <table id="example2" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th class="no-content text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $key => $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td class="text-capitalize">{{$value->level}}</td>
                                    <td>
                                        <a href="/adminxxx/{{$value->id}}"
                                            class="btn btn-primary btn-sm d-block d-none">Edit</a>
                                        <br>
                                        <span class="btn btn-danger btn-sm d-block d-none"
                                            onclick="hapus({{$value->id}})">Hapus</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

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
</div>
<script>
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    function hapus(id) {
        $('#modalhapus').modal('show');
        $('#form-delete').attr('action','/adminxxx/'+id);
    }
</script>
<!--  END CONTENT AREA  -->
@endsection