@extends('layout')

@section('title', 'Tambah Acara')

@section('content')
    <h2>Tambah Acara</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Acara atau Kegiatan</h5>
          <small class="text-body float-end">Masukkan detail acara</small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.acara.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Acara</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection
