@extends('admin.layout.main')

@section('content')

<h5 class="font-weight-bold " style="color: blue;">Categori </h5>
<!--  BEGIN CONTENT AREA  -->
<div class="card">
    <form action="/categori" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="page-title">
                <a href="{{route('categori.index')}}" class="btn btn-primary btn-sm">Kembali</a>
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
                <div class="col-md-8" hidden>
                    <div class="form-group">
                        <label for="deskripsi" class="text-capitalize">deskripsi</label>
                        <textarea type="text" name="deskripsi" id="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror" placeholder="deskripsi"
                            rows="1"></textarea>
                    </div>
                </div>             
            </div>
        </div>
    </form>
</div>
<!--  END CONTENT AREA  -->
@endsection