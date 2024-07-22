@extends('layouts/app')
@section('title', 'Buku')

@section('content')
<!-- Tombol untuk menambah anggota -->

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
      <h3 class="card-title">Masukan Buku</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('buku.store') }}" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" placeholder="judul">
        </div>
        <div class="form-group">
          <label>Penerbit</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="penerbit">
        </div>
        <div class="form-group">
          <label>Tahun</label>
          <input type="year" class="form-control" id="tahun" name="tahun" placeholder="tahun">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Upload Anggota</button>
      </div>
    </form>
  </div>

@endsection