@extends('layouts/app')
    @section('title', 'Anggota')
    


@section('content')
<a href="{{ route('anggota.create') }}" class="btn btn-success">
    Tambah Anggota</a>
  

@endsection
