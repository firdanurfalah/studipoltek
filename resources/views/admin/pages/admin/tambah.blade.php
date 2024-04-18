@extends('admin.layout.main')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/adminxxx" method="POST">
            @csrf
            <a href="{{route('adminxxx.index')}}" class="btn btn-primary btn-sm">Kembali</a>
            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nama" class="text-capitalize">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email" class="text-capitalize">email</label>
                        <input type="text" name="email" id="email" class="form-control">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nohp" class="text-capitalize">nohp</label>
                        <input type="text" name="nohp" id="nohp" class="form-control">
                        @error('nohp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!--  BEGIN CONTENT AREA  -->
{{-- <form action="/adminxxx" method="POST" style="width: 1340px; height: 2000px;">

    @csrf
    <div class="page-header">
        <div class="page-title">
            <a href="{{route('adminxxx.index')}}" class="btn btn-primary btn-sm">Kembali</a>
            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 ">
            <h5 class="font-weight-bold " style="color: blue;">Admin </h5>
            <div class="widget widget-content-area br-1" style="height: 100%;">

                <div class="widget-two">


                    <div class="row m-2">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form-control" style="color: black;">Nama</label>
                                <input type="hidden" name="idadmin" value="">
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="" value="{{old('nama')}}">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form-control" style="color: black;">Email</label>
                                <input type="hidden" name="idadmin" value="">
                                <input type="text" name="Email"
                                    class="form-control @error('Email') is-invalid @enderror"
                                    placeholder="abcd@gmail.com" value="{{old('Email')}}">
                                @error('Email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row m-2">

                        <div class="col-lg-4">
                            <label for="form-control" style="color: black;">No HP</label>
                            <input type="hidden" name="idadmin" value="">
                            <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror"
                                placeholder="1234-5678-9686" value="{{old('nohp')}}">
                            @error('nohp')
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
</form> --}}




<!-- CONTENT AREA -->

<!--  END CONTENT AREA  -->
@endsection