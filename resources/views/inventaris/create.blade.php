@extends('layout')

@section('title', 'Tambah Inventaris Barang')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Inventaris Barang</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.inventaris.store') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Full Name</label>
                    <input type="text" name="nama_barang" 
                        class="form-control @error('nama_barang') is-invalid @enderror" 
                        id="basic-default-fullname" placeholder="Kursi" 
                        value="{{ old('nama_barang') }}" />
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-default-company">Jumlah</label>
                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" 
                        name="jumlah" id="basic-default-company" placeholder="10" 
                        value="{{ old('jumlah') }}" />
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-default-message">Message</label>
                    <textarea name="catatan" id="basic-default-message" 
                        class="form-control @error('catatan') is-invalid @enderror"
                        placeholder="Berikan Deskripsi Kondisi Barang">{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
