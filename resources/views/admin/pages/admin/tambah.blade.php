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
                        <span class="text-danger" role="alert">
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
                        <div class="password-checklist">
                            <p><b></b></p>
                            <ul class="checklist">
                                <li class="list-item-0 text-danger">Panjang password minimal 8
                                </li>
                                <li class="list-item-1 text-danger">Terdapat 1 angka</li>
                                <li class="list-item-2 text-danger">Terdapat 1 huruf kecil
                                </li>
                                <li class="list-item-3 text-danger">Terdapat 1 huruf besar
                                </li>
                                <li class="list-item-4 text-danger">Terdapat 1 simbol
                                </li>
                                @error('password')
                                <li class="list-item-5 text-danger">{{$message}}
                                </li>
                                @enderror
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="level" class="text-capitalize">level</label>
                        <select name="level" id="level" class="form-control">
                            @if(Auth::user()->level == 'owner')
                            <option value="admin">Admin</option>
                            <option value="owner">Owner</option>
                            @endif
                            <option value="user">User</option>
                        </select>
                        @error('level')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nohp" class="text-capitalize">nohp</label>
                        <input type="tel" name="nohp" id="nohp" class="form-control" pattern="\d{10,13}"  maxlength="13" pattern="\d*" title="Isi 10-13 digit berupa angka">
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
                                <span class="text-danger" role="alert">
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
                                <span class="text-danger" role="alert">
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
                            <span class="text-danger" role="alert">
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
<script>
    let passwordInp = document.querySelector("#password");
    let validationRegex = [
        { regex: /.{8,}/ }, // min 8 letters,
        { regex: /[0-9]/ }, // numbers from 0 - 9
        { regex: /[a-z]/ }, // letters from a - z (lowercase)
        { regex: /[A-Z]/ }, // letters from A-Z (uppercase),
        { regex: /[^A-Za-z0-9]/ } // special characters
    ];
    passwordInp.addEventListener("keyup", () => {
        validationRegex.forEach((item, i) => {
            let isValid = item.regex.test(passwordInp.value);
            if (isValid) {
                $('.list-item-'+i).attr("hidden",true);
            } else {
                $('.list-item-'+i).removeAttr("hidden");
            }
        });
    });
</script>



<!-- CONTENT AREA -->

<!--  END CONTENT AREA  -->
@endsection