@extends('layout')

@section('title', 'Daftar Anggota')

@section('content')
    <h2>Daftar Anggota</h2>
    <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    
    <div class="card">
        <h5 class="card-header">Daftar Anggota</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Alamat</th>
                <th>Daerah</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach($anggota as $item)
              <tr>
                <td>
                    <span>{{ $item->nama }}</span>
                </td>
                <td>{{ $item->email }}</td>
                <td>
                    {{ $item->telepon }}
                </td>
                <td>
                    {{ $item->nama_ayah }}
                </td>
                <td>
                    {{ $item->nama_ibu }}
                </td>
                <td>
                    {{ $item->alamat }}
                </td>
                <td>
                    {{ $item->daerah }}
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
      </div>
@endsection
