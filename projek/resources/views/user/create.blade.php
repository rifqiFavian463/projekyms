@extends('layouts.main-layouts')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Form regristasi user</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('user.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nim:</strong>
                <input type="text" name="Nim" class="form-control" placeholder="NIS SISWA">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="image" class="form-label">image</label>
            <img class="img-preview img-fluid mb-3  ">
            <input class="form-control " type="file" id="image" name="image" onchange="previewImage()">
        </div>

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label><i class="fa fa-user"></i> Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Username" required="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label><i class="fa fa-envelope"></i> Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label><i class="fa fa-key"></i> Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
            
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
            <label><i class="fa fa-key"></i> Role</label>
            <input type="text" name="role" class="form-control "   placeholder="role" required="">
        </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection