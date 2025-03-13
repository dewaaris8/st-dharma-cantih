@extends('layout')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h2>Tambah Peminjaman</h2>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Peminjaman Barang</h5>
          <small class="text-body float-end">data barang</small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.peminjaman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="inventaris_id" class="form-label">Nama Barang</label>
                    <select name="inventaris_id" id="inventaris_id" class="form-control" required>
                        @foreach ($inventaris as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_barang }} (Tersedia: {{ $item->jumlah }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_peminjam" class="form-label">Nomor HP Peminjam</label>
                    <input type="text" name="nomor_peminjam" id="nomor_peminjam" class="form-control" required>
                </div>
                <div class="mb-6">
                <label class="form-label" for="basic-default-company">Jumlah dipinjam</label>
                <input type="number" class="form-control" name="jumlah_dipinjam" id="basic-default-company" placeholder="10" />
                </div>
                <div class="mb-3">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="durasi_pinjam" class="form-label">Durasi Peminjaman (Hari)</label>
                    <input type="number" name="durasi_pinjam" id="durasi_pinjam" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection
