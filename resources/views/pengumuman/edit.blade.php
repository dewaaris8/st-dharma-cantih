@extends('layout')

@section('title', 'Edit Inventaris Barang')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Pengumuman</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pengumuman.update', $pengumuman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Judul Pengumuman</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="basic-default-fullname" placeholder="Judul" value="{{ old('judul', $pengumuman->judul) }}" />
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-default-message">Deskripsi Pengumuman</label>
                    <textarea name="deskripsi" id="basic-default-message" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Berikan Deskripsi Kondisi Pengumuman">{{ old('deskripsi', $pengumuman->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
