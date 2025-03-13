@extends('layout')

@section('title', 'Detail Absensi')

@section('content')
    @if($absensi->isEmpty())
        <div class="alert alert-warning">Belum ada absensi untuk acara ini.</div>
    @else
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Absensi untuk Acara: {{ $acara->nama }}</h5>
                <a href="{{ route('admin.absensi.edit', $acara->id) }}" class="btn btn-secondary">Edit Absensi</a>
            </div>
            
            
            <div class="table-responsive text-nowrap">
                @foreach($absensi as $daerah => $dataAbsensi)
                    <div class="mt-4">
                        <h5 class="fw-bold">{{ $daerah }}</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Status Kehadiran</th>
                                    <th>Tanggal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach($dataAbsensi as $item)
                                    <tr>
                                        <td>{{ $item->anggota->nama }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>
                                            <a href="{{ route('admin.absensi.editSingle', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
