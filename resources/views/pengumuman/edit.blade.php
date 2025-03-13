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
              <input type="text" value="{{ $pengumuman->judul }}" name="judul" class="form-control" id="basic-default-fullname" placeholder="Kursi" />
            </div>
            <div class="mb-6">
                <label class="form-label" for="basic-default-message">Deskripsi Pengumuman</label>
                <textarea
                name="deskripsi"
                  id="basic-default-message"
                  class="form-control"
                  placeholder="Berikan Deskripsi Kondisi Barang">{{ $pengumuman->deskripsi }}</textarea>
              </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection

