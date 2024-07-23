@extends('layouts/app')
@section('title', 'Peminjaman')

@section('content')
<!-- Tombol untuk menambah anggota -->
<a href="{{ route('peminjaman.create') }}" class="btn btn-success">Tambah peminjaman</a>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Peminjaman</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Tabel DataTables -->
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($peminjamans as $peminjaman)
                <tr>
                    <td>{{ $peminjaman->anggota->nama }}</td>
                    <td>{{ $peminjaman->buku->judul }}</td>
                    <td>{{ $peminjaman->created_at->format('d-m-Y') }}</td>
                    <td>
                        @if ($peminjaman->trashed())
                    <!-- Form untuk menyelesaikan peminjaman -->
                    <form action="{{ route('peminjaman.restore', $peminjaman->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="py-3 px-5 rounded-full bg-green-500 text-white">Selesai</button>
                    </form>
                    @else
                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="py-3 px-5 rounded-full bg-red-500 text-white">Pinjam</button>
                    </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum Ada Peminjaman</td>
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