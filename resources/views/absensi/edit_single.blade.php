@extends('layout')

@section('title', 'Edit Absensi')

@section('content')
<div class="w-full rounded-xl p-6 h-max bg-white shadow-md">
    <h3 class="text-lg font-semibold mb-4">Edit Absensi untuk {{ $absensi->anggota->nama }}</h3>
    
    <form action="{{ route('admin.absensi.updateSingle', $absensi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Status Kehadiran:</label>
            <div class="flex flex-col md:flex-row gap-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="Hadir"
                           {{ $absensi->status === 'Hadir' ? 'checked' : '' }}
                           class="form-radio text-green-600">
                    <span class="ml-2">Hadir</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="Tidak Hadir"
                           {{ $absensi->status === 'Tidak Hadir' ? 'checked' : '' }}
                           class="form-radio text-red-600">
                    <span class="ml-2">Tidak Hadir</span>
                </label>

                <label class="inline-flex items-center">
                    <input type="radio" name="status" value="Sakit"
                           {{ $absensi->status === 'Sakit' ? 'checked' : '' }}
                           class="form-radio text-yellow-500">
                    <span class="ml-2">Sakit</span>
                </label>
            </div>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
