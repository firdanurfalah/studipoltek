@extends('admin.layout.main')

@section('content')

<h5 class="font-weight-bold text-capitalize" style="color: blue;">referensi</h5>
<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <form action="/profile" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" id="id" value="{{$x->id}}" hidden>
        <div class="card-header">
            <div class="page-title">
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="text-capitalize">name</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="name"
                            value="{{$x->name}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password" class="text-capitalize">password (kosongkan bila tidak ingin
                            diganti)</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="password">
                    </div>
                </div>
                <div class="col-md-4" hidden>
                    <div class="form-group">
                        <label for="gambar" class="text-capitalize">gambar</label>
                        <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg"
                            class="form-control @error('image') is-invalid @enderror"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img id="blah" alt="gambar" width="100" height="100" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--  END CONTENT AREA  -->
@endsection