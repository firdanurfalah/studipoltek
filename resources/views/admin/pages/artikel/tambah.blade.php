@extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <form action="/artikel" method="POST" enctype="multipart/form-data" style="width: 1340px; height: 2000px;">

            @csrf
            <div class="page-header">
                <div class="page-title">
                    <a href="{{route('artikel.index')}}" class="btn btn-primary btn-sm">Kembali</a>
                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                </div>
            </div>
           
            <div class="row">
               
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">
                    <h5 class= "font-weight-bold " style="color: blue;" >Artikel </h5>
                    <div class="widget widget-content-area br-1"  style="height: 100%;">
                        
                        <div class="widget-two">
                            
                          
                            <div class="row m-2">
                                   
                                
                                <div class="col-lg-4">
                                    <label for="gambar" style="color: black;">Upload Foto</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" style="width: 50%; height: 50px;">
                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>  
                                    @enderror
                                  
                                </div>

                                <div class="col-lg-4">
                                    <label for="form-control" style="color: black;">judul</label>
                                    <input type="hidden" name="idartikel" value="">
                                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="" value="{{old('judul')}}">
                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <label for="form-control" style="color: black;">Deskripsi</label>
                                    <input type="hidden" name="idartikel" value="">
                                    <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="" value="{{old('deskripsi')}}">
                                    @error('deskripsi')
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







