@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <form action="/booking" method="POST" enctype="multipart/form-data" style="width: 1340px; height: 2000px;">

            @csrf
            <div class="page-header">
                <div class="page-title">
                    {{-- <a href="{{route('booking.index')}}" class="btn btn-primary btn-sm">Kembali</a> --}}
                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                </div>
            </div>
           
            <div class="row">
               
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">
                    <h5 class= "font-weight-bold " style="color: blue;" >Booking </h5>
                    <div class="widget widget-content-area br-1"  style="height: 100%;">
                        
                        <div class="widget-two">
                            
                          
                            <div class="row m-2">
                                   
                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">Nama</label>
                                    <input type="hidden" name="idbooking" value="">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="" value="{{old('nama')}}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">email</label>
                                    <input type="hidden" name="idbooking" value="">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="" value="{{old('email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row m-2">
                                   
                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">No Hp</label>
                                    <input type="hidden" name="idbooking" value="">
                                    <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" placeholder="" value="{{old('nohp')}}">
                                    @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">Tanggal</label>
                                    <input type="hidden" name="idbooking" value="">
                                    <input type="text" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="" value="{{old('tanggal')}}">
                                    @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                               
                            </div>
                            
                            <div class="row m-2">

                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">Jam</label>
                                    <input type="hidden" name="idbooking" value="">
                                    <input type="text" name="jam" class="form-control @error('jam') is-invalid @enderror" placeholder="" value="{{old('jam')}}">
                                    @error('jam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <label for="gambar" style="color: black;">Upload Foto</label>
                                    <input type="file" name="upload" id="upload" class="form-control @error('upload') is-invalid @enderror" style="width: 50%; height: 50px;">
                                    @error('upload')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>  
                                    @enderror
                                  
                                </div>
                                   
                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">Status</label>
                                    <input type="hidden" name="idbooking" value="">
                                    <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="" value="{{old('status')}}">
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
@endsection







