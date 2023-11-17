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
                                    <th>No</th>
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
                                    <td>{{$value->upload}}</td>
                                    <td>{{$value->status}}</td>
                                  

                                    <td>
                                        <a href="/booking/{{ $value->id }}" class="btn btn-primary btn-sm d-block d-none">Edit</a>
                                        <br> 
                                         <form action="{{ route('booking.destroy', $value->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a type="submit" class="btn btn-danger btn-sm show_confirm d-block d-none">Hapus</a>
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




        <!-- CONTENT AREA -->

    </div>
</div>
<!--  END CONTENT AREA  -->
@endsection