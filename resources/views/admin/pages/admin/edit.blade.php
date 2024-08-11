@extends('admin.layout.main')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/adminxxx" method="POST">
            <input type="text" name="id" id="id" value="{{$x->id}}" hidden>
            @csrf
            <a href="{{route('adminxxx.index')}}" class="btn btn-primary btn-sm">Kembali</a>
            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nama" class="text-capitalize">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{$x->name}}" class="form-control">
                        @error('nama')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email" class="text-capitalize">email</label>
                        <input type="email" name="email" id="email" value="{{$x->email}}" class="form-control">
                        @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password" class="text-capitalize">password (kosongi bila tidak dirubah)</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="level" class="text-capitalize">level</label>
                        <select name="level" id="level" class="form-control">
                            @if(Auth::user()->level == 'owner')
                            <option value="admin" {{$x->level == 'admin' ? 'selected':''}}>Admin</option>
                            <option value="owner" {{$x->level == 'owner' ? 'selected':''}}>Owner</option>
                            @endif
                            <option value="user" {{$x->level == 'user' ? 'selected':''}}>User</option>
                        </select>
                        @error('level')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6" >
                    <div class="form-group">
                        <label for="nohp" class="text-capitalize">nohp</label>
                        <input type="tel" name="nohp" id="nohp" class="form-control" pattern="\d{10,13}"  maxlength="13" pattern="\d*" title="Isi 10-13 digit berupa angka" value="{{$x->no_hp}}">
                        
                        @error('nohp')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
{{-- @extends('admin.layout.main')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="page-header">
                <div class="page-title">
                    <a href="{{route('admin.index')}}" class="btn btn-primary btn-sm">Kembali</a>
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
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" placeholder=""
                                        value="{{$edit->nama}}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="form-control">Email</label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                        value="{{$edit['email']}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="form-control">No Hp</label>
                                    <input type="text" name="nohp"
                                        class="form-control @error('nohp') is-invalid @enderror" placeholder=""
                                        value="{{$edit['nohp']}}">
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
        </form>




        <!-- CONTENT AREA -->

    </div>
</div>
<!--  END CONTENT AREA  -->
@endsection --}}