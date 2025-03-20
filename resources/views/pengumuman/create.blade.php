@extends('layout')

@section('title', 'Tambah Pengumuman')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Pengumuman</h5>
            <small class="text-body float-end"></small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pengumuman.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Judul Pengumuman</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="basic-default-fullname" placeholder="Judul" value="{{ old('judul') }}" />
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="form-label" for="basic-default-message">Deskripsi Pengumuman</label>
                    <textarea name="deskripsi" id="basic-default-message" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Berikan Deskripsi Kondisi Pengumuman">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
