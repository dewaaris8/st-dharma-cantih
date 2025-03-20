@extends('layout')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h2>Tambah Peminjaman</h2>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Peminjaman Barang</h5>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.peminjaman.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inventaris_id" class="form-label">Nama Barang</label>
                    <select name="inventaris_id" id="inventaris_id" class="form-control @error('inventaris_id') is-invalid @enderror" >
                        @foreach ($inventaris as $item)
                            <option value="{{ $item->id }}" {{ old('inventaris_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_barang }} (Tersedia: {{ $item->jumlah }})
                            </option>
                        @endforeach
                    </select>
                    @error('inventaris_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" value="{{ old('nama_peminjam') }}" >
                    @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nomor_peminjam" class="form-label">Nomor HP Peminjam</label>
                    <input type="text" name="nomor_peminjam" id="nomor_peminjam" class="form-control @error('nomor_peminjam') is-invalid @enderror" value="{{ old('nomor_peminjam') }}" >
                    @error('nomor_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="jumlah_dipinjam">Jumlah Dipinjam</label>
                    <input type="number" class="form-control @error('jumlah_dipinjam') is-invalid @enderror" name="jumlah_dipinjam" id="jumlah_dipinjam" value="{{ old('jumlah_dipinjam') }}" >
                    @error('jumlah_dipinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam') }}" >
                    @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="durasi_pinjam" class="form-label">Durasi Peminjaman (Hari)</label>
                    <input type="number" name="durasi_pinjam" id="durasi_pinjam" class="form-control @error('durasi_pinjam') is-invalid @enderror" value="{{ old('durasi_pinjam') }}" min="1" >
                    @error('durasi_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection
