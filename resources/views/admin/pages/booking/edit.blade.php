{{-- @extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="page-header">
                <div class="page-title">
                    <a href="{{route('booking.index')}}" class="btn btn-primary btn-sm">Kembali</a>
                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget widget-content-area br-4">
                        <div class="widget-one">

                            <div class="row m-2">
                                <div class="col-lg-6">
                                    <label for="form-control">Nama</label>
                                    <input type="hidden" name="idnama" value="{{$edit->id}}">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="" value="{{$edit->nama}}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="form-control">Email</label>
                                    <input type="hidden" name="idemail" value="{{$edit->id}}">
                                    <input type="text" name="nama" class="form-control @error('email') is-invalid @enderror" placeholder="" value="{{$edit->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <label for="form-control" style="color: black;">No HP</label>
                                    <input type="hidden" name="idnohp" value="">
                                    <input type="text" name="no_hp" class="form-control @error('nohp') is-invalid @enderror" placeholder="1234-5678-9686" value="{{old('nohp')}}">
                                    @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <label for="form-control" style="color: black;">Tanggal</label>
                                    <input type="hidden" name="idtanggal" value="">
                                    <input type="text" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="1234-5678-9686" value="{{old('tanggal')}}">
                                    @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <label for="form-control" style="color: black;">Jam</label>
                                    <input type="hidden" name="idjam" value="">
                                    <input type="text" name="jam" class="form-control @error('jam') is-invalid @enderror" placeholder="1234-5678-9686" value="{{old('jam')}}">
                                    @error('jam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                             

                                <div class="col-lg-6">
                                    <label for="gambar" style="color: black;">Upload Bukti</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" style="width: 50%; height: 50px;">
                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>  
                                    @enderror
                                  
                                </div>

                                
                                <div class="col-lg-6">
                                    <label for="form-control">Status</label>
                                    <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="" value="{{$edit['status']}}">
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
               
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>




        <!-- CONTENT AREA -->

    </div>
</div>
<!--  END CONTENT AREA  -->
@endsection --}}