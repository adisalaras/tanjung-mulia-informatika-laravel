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
      <h3 class="card-title">Tambah Peminjaman Buku</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('peminjaman.store') }}" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="card-body">
        <div class="card-body">
            <!-- Dropdown untuk Anggota -->
            <label>Nama Anggota</label>
    <select class="form-control" id="anggota_id" name="anggota_id" required>
        <option value="" selected disabled>Pilih Anggota</option>
        @foreach($anggotas as $anggota)
            <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
        @endforeach
    </select>
        <div class="form-group">
            <select name="buku_id" id="buku_id">
                <option value="">Pilih Buku</option>
                @forelse($bukus as $buku)
                
                <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @empty
                <option value="">Pilih Buku</option>
                @endforelse
            </select>
        </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
      </div>
    </form>
  </div>

@endsection
