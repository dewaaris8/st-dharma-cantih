@extends('layout')

@section('title', 'Daftar Anggota')

@section('content')

<div class="w-full flex flex-col md:flex-row md:justify-between items-center pb-5  gap-3">
  <!-- Tombol Tambah Anggota -->
  <a href="{{ route('admin.anggota.create') }}" class="btn flex-3 btn-primary ">
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
                    @foreach($anggota as $index => $item)
                        <tr>
                            <td>{{ $anggota->firstItem() + $index }}</td> 
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
                </tbody>
            </table>
        </div>

        <!-- Menampilkan navigasi pagination -->
        <!-- Navigasi Pagination -->
@if ($anggota->hasPages())
<div class="flex justify-between items-center px-6 py-4 bg-gray-100">
    <p class="text-gray-600">
        Menampilkan {{ $anggota->firstItem() }} - {{ $anggota->lastItem() }} dari {{ $anggota->total() }} anggota
    </p>

    <div class="flex space-x-2">
        {{-- Tombol "Previous" --}}
        @if ($anggota->onFirstPage())
            <span class="px-3 py-1 text-gray-400 bg-gray-200 rounded-md">Sebelumnya</span>
        @else
            <a href="{{ $anggota->previousPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Sebelumnya
            </a>
        @endif

        {{-- Nomor Halaman --}}
        @foreach ($anggota->getUrlRange(1, $anggota->lastPage()) as $page => $url)
            @if ($page == $anggota->currentPage())
                <span class="px-3 py-1 bg-blue-500 text-white rounded-md">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        {{-- Tombol "Next" --}}
        @if ($anggota->hasMorePages())
            <a href="{{ $anggota->nextPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Selanjutnya
            </a>
        @else
            <span class="px-3 py-1 text-gray-400 bg-gray-200 rounded-md">Selanjutnya</span>
        @endif
    </div>
</div>
@endif

    </div>
@endsection
