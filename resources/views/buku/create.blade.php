@extends('layouts/app')
@section('title', 'Buku')
    


@section('content')
{{-- Notifikasi eror --}}

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
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
          <label for="tahun">Tahun</label>
          <select class="form-control" id="tahun" name="tahun" required>
            <option value="" selected disabled>Pilih tahun</option>
            @for ($year = 1900; $year <= 2024; $year++)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
          </select>
        </div>
        
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Upload Buku</button>
      </div>
    </form>
  </div>

@endsection
