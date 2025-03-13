@extends('layout')

@section('title', 'Edit Inventaris Barang')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Inventaris Barang</h5>
          <small class="text-body float-end"><a href="{{route('admin.inventaris.index')}}">Kembali</a></small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.inventaris.update', $inventaris->id) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="mb-6">
              <label class="form-label" for="basic-default-fullname">Nama Barang</label>
              <input type="text" value="{{ $inventaris->nama_barang }}" name="nama_barang" class="form-control" id="basic-default-fullname" placeholder="Kursi" />
            </div>
            <div class="mb-6">
              <label class="form-label" for="basic-default-company">Jumlah</label>
              <input type="number" value="{{ $inventaris->jumlah }}" class="form-control" name="jumlah" id="basic-default-company" placeholder="10" />
            </div>
            <div class="mb-6">
                <label class="form-label" for="basic-default-message">Deskripsi Barang</label>
                <textarea
                name="catatan"
                  id="basic-default-message"
                  class="form-control"
                  placeholder="Berikan Deskripsi Kondisi Barang">{{$inventaris->catatan }}</textarea>
              </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection
