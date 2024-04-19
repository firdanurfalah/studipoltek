@extends('admin.layout.main')

@section('content')

<h5 class="font-weight-bold text-capitalize" style="color: blue;">product </h5>
<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <form action="/product" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" id="id" value="{{$x->id}}" hidden>
        <div class="card-header">
            <div class="page-title">
                <a href="{{route('product.index')}}" class="btn btn-primary btn-sm">Kembali</a>
                <button class="btn btn-success btn-sm" type="submit">Simpan</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama" class="text-capitalize">nama</label>
                        <input type="text" name="nama" id="nama" value="{{$x->nama}}"
                            class="form-control @error('nama') is-invalid @enderror" placeholder="nama">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="harga" class="text-capitalize">harga</label>
                        <input type="number" name="harga" id="harga" value="{{$x->harga}}"
                            class="form-control @error('harga') is-invalid @enderror" placeholder="harga">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="harga_diskon" class="text-capitalize">harga diskon</label>
                        <input type="number" name="harga_diskon" id="harga_diskon" value="{{$x->harga_diskon}}"
                            class="form-control @error('harga_diskon') is-invalid @enderror" placeholder="harga_diskon">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kategori" class="text-capitalize">kategori</label>
                        <select name="kategori" id="kategori"
                            class="form-control @error('kategori') is-invalid @enderror">
                            <option value="">Pilih</option>
                            @foreach($kategori as $key => $v)
                            <option value="{{$v->id}}" {{$x->kategori_id == $v->id ? 'selected' : ''}}>{{$v->nama}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rekomendasi" class="text-capitalize">rekomendasi</label>
                        <select name="rekomendasi" id="rekomendasi"
                            class="form-control @error('rekomendasi') is-invalid @enderror">
                            <option value="1" {{$x->is_recommend == 1 ? 'selected' : ''}}>Ya</option>
                            <option value="0" {{$x->is_recommend == 0 ? 'selected' : ''}}>Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="gambar" class="text-capitalize">gambar</label>
                        <input type="file" name="gambar" id="gambar" accept="image/png, image/jpeg"
                            class="form-control @error('image') is-invalid @enderror"
                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img id="blah" alt="gambar" width="100" height="100" src="/gambar?rf={{$x->gambar}}" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--  END CONTENT AREA  -->
@endsection