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
                        <th>Catatan</th>
                        <th>Sedang Dipinjam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($barang as $index => $item)
                        <tr>
                            <td>{{ $barang->firstItem() + $index }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->catatan }}</td>
                            <td>{{ $item->jumlahSedangDipinjam() }}</td>
                            <td>
                                <a href="{{ route('admin.inventaris.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.inventaris.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
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

        <nav>
            <ul class="pagination mb-0">
                {{-- Previous Page Link --}}
                @if ($barang->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">«</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $barang->previousPageUrl() }}" rel="prev">«</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($barang->links()->elements[0] as $page => $url)
                    @if ($page == $barang->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($barang->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $barang->nextPageUrl() }}" rel="next">»</a>
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
