@extends('layout')

@section('title', 'Daftar Acara')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Acara</h5>
            <a href="{{ route('admin.acara.create') }}" class="btn btn-primary mb-3">Tambah Acara</a>
        </div>

        <div class="table-responsive w-full text-nowrap">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Acara</th>
                        <th>Deskripsi Acara</th>
                        <th>Tanggal Acara</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($acara as $index => $item)
                        <tr>
                            <td>{{ $acara->firstItem() + $index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <a href="{{ route('admin.acara.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('admin.absensi.create', $item->id) }}" class="btn btn-success btn-sm">Buat Presensi</a>
                                <a href="{{ route('admin.absensi.index', $item->id) }}" class="btn btn-info btn-sm">Lihat Presensi</a>
                                <a href="{{ route('admin.absensi.previewPDF', $item->id) }}" class="btn btn-primary btn-sm" target="_blank">Preview Absensi</a>
                                <form action="{{ route('admin.acara.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus acara ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <div>
                    Menampilkan {{ $acara->firstItem() }} - {{ $acara->lastItem() }} dari {{ $acara->total() }} acara
                </div>
                <div>
                    {{ $acara->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
