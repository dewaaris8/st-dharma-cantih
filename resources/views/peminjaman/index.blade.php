@extends('layout')

@section('title', 'Daftar Peminjaman')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Peminjaman</h5>
            <a href="{{ route('admin.peminjaman.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>
          </div>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Nama Peminjam</th>
                <th>Contact Peminjam</th>
                <th>Jumlah Dipinjam</th>
                <th>Durasi (Hari)</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($peminjaman as $item)
              <tr>
                <td>{{ $item->inventaris->nama_barang }}</td>
                <td>{{ $item->nama_peminjam }}</td>
                <td>{{ $item->nomor_peminjam }}</td>
                    <td>{{ $item->jumlah_dipinjam }}</td>
                    <td>{{ $item->durasi_pinjam ?? '-' }}</td>
                    <td>{{ $item->tanggal_pinjam ? date('d-m-Y', strtotime($item->tanggal_pinjam)) : '-' }}</td>
                    <td>{{ $item->tanggal_kembali ? date('d-m-Y', strtotime($item->tanggal_kembali)) : '-' }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if($item->status == 'Belum Dipinjam')
                            <form action="{{ route('admin.peminjaman.updateStatus', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Dipinjam">
                                <button type="submit" class="btn btn-success btn-sm">Pinjam</button>
                            </form>
                        @elseif($item->status == 'Dipinjam')
                            <form action="{{ route('admin.peminjaman.updateStatus', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Dikembalikan">
                                <button type="submit" class="btn btn-info btn-sm">Kembalikan</button>
                            </form>
                        @endif
                        <a href="{{ route('admin.peminjaman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.peminjaman.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
@endsection
