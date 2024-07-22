@extends('layouts/app')
    @section('title', 'Anggota')
    


@section('content')
{{-- Notifikasi eror --}}
@if($errors->any()) 
  <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li class="py-5 bg-red-500 text-white font-bold">{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Anggota</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('anggota.update', $anggota->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ $anggota->nama }}">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="alamat" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="{{ $anggota->alamat }}">
        </div>
        <div class="form-group">
          <label>Kota</label>
          <input type="kota" class="form-control" id="kota" name="kota" placeholder="kota" value="{{ $anggota->kota }}">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $anggota->email }}">
        </div>
        <div class="form-group">
          <label >File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="profile" value="{{ $anggota->profile }}" name="profile">
              <label class="custom-file-label" for="profile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Upload Anggota</button>
      </div>
    </form>
  </div>

@endsection
