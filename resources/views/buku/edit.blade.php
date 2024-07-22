@extends('layouts/app')
    @section('title', 'Edit Buku')
    


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
      <h3 class="card-title">Edit Buku</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('buku.update', $buku) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label>Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="{{ $buku->judul }}">
        </div>
        <div class="form-group">
          <label>penerbit</label>
          <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="penerbit" value="{{ $buku->penerbit }}">
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <select class="form-control" id="tahun" name="tahun" value="{{ $buku->tahun }}" required>
              <option value="" selected disabled>Pilih tahun</option>
              @for ($year = 1900; $year <= 2024; $year++)
                  <option value="{{ $year }}">{{ $year }}</option>
              @endfor
            </select>
          </div>
        
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Edit buku</button>
      </div>
    </form>
  </div>

@endsection
