@extends('layouts/app')
@section('title', 'Buku')

@section('content')
<!-- Tombol untuk menambah anggota -->
<a href="{{ route('buku.create') }}" class="btn btn-success">Tambah Buku</a>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Buku</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Tabel DataTables -->
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($bukus as $buku)
                <tr>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun }}</td>
                    
                    <td>
                        <!-- Link untuk edit anggota -->
                        <a href="{{ route('buku.edit', $buku) }}" class="py-3 px-5 rounded-full bg-indigo-500 text-white">Edit</a>
                        <!-- Form untuk menghapus anggota -->
                        <form action="{{ route('buku.destroy', $buku) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-3 px-5 rounded-full bg-red-500 text-white">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum Ada Buku</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- Memuat skrip-skrip yang diperlukan -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>

<script>
    $(function () {
        // Inisialisasi DataTable dengan tombol-tombol eksternal
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection