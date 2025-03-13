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
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($barang as $item)
              <tr>
                <td>
                    <span>{{ $item->nama_barang }}</span>
                </td>
                <td>{{ $item->jumlah }}</td>
                <td>
                    {{ $item->catatan }}
                </td>
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
    </div>
@endsection
