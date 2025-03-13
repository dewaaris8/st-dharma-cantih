@extends('layout')

@section('title', 'Edit Acara')

@section('content')
    <h2>Edit Acara</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Acara atau Kegiatan</h5>
          <small class="text-body float-end">Perbarui detail acara</small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.acara.update', $acara->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Laravel requires this for updating resources --}}
                <div class="mb-3">
                    <label>Nama Acara</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $acara->nama) }}" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $acara->deskripsi) }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $acara->tanggal) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
