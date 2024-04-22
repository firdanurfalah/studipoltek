@extends('admin.layout.main')

@section('content')

<h5 class="font-weight-bold text-capitalize" style="color: blue;">admin promo </h5>
<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <form action="/admin-promo" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" id="id" value="{{$x->id}}" hidden>
        <div class="card-header">
            <div class="page-title">
                <a href="{{route('admin-promo.index')}}" class="btn btn-primary btn-sm">Kembali</a>
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
                        <label for="kode" class="text-capitalize">kode</label>
                        <input type="text" name="kode" id="kode" value="{{$x->kode}}"
                            class="form-control @error('kode') is-invalid @enderror" placeholder="kode">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nominal_type" class="text-capitalize">Type Promo</label>
                        <select name="nominal_type" id="nominal_type"
                            class="form-control @error('nominal_type') is-invalid @enderror">
                            <option value="0" {{$x->nominal_type == 0 ? 'selected' : ''}}>Persen</option>
                            <option value="1" {{$x->nominal_type == 1 ? 'selected' : ''}}>Nominal</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nominal" class="text-capitalize">nominal</label>
                        <input type="number" name="nominal" id="nominal" value="{{$x->nominal}}"
                            class="form-control @error('nominal') is-invalid @enderror" placeholder="nominal">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal_mulai" class="text-capitalize">tanggal mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{$x->tanggal_mulai}}"
                            class="form-control @error('tanggal_mulai') is-invalid @enderror"
                            placeholder="tanggal_mulai">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal_selesai" class="text-capitalize">tanggal selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{$x->tanggal_selesai}}"
                            class="form-control @error('tanggal_selesai') is-invalid @enderror"
                            placeholder="tanggal_selesai">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="deskripsi" class="text-capitalize">deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror" placeholder="deskripsi"
                            rows="1">{{$x->deskripsi}}</textarea>
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