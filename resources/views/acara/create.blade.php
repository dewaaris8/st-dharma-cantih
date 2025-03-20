@extends('layout')

@section('title', 'Tambah Acara')

@section('content')
    <h2>Tambah Acara</h2>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Acara atau Kegiatan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.acara.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Acara</label>
                    <input type="text" name="nama" 
                        class="form-control @error('nama') is-invalid @enderror" 
                        value="{{ old('nama') }}" >
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" 
                        class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" 
                        class="form-control @error('tanggal') is-invalid @enderror" 
                        value="{{ old('tanggal') }}" >
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection
