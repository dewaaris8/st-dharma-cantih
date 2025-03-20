@extends('layout')

@section('title', 'Tambah Anggota')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Anggota</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.anggota.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text">
                            <i class="icon-base bx bx-user"></i>
                        </span>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="basic-icon-default-fullname" placeholder="John Doe"
                            value="{{ old('nama') }}" aria-describedby="basic-icon-default-fullname2">
                    </div>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
                        <input type="text" name="email" id="basic-icon-default-email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="john.doe" value="{{ old('email') }}"
                            aria-describedby="basic-icon-default-email2">
                        <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                    </div>
                    <div class="form-text">You can use letters, numbers & periods</div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text">
                            <i class="icon-base bx bx-phone"></i>
                        </span>
                        <input type="text" name="telepon" id="basic-icon-default-phone"
                            class="form-control phone-mask @error('telepon') is-invalid @enderror"
                            placeholder="658 799 8941" value="{{ old('telepon') }}"
                            aria-describedby="basic-icon-default-phone2">
                    </div>
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-alamat">Alamat</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="icon-base bx bx-map"></i></span>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            id="basic-icon-default-alamat" placeholder="Jl. Merdeka No. 10"
                            value="{{ old('alamat') }}" aria-describedby="basic-icon-default-alamat2">
                    </div>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-nama-ibu">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror"
                        id="basic-icon-default-nama-ibu" placeholder="Nama Ibu" value="{{ old('nama_ibu') }}">
                    @error('nama_ibu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-nama-ayah">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror"
                        id="basic-icon-default-nama-ayah" placeholder="Nama Ayah" value="{{ old('nama_ayah') }}">
                    @error('nama_ayah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="form-label" for="basic-icon-default-daerah">Daerah</label>
                    <select class="form-select @error('daerah') is-invalid @enderror"
                        id="basic-icon-default-daerah" name="daerah">
                        <option value="Kaja Kauh" {{ old('daerah') == 'Kaja Kauh' ? 'selected' : '' }}>Kaja Kauh</option>
                        <option value="Kaja Kangin" {{ old('daerah') == 'Kaja Kangin' ? 'selected' : '' }}>Kaja Kangin</option>
                        <option value="Delod" {{ old('daerah') == 'Delod' ? 'selected' : '' }}>Delod</option>
                    </select>
                    @error('daerah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
