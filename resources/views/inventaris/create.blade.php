@extends('layout')

@section('title', 'Tambah Inventaris Barang')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Inventaris Barang</h5>
          <small class="text-body float-end">data barang</small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.inventaris.store') }}" method="POST">
                @csrf
            <div class="mb-6">
              <label class="form-label" for="basic-default-fullname">Full Name</label>
              <input type="text" name="nama_barang" class="form-control" id="basic-default-fullname" placeholder="Kursi" />
            </div>
            <div class="mb-6">
              <label class="form-label" for="basic-default-company">Jumlah</label>
              <input type="number" class="form-control" name="jumlah" id="basic-default-company" placeholder="10" />
            </div>
            <div class="mb-6">
                <label class="form-label" for="basic-default-message">Message</label>
                <textarea
                name="catatan"
                  id="basic-default-message"
                  class="form-control"
                  placeholder="Berikan Deskripsi Kondisi Barang"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection
