@extends('layout')

@section('title', 'Inventaris Barang')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Inventaris Barang</h5>
            <a href="{{ route('admin.inventaris.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($barang as $index => $item)
                        <tr>
                            <td>{{ $barang->firstItem() + $index }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->catatan }}</td>
                            <td>
                                <a href="{{ route('admin.inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.inventaris.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($barang->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-3 px-3 py-2 bg-light">
            <p class="mb-0 text-muted">
                Menampilkan {{ $barang->firstItem() }} - {{ $barang->lastItem() }} dari {{ $barang->total() }} barang
            </p>

            <div class="d-flex gap-1">
                {{-- Previous --}}
                @if ($barang->onFirstPage())
                    <span class="btn btn-secondary btn-sm disabled">Sebelumnya</span>
                @else
                    <a href="{{ $barang->previousPageUrl() }}" class="btn btn-primary btn-sm">Sebelumnya</a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($barang->getUrlRange(1, $barang->lastPage()) as $page => $url)
                    @if ($page == $barang->currentPage())
                        <span class="btn btn-sm btn-primary">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="btn btn-sm btn-light">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($barang->hasMorePages())
                    <a href="{{ $barang->nextPageUrl() }}" class="btn btn-primary btn-sm">Selanjutnya</a>
                @else
                    <span class="btn btn-secondary btn-sm disabled">Selanjutnya</span>
                @endif
            </div>
        </div>
        @endif

    </div>
@endsection
