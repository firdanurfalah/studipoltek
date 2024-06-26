@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="card">
            <div class="card-body">
                <!-- CONTENT AREA -->
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                        <div class="widget widget-content-area br-4">
                            <div class="widget-one">
                                <table id="table" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">nama</th>
                                            <th class="text-uppercase">email</th>
                                            <th class="text-uppercase">nohp</th>
                                            <th class="text-uppercase">tanggal</th>
                                            <th class="text-uppercase">jam</th>
                                            <th class="text-uppercase">total harga</th>
                                            {{-- <th>upload</th> --}}
                                            <th class="text-uppercase">status</th>
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
                                            <td>{{$value->price_total}}</td>
                                            {{-- <td><a href="/gambar?rf={{$value->upload}}"
                                                    style="cursor: pointer"><img src="/gambar?rf={{$value->upload}}"
                                                        width="100px" height="40px"></a>
                                            </td> --}}
                                            <td>
                                                @if($value->status == 0)
                                                <span onclick="approve({{$value->id}},{{$value->status}})"
                                                    class="badge badge-info" style="cursor: pointer">Proses</span>
                                                @elseif($value->status == 1)
                                                <span onclick="approve({{$value->id}},{{$value->status}})"
                                                    class="badge badge-success" style="cursor: pointer">Diterima</span>
                                                @else
                                                <span onclick="approve({{$value->id}},{{$value->status}})"
                                                    class="badge badge-danger" style="cursor: pointer">Ditolak</span>
                                                @endif
                                            </td>


                                            <td>
                                                {{-- <form action="{{ route('booking.destroy', $value->id) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a type="submit"
                                                        class="btn btn-danger btn-sm show_confirm d-block d-none">Hapus</a>
                                                </form> --}}
                                                <button class="btn btn-info btn-sm d-block d-none"
                                                    onclick="jamedit({{$value}})">Edit Jam</button>

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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
                            </div>
                            <div class="modal-body">
                                <form id="formapprove" action="" method="POST" class="text-center">
                                    <p id="titleapprove"></p>
                                    @csrf
                                    <input type="text" name="status" id="status" hidden>
                                    <div class="text-center">
                                        <span onclick="approvesend(1)"
                                            class="btn btn-primary btn-sm mr-2">Diterima</span>
                                        <span onclick="approvesend(99)"
                                            class="btn btn-danger btn-sm mr-2">Ditolak</span>
                                        <span onclick="approveclose()" class="btn btn-warning btn-sm mr-2">Tutup</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="jamModal" tabindex="-1" aria-labelledby="jamModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="jamModalLabel">Jam</h5>
                            </div>
                            <div class="modal-body">
                                <form action="/edit-jam" method="POST">
                                    @csrf
                                    <input type="text" name="id_booking" id="id_booking" hidden>
                                    <div class="form-group">
                                        <label for="">Jam</label>
                                        <input type="datetime-local" name="tanggaljam" id="tanggaljam"
                                            class="form-control" required>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </form>
                            </div>
                        </div>
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
    function approvesend(status) {
        $('#status').val(status);
        $('#formapprove').submit();
    }
    function approveclose() {
        $('#exampleModal').modal('hide');
    }
    
    function jamedit(data) {
        $('#tanggaljam').val(null);
        $('#id_booking').val(null);
        $('#jamModal').modal('show');
        $('#id_booking').val(data.id);
        if (data.jam != 'kosong') {
            $('#tanggaljam').val(data.tanggal+'T'+data.jam.replace('.',':'));
        }else{
            $('#tanggaljam').val(data.tanggal+'T00:00');
        }
        console.log(data);
        
    }
</script>
@endsection