@extends('layout')

@section('title', 'Daftar Pengumuman')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Daftar Pengumuman</h2>

        <!-- Notifikasi sukses -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Pengumuman -->
        <a href="{{ route('admin.pengumuman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Tambah Pengumuman
        </a>

        <div class="bg-white shadow-md rounded-lg mt-4">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-3 text-left">#</th>
                            <th class="px-4 py-3 text-left">Judul</th>
                            <th class="px-4 py-3 text-left">Deskripsi</th>
                            <th class="px-4 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($pengumuman as $index => $item)
                            <tr>
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3">{{ $item->judul }}</td>
                                <td class="px-4 py-3 max-w-xs truncate" title="{{ $item->deskripsi }}">
                                    {{ Str::limit($item->deskripsi, 100, '...') }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengumuman ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
