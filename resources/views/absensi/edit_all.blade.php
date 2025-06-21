@extends('layout')

@section('title', 'Edit Absensi Acara')

@section('content')
<div class="w-full bg-white rounded-xl p-6 shadow-md">
    <h3 class="text-lg font-semibold mb-4">Edit Absensi untuk Acara: {{ $acara->nama }}</h3>
    
    <form action="{{ route('admin.absensi.update', $acara->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-sm uppercase">
                    <th class="p-3 border">Nama Anggota</th>
                    <th class="p-3 border">Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi as $index => $item)
                    <tr class="border-b">
                        <td class="p-3 border">{{ $item->anggota->nama }}</td>
                        <td class="p-3 border">
                            <div class="flex flex-col md:flex-row gap-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="absensi[{{ $index }}][status]" value="Hadir"
                                           {{ $item->status === 'Hadir' ? 'checked' : '' }}
                                           class="form-radio text-green-600">
                                    <span class="ml-2">Hadir</span>
                                </label>

                                <label class="inline-flex items-center">
                                    <input type="radio" name="absensi[{{ $index }}][status]" value="Tidak Hadir"
                                           {{ $item->status === 'Tidak Hadir' ? 'checked' : '' }}
                                           class="form-radio text-red-600">
                                    <span class="ml-2">Tidak Hadir</span>
                                </label>

                                <label class="inline-flex items-center">
                                    <input type="radio" name="absensi[{{ $index }}][status]" value="Sakit"
                                           {{ $item->status === 'Sakit' ? 'checked' : '' }}
                                           class="form-radio text-yellow-500">
                                    <span class="ml-2">Sakit</span>
                                </label>
                            </div>
                            <input type="hidden" name="absensi[{{ $index }}][id]" value="{{ $item->id }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
