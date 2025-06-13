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
            <h5 class="text-lg font-semibold">Buat Presensi untuk {{ $acara->nama }}</h5>
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
                    @foreach($anggota->groupBy('daerah') as $daerah => $group)
                        <tr class="bg-gray-200">
                            <td colspan="2" class="p-3 font-bold text-blue-700">{{ $daerah }}</td>
                        </tr>
                        @foreach($group as $a)
                            <tr class="border-b">
                                <td class="p-3 border">{{ $a->nama }}</td>
                                <td class="p-3 border">
                                    <div class="flex gap-4">
                                        @php
                                            $statuses = ['Hadir', 'Tidak Hadir', 'Sakit'];
                                        @endphp
                                        @foreach($statuses as $status)
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="absensi[{{ $a->id }}][status]" value="{{ $status }}"
                                                    class="form-radio text-blue-500"
                                                    {{ $status == 'Hadir' ? 'checked' : '' }} required>
                                                <span class="ml-2">{{ $status }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="absensi[{{ $a->id }}][anggota_id]" value="{{ $a->id }}">
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                    Simpan Presensi
                </button>
            </div>
        </form>
    </div>

@endsection
