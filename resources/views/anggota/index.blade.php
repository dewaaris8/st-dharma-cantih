@extends('layout')

@section('title', 'Daftar Anggota')

@section('content')
<div class="w-full flex flex-col md:flex-row md:justify-between items-center pb-5 gap-3">
    <!-- Tombol Tambah Anggota -->
    <a href="{{ route('admin.anggota.create') }}" class="btn flex-3 btn-primary">
        Tambah Anggota
    </a>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('admin.anggota.index') }}" class="flex-1">
        <div class="flex items-center space-x-2 w-full">
            <input type="text" name="search"
                class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Cari Nama, Email, atau Daerah" value="{{ request('search') }}">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                Cari
            </button>
        </div>
    </form>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <h5 class="card-header">Daftar Anggota</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Alamat</th>
                    <th>Daerah</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $no = $anggota->firstItem(); @endphp
                @foreach($groupedAnggota as $daerah => $group)
                    <tr>
                        <td colspan="10" class="bg-gray-200 font-bold text-blue-700">
                            {{ $daerah ?: 'Tanpa Daerah' }}
                        </td>
                    </tr>
                    @foreach($group as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->nama_ayah }}</td>
                            <td>{{ $item->nama_ibu }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->daerah }}</td>
                            <td>
                                <span class="badge {{ $item->status == 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.anggota.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.anggota.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus anggota ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Navigasi Pagination -->
    @if ($anggota->hasPages())
    <div class="d-flex flex-column flex-md-row justify-between align-items-start align-items-md-center mt-3 px-3 py-3 bg-light gap-2">
        {{-- Info Jumlah Anggota --}}
        <p class="mb-0 text-muted">
            Menampilkan {{ $anggota->firstItem() }} - {{ $anggota->lastItem() }} dari {{ $anggota->total() }} anggota
        </p>

        {{-- Navigasi Halaman --}}
        <nav>
            <ul class="pagination flex-wrap mb-0">
                {{-- Tombol Sebelumnya --}}
                @if ($anggota->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">«</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $anggota->previousPageUrl() }}" rel="prev">«</a>
                    </li>
                @endif

                {{-- Nomor Halaman --}}
                @foreach ($anggota->links()->elements[0] as $page => $url)
                    @if ($page == $anggota->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Tombol Selanjutnya --}}
                @if ($anggota->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $anggota->nextPageUrl() }}" rel="next">»</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">»</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif


</div>
@endsection
