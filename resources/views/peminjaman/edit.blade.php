@extends('layout')

@section('content')
    <h2>Edit Peminjaman</h2>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Peminjaman Barang</h5>
            <small class="text-body float-end">Perbarui data peminjaman</small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.peminjaman.update', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inventaris_id" class="form-label">Nama Barang</label>
                    <select name="inventaris_id" id="inventaris_id" class="form-control" required>
                        @foreach ($inventaris as $item)
                            <option value="{{ $item->id }}" 
                                data-stock="{{ $item->jumlah }}" 
                                {{ $item->id == $peminjaman->inventaris_id ? 'selected' : '' }}>
                                {{ $item->nama_barang }} (Tersedia: {{ $item->jumlah }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_dipinjam" class="form-label">Jumlah Dipinjam</label>
                    <input type="number" name="jumlah_dipinjam" id="jumlah_dipinjam" class="form-control" value="{{ $peminjaman->jumlah_dipinjam }}" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}" required>
                </div>

                <div class="mb-3">
                    <label for="durasi_pinjam" class="form-label">Durasi Peminjaman (Hari)</label>
                    <input type="number" name="durasi_pinjam" id="durasi_pinjam" class="form-control" value="{{ $peminjaman->durasi_pinjam }}" min="1" required>
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('inventaris_id').addEventListener('change', function () {
            let selectedOption = this.options[this.selectedIndex];
            let availableStock = selectedOption.getAttribute('data-stock');
            document.getElementById('jumlah_dipinjam').setAttribute('max', availableStock);
        });
    </script>
@endsection
