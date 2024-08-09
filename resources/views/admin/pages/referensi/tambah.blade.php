@extends('admin.layout.main')

@section('content')

<h5 class="font-weight-bold text-capitalize" style="color: blue;">referensi</h5>
<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <form action="/admin-referensi" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" id="id" value="" hidden>
        <div class="card-header">
            <div class="page-title">
                <a href="{{route('admin-referensi.index')}}" class="btn btn-primary btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama" class="text-capitalize">nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror" placeholder="nama">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kategori" class="text-capitalize">kategori</label>
                        <select name="kategori" id="kategori"
                            class="form-control @error('kategori') is-invalid @enderror">
                            <option value="">Pilih</option>
                            @foreach($kategori as $key => $v)
                            <option value="{{$v->id}}">{{$v->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4" hidden>
                    <div class="form-group">
                        <label for="deskripsi" class="text-capitalize">deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror" placeholder="deskripsi"
                            rows="1"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
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