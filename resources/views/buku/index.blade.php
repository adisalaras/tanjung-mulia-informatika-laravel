@extends('layouts/app')
@section('title', 'Buku')

@section('content')
<!-- Tombol untuk menambah anggota -->
<a href="{{ route('buku.create') }}" class="btn btn-success">Tambah Buku</a>

@endsection