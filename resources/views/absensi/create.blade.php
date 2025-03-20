@extends('layout')

@section('title', 'Buat Absensi')

@section('content')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h5 class="text-lg font-semibold">Buat Absensi untuk {{ $acara->nama }}</h5>
        </div>

        <form action="{{ route('admin.absensi.store', $acara->id) }}" method="POST">
            @csrf
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm uppercase">
                        <th class="p-3 border">Nama Anggota</th>
                        <th class="p-3 border">Status Kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $a)
                    <tr class="border-b">
                        <td class="p-3 border">{{ $a->nama }}</td>
                        <td class="p-3 border">
                            <div class="relative">
                                <select name="absensi[{{ $a->id }}][status]" class="block w-full appearance-none border rounded-md py-2 pl-3 pr-10 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                                <!-- Ikon dropdown -->
                                <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <input type="hidden" name="absensi[{{ $a->id }}][anggota_id]" value="{{ $a->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>

@endsection
