@extends('layout')

@section('title', 'Edit Absensi')

@section('content')
<div class="w-full rounded-xl p-6 h-max bg-white shadow-md">
    <h3 class="text-lg font-semibold mb-4">Edit Absensi untuk {{ $absensi->anggota->nama }}</h3>
    
    <form action="{{ route('admin.absensi.updateSingle', $absensi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status Kehadiran:</label>
            <div class="relative mt-1">
                <select name="status" id="status" class="block w-full appearance-none border border-gray-300 rounded-md py-2 pl-3 pr-10 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Tidak Hadir" {{ $absensi->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                    <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                </select>
                <!-- Ikon dropdown -->
                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
