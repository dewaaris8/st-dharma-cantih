@extends('layout')

@section('title', 'Edit Absensi Acara')

@section('content')
    <h3>Edit Absensi untuk Acara: {{ $acara->nama }}</h3>
    <form action="{{ route('admin.absensi.update', $acara->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Anggota</th>
                    <th>Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi as $index => $item)
                    <tr>
                        <td>{{ $item->anggota->nama }}</td>
                        <td>
                            <select name="absensi[{{ $index }}][status]" class="form-control">
                                <option value="Hadir" {{ $item->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="Tidak Hadir" {{ $item->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                                <option value="Sakit" {{ $item->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            </select>
                            <input type="hidden" name="absensi[{{ $index }}][id]" value="{{ $item->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
