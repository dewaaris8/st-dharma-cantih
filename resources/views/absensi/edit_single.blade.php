@extends('layout')

@section('title', 'Edit Absensi')

@section('content')
    <h3>Edit Absensi untuk {{ $absensi->anggota->nama }}</h3>
    <form action="{{ route('admin.absensi.updateSingle', $absensi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Status Kehadiran:</label>
            <select name="status" id="status" class="form-control">
                <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Tidak Hadir" {{ $absensi->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
