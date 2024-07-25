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
                        <label for="min_orang" class="text-capitalize">min orang</label>
                        <input type="number" name="min_orang" id="min_orang" value="{{$x->min_orang}}"
                            class="form-control @error('min_orang') is-invalid @enderror" placeholder="min_orang">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="max_orang" class="text-capitalize">max orang</label>
                        <input type="number" name="max_orang" id="max_orang" value="{{$x->max_orang}}"
                            class="form-control @error('max_orang') is-invalid @enderror" placeholder="max_orang">
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
                <div class="col-md-4" hidden>
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
                        <label for="background" class="text-capitalize">background</label>
                        <select name="background" id="background"
                            class="form-control @error('background') is-invalid @enderror">
                            <option value="Tanpa Background" {{$x->background == 'Tanpa Background' ? 'selected' : ''}}>
                                Tanpa Background</option>
                            <option value="1 Background/Tempat" {{$x->background == '1 Background/Tempat' ? 'selected' :
                                ''}}>
                                1 Background/Tempat</option>
                            <option value="1 Background" {{$x->background == '1 Background' ? 'selected' : ''}}>1
                                Background</option>
                            <option value="2 Background" {{$x->background == '2 Background' ? 'selected' : ''}}>2
                                Background</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="waktu" class="text-capitalize">waktu</label>
                        <select name="waktu" id="waktu" class="form-control @error('waktu') is-invalid @enderror">
                            <option value="Tidak ada waktu" {{$x->waktu == 'Tidak ada waktu' ? 'selected' : ''}}>Tidak
                                ada waktu</option>
                            <option value="25 Shoot" {{$x->waktu == '25 Shoot' ? 'selected' : ''}}>25 Shoot</option>
                            <option value="70 Shoot" {{$x->waktu == '70 Shoot' ? 'selected' : ''}}>70 Shoot</option>
                            <option value="75 Shoot" {{$x->waktu == '75 Shoot' ? 'selected' : ''}}>75 Shoot</option>
                            <option value="35 Shoot dan 50 File Edit" {{$x->waktu == '35 Shoot dan 50 File Edit' ?
                                'selected' : ''}}>
                                35 Shoot dan 50 File Edit</option>
                            <option value="10 Menit" {{$x->waktu == '10 Menit' ? 'selected' : ''}}>10 Menit</option>
                            <option value="20 Menit" {{$x->waktu == '20 Menit' ? 'selected' : ''}}>20 Menit</option>
                            <option value="45 Menit" {{$x->waktu == '45 Menit' ? 'selected' : ''}}>45 Menit</option>
                            <option value="60 Menit" {{$x->waktu == '60 Menit' ? 'selected' : ''}}>60 Menit</option>
                            <option value="90 Menit" {{$x->waktu == '90 Menit' ? 'selected' : ''}}>90 Menit</option>
                            <option value="Unlimited" {{$x->waktu == 'Unlimited' ? 'selected' : ''}}>Unlimited</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="harga_per_orang" class="text-capitalize">harga per orang</label>
                        <select name="harga_per_orang" id="harga_per_orang"
                            class="form-control @error('harga_per_orang') is-invalid @enderror">
                            <option value="0" {{$x->harga_per_orang == '0' ? 'selected' : ''}}>Tidak ada tambahan
                            </option>
                            <option value="20000" {{$x->harga_per_orang == '20000' ? 'selected' : ''}}>20k</option>
                            <option value="50000" {{$x->harga_per_orang == '50000' ? 'selected' : ''}}>50k</option>
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