@extends('layout')

@section('title', 'Tambah Anggota')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Anggota</h5>
          <small class="text-body float-end">Merged input group</small>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.anggota.store') }}" method="POST">
            @csrf
            <div class="mb-6">
              <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class="icon-base bx bx-user"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  id="basic-icon-default-fullname"
                  placeholder="John Doe"
                  aria-label="John Doe"
                  name="nama"
                  aria-describedby="basic-icon-default-fullname2" />
              </div>
            </div>
            <div class="mb-6">
              <label class="form-label" for="basic-icon-default-email">Email</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
                <input
                  name="email"
                  type="text"
                  id="basic-icon-default-email"
                  class="form-control"
                  placeholder="john.doe"
                  aria-label="john.doe"
                  aria-describedby="basic-icon-default-email2" />
                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
              </div>
              <div class="form-text">You can use letters, numbers & periods</div>
            </div>
            <div class="mb-6">
              <label class="form-label" for="basic-icon-default-phone">Phone No</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-phone2" class="input-group-text"
                  ><i class="icon-base bx bx-phone"></i
                ></span>
                <input
                name="telepon"
                  type="text"
                  id="basic-icon-default-phone"
                  class="form-control phone-mask"
                  placeholder="658 799 8941"
                  aria-label="658 799 8941"
                  aria-describedby="basic-icon-default-phone2" />
              </div>
            </div>
            <div class="mb-6">
              <label class="form-label" for="basic-icon-default-alamat">Alamat</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="icon-base bx bx-map"></i></span>
                <input
                  type="text"
                  class="form-control"
                  id="basic-icon-default-alamat"
                  placeholder="Jl. Merdeka No. 10"
                  name="alamat"
                  aria-describedby="basic-icon-default-alamat2" />
              </div>
            </div>
            
            <div class="mb-6">
              <label class="form-label" for="basic-icon-default-nama-ibu">Nama Ibu</label>
              <input type="text" class="form-control" id="basic-icon-default-nama-ibu" name="nama_ibu" placeholder="Nama Ibu" />
            </div>
            
            <div class="mb-6">
              <label class="form-label" for="basic-icon-default-nama-ayah">Nama Ayah</label>
              <input type="text" class="form-control" id="basic-icon-default-nama-ayah" name="nama_ayah" placeholder="Nama Ayah" />
            </div>
            
            <div class="mb-6">
              <label class="form-label" for="basic-icon-default-daerah">Daerah</label>
              <select class="form-select" id="basic-icon-default-daerah" name="daerah">
                <option value="Kaja Kauh">Kaja Kauh</option>
                <option value="Kaja Kangin">Kaja Kangin</option>
                <option value="Delod">Delod</option>
              </select>
            </div>           
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
    </div>
@endsection
