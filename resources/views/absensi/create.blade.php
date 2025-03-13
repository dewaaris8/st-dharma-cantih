@extends('layout')

@section('title', 'Buat Absensi')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Buat Absensi untuk {{ $acara->nama }}</h5>
            <small class="text-body float-end">Masukkan detail absensi</small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.absensi.store', $acara->id) }}" method="POST">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Anggota</th>
                            <th>Status Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $a)
                        <tr>
                            <td>{{ $a->nama }}</td>
                            <td>
                                <select name="absensi[{{ $a->id }}][status]" class="form-control" required>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                                <input type="hidden" name="absensi[{{ $a->id }}][anggota_id]" value="{{ $a->id }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Simpan Absensi</button>
            </form>
        </div>
    </div>
@endsection
