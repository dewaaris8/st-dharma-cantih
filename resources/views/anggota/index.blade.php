@extends('layout')

@section('title', 'Daftar Anggota')

@section('content')
<div class="w-full flex flex-col md:flex-row md:justify-between items-center pb-5 gap-3">
    <a href="{{ route('admin.anggota.create') }}" class="btn flex-3 btn-primary">
        Tambah Anggota
    </a>

    <form method="GET" action="{{ route('admin.anggota.index') }}" class="flex-1">
        <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-2 w-full">
            <input type="text" name="search"
                class="border border-gray-300 rounded-md px-4 py-2 w-full md:w-auto focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Cari Nama, Email, atau Daerah" value="{{ request('search') }}">
            
            <select name="verified" class="border border-gray-300 rounded-md px-4 py-2 w-full md:w-auto focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Semua</option>
                <option value="1" {{ request('verified') === '1' ? 'selected' : '' }}>Terverifikasi</option>
                <option value="0" {{ request('verified') === '0' ? 'selected' : '' }}>Belum Terverifikasi</option>
            </select>

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                Cari
            </button>
        </div>
    </form>
    <form action="{{ route('pendaftaran.toggle') }}" method="POST" class="mb-3">
        @csrf
        @method('PUT')
        <button type="submit" class="btn {{ config('pendaftaran.is_open') ? 'btn-danger' : 'btn-success' }}">
            {{ config('pendaftaran.is_open') ? 'Tutup Pendaftaran' : 'Buka Pendaftaran' }}
        </button>
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
                    <th>Denda</th>
                    <th>Status</th>
                    <th>Verifikasi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php $no = $anggota->firstItem(); @endphp
                @forelse($groupedAnggota as $daerah => $group)
                    <tr>
                        <td colspan="12" class="bg-gray-200 font-bold text-blue-700">
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
                            <td>Rp{{ number_format($item->totalDenda(), 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $item->status == 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                @if(!$item->is_verified)
                                    <form action="{{ route('admin.anggota.verifikasi', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Verifikasi anggota ini?')">Verifikasi</button>
                                    </form>
                                @else
                                    <span class="badge bg-info text-white">Terverifikasi</span>
                                @endif
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
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Tidak ada data anggota.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($anggota->hasPages())
    <div class="d-flex flex-column flex-md-row justify-between align-items-start align-items-md-center mt-3 px-3 py-3 bg-light gap-2">
        <p class="mb-0 text-muted">
            Menampilkan {{ $anggota->firstItem() }} - {{ $anggota->lastItem() }} dari {{ $anggota->total() }} anggota
        </p>
        <nav>
            <ul class="pagination flex-wrap mb-0">
                @if ($anggota->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">«</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $anggota->previousPageUrl() }}" rel="prev">«</a></li>
                @endif

                @foreach ($anggota->links()->elements[0] as $page => $url)
                    @if ($page == $anggota->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                @if ($anggota->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $anggota->nextPageUrl() }}" rel="next">»</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">»</span></li>
                @endif
            </ul>
        </nav>
    </div>
    @endif
</div>
@endsection
