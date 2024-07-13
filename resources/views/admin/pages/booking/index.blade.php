@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="">
        <div class="card">
            <div class="card-body">
                <!-- CONTENT AREA -->
                <form action="/booking" method="GET">
                    @csrf
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <div class="row">
                            <input type="text" name="tanggal" id="tanggal" class="form-control col-lg-4"
                                value="{{$tanggal}}">
                            <button class="btn btn-primary btn-sm ml-2" type="submit">Cari</button>
                            <span class="btn btn-success btn-sm ml-2" id="btnexport">Export</span>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table id="table" class="table dt-table-hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-uppercase">tanggal pesan</th>
                                <th class="text-uppercase">nama</th>
                                <th class="text-uppercase">email</th>
                                <th class="text-uppercase">nohp</th>
                                <th class="text-uppercase">tanggal</th>
                                <th class="text-uppercase">jam</th>
                                <th class="text-uppercase">total harga</th>
                                <th class="text-uppercase">status</th>
                                <th class="text-uppercase">bukti Pembayaran</th>
                                <th class="text-uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booking as $key => $value)
                            <tr>
                                <td>{{$value->created_at->format('d-m-Y')}}</td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->nohp}}</td>
                                <td>{{$value->tanggal}}</td>
                                <td>{{$value->jam}}</td>
                                <td>{{$value->price_total}}</td>
                                {{-- <td><a href="/gambar?rf={{$value->upload}}" style="cursor: pointer"><img
                                            src="/gambar?rf={{$value->upload}}" width="100px" height="40px"></a>
                                </td> --}}
                                <td>
                                    @if($value->status == 0)
                                    <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                        class="badge badge-info" style="cursor: pointer">Proses</span>
                                    @elseif($value->status == 3)
                                    <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                        class="badge badge-primary" style="cursor: pointer">Diterima</span>
                                    @elseif($value->status == 2)
                                    <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                        class="badge badge-info-emphasis" style="cursor: pointer">Selesai
                                        Pembayaran</span>
                                    @elseif($value->status == 1)
                                    <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                        class="badge badge-success" style="cursor: pointer">Selesai
                                        Pemotretan</span>
                                    @else
                                    <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                        class="badge badge-danger" style="cursor: pointer">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if($value->upload != 'kosong')
                                    <a href="/gambar?rf={{$value->upload}}">
                                        <img src="/gambar?rf={{$value->upload}}" alt="" width="50px">
                                    </a>
                                    @elseif($value->type==2)
                                    Bayar Langsung
                                    @else
                                    @endif
                                </td>
                                <td>
                                    {{-- <form action="{{ route('booking.destroy', $value->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a type="submit"
                                            class="btn btn-danger btn-sm show_confirm d-block d-none">Hapus</a>
                                    </form> --}}
                                    <button class="btn btn-info btn-sm d-block d-none" onclick="jamedit({{$value}})"
                                        title="Edit jam">Edit Jam</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
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
                                <form id="formapprove" action="" method="POST">
                                    <p id="titleapprove"></p>
                                    @csrf
                                    <div class="form-group">
                                        <label for="status">Status Booking</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="3">Diterima</option>
                                            <option value="2">Selesai Pembayaran</option>
                                            <option value="1">Selesai Pemotretan</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="linkinput" hidden>
                                        <label for="link">Link Google Drive</label>
                                        <input type="text" name="link" id="link" class="form-control">
                                    </div>
                                    <button class="btn btn-primary">Simpan</button>
                                    <span class="btn btn-secondary" data-dismiss="modal" aria-label="Close"
                                        style="cursor: pointer">Tutup</span>
                                    {{-- <div class="text-center">
                                        <span onclick="approvesend(3)"
                                            class="btn btn-primary btn-sm mr-2">Diterima</span>
                                        <span onclick="approvesend(2)" class="btn btn-primary btn-sm mr-2">Selesai
                                            Pembayaran</span>
                                        <span onclick="approvesend(1)" class="btn btn-primary btn-sm mr-2">Selesai
                                            Pemotretan</span>
                                        <span onclick="approvesend(99)"
                                            class="btn btn-danger btn-sm mr-2">Ditolak</span>
                                        <span onclick="approveclose()" class="btn btn-warning btn-sm mr-2">Tutup</span>
                                    </div> --}}
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
                                <span class="" data-dismiss="modal" aria-label="Close" style="cursor: pointer">x</span>
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
                                    <span class="btn btn-secondary" data-dismiss="modal" aria-label="Close"
                                        style="cursor: pointer">Tutup</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="tableKreditExport" hidden>
                    <thead>
                        <tr>
                            <th class="text-uppercase">tanggal pesan</th>
                            <th class="text-uppercase">nama</th>
                            <th class="text-uppercase">email</th>
                            <th class="text-uppercase">nohp</th>
                            <th class="text-uppercase">tanggal</th>
                            <th class="text-uppercase">jam</th>
                            <th class="text-uppercase">total harga</th>
                            <th class="text-uppercase">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking as $key => $value)
                        <tr>
                            <td>{{$value->created_at->format('d-m-Y')}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->nohp}}</td>
                            <td>{{$value->tanggal}}</td>
                            <td>{{$value->jam}}</td>
                            <td>{{$value->price_total}}</td>
                            <td>
                                @if($value->status == 0)
                                <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                    class="badge badge-info" style="cursor: pointer">Proses</span>
                                @elseif($value->status == 3)
                                <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                    class="badge badge-primary" style="cursor: pointer">Diterima</span>
                                @elseif($value->status == 2)
                                <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                    class="badge badge-info-emphasis" style="cursor: pointer">Selesai
                                    Pembayaran</span>
                                @elseif($value->status == 1)
                                <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                    class="badge badge-success" style="cursor: pointer">Selesai
                                    Pemotretan</span>
                                @else
                                <span onclick="approve({{$value->id}},{{$value->status}},'{{$value->link}}')"
                                    class="badge badge-danger" style="cursor: pointer">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6">Total</th>
                            <th>{{$total}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
<script>
    $('#tanggal').daterangepicker({
      locale: {
         format: 'DD/MM/YYYY'
      },
   });
    // export excel
   $('#btnexport').on('click',function () {
      TableToExcel.convert(document.getElementById("tableKreditExport"),{
         name: "Laporan.xlsx",
         sheet: {
            name: "Laporan"
         }
      });
   })
    $('#status').on('change',function () {
        let v = $(this).val();
        $('#linkinput').attr('hidden',true);
        if (v == 1) {
            $('#linkinput').removeAttr('hidden');
        }
    })
    function approve(id,status,link) {
        // let t = 'Apakah anda yakin untuk approve booking ?';
        // if (status == 1) {
        //     t = 'Apakah anda yakin untuk cancel booking ?';
        // }
        // $('#titleapprove').html(t);
        $('#status').val(status);
        $('#status').change();
        $('#link').val(link);
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