@extends('layouts/app')
@section('title', 'Buku')

@section('content')
<!-- Tombol untuk menambah anggota -->
<a href="{{ route('peminjaman.create') }}" class="btn btn-success">Tambah peminjaman</a>

@endsection