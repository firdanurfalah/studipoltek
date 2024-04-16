@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">

                <a href="/booking/create" class="btn btn-primary btn-sm">Tambah</a>

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
                                    <th>email</th>
                                    <th>nohp</th>
                                    <th>tanggal</th>
                                    <th>jam</th>
                                    <th>upload</th>
                                    <th>status</th>




                                    <th class="no-content text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking as $key => $value)
                                <tr>

                                    <td>{{$value->nama}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->nohp}}</td>
                                    <td>{{$value->tanggal}}</td>
                                    <td>{{$value->jam}}</td>
                                    <td><a href="/gambar?rf={{$value->upload}}" style="cursor: pointer"><img
                                                src="/gambar?rf={{$value->upload}}" width="100px" height="40px"></a>
                                    </td>
                                    <td>
                                        @if($value->status == 0)
                                        <span onclick="approve({{$value->id}},{{$value->status}})"
                                            class="badge badge-info" style="cursor: pointer">Pending</span>
                                        @else
                                        <span onclick="approve({{$value->id}},{{$value->status}})"
                                            class="badge badge-success" style="cursor: pointer">Success</span>
                                        @endif
                                    </td>


                                    <td>
                                        <a href="/booking/{{ $value->id }}"
                                            class="btn btn-primary btn-sm d-block d-none">Edit</a>
                                        <br>
                                        <form action="{{ route('booking.destroy', $value->id) }}" method="post">
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
                        <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                    </div>
                    <div class="modal-body">
                        <form id="formapprove" action="" method="POST" class="text-center">
                            <p id="titleapprove"></p>
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm mr-2">Ya</button>
                                <span onclick="approveclose()" class="btn btn-danger btn-sm">Tidak</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- CONTENT AREA -->

    </div>
</div>
<!--  END CONTENT AREA  -->
<script>
    function approve(id,status) {
        let t = 'Apakah anda yakin untuk approve booking ?';
        if (status == 1) {
            t = 'Apakah anda yakin untuk cancel booking ?';
        }
        $('#titleapprove').html(t);
        $('#exampleModal').modal('show');
        $('#formapprove').attr('action','/approve-booking/'+id);
    }
    function approveclose() {
        $('#exampleModal').modal('hide');
    }
</script>
@endsection