@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <form action="/adminxxx" method="POST"  style="width: 1340px; height: 2000px;">

            @csrf
           
            <div class="row">
               
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">
                    <h5 class= "font-weight-bold " style="color: blue;" >Admin </h5>
                    <div class="widget widget-content-area br-1"  style="height: 100%;">
                        
                        <div class="widget-two">
                            
                          
                            <div class="row m-2">
                                   
                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">Nama</label>
                                    <input type="hidden" name="idadmin" value="">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="" value="{{old('nama')}}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="form-control" style="color: black;">Email</label>
                                    <input type="hidden" name="idadmin" value="">
                                    <input type="text" name="Email" class="form-control @error('Email') is-invalid @enderror" placeholder="abcd@gmail.com" value="{{old('Email')}}">
                                    @error('Email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row m-2">
                                   
                                <div class="col-lg-4">
                                    <label for="form-control" style="color: black;">No HP</label>
                                    <input type="hidden" name="idadmin" value="">
                                    <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" placeholder="1234-5678-9686" value="{{old('nohp')}}">
                                    @error('nohp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                             
                         
                            </div>

                         

                        </div>
                        <div class="col-lg-12 mt-3 text-right"> <!-- Menggeser tombol ke kanan -->
                            <!-- Tombol Create ditempatkan di sini -->
                            <button class="btn btn-primary btn-sm" type="submit">SIMPAN & LANJUTKAN</button>
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







