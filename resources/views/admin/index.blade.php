@extends('layout')

@section('title', 'Dashboard')

@section('content')
      <div class="row">
        <div class="col-xxl-8 mb-6 order-0">
          <div class="card">
            <div class="d-flex align-items-start row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary mb-3">Welcome Admin 🎉</h5>
                  <p class="mb-6">
                    Lihat semua data <br />ST Dharma Cantih disini.
                  </p>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-6">
                  <img
                    src="../assets/img/illustrations/man-with-laptop.png"
                    height="175"
                    alt="View Badge User" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../assets/img/icons/unicons/chart-success.png"
                        alt="chart success"
                        class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1">Jumlah Inventaris Barang</p>
                  <h4 class="card-title mb-3">{{$jumlahInventaris}} Barang</h4>
                  <a href="{{route('admin.inventaris.index')}}" class="text-cyan-600"><u>lihat data</u></a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../assets/img/icons/unicons/wallet-info.png"
                        alt="wallet info"
                        class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt6"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1">Jumlah Data <br> Anggota</p>
                  <h4 class="card-title mb-3">{{$jumlahAnggota}} Anggota</h4>
                  <a href="{{route('admin.anggota.index')}}" class="text-cyan-600"><u>lihat data anggota</u></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Total Revenue -->
        {{-- <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-6 total-revenue">
          <div class="card">
            <div class="card-header flex w-full justify-between">
                <h5 class="m-0">Daftar Pengumuman</h5>
                <a class="btn btn-primary mb-3" href="{{route('admin.pengumuman.create')}}">Tambah Pengmuman</a>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>
                                        <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.pengumuman.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengumuman ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div> --}}
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2 profile-report">
          <div class="row">
            <div class="col-6 mb-6 payments">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                      <img src="../assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt4"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1">Jumlah Acara</p>
                  <h4 class="card-title mb-3">{{$jumlahAcara}} Acara</h4>
                  <small class="text-danger fw-medium"
                    ><a href="{{route('admin.acara.index')}}" class="text-cyan-600"><u>lihat data acara</u></a></small
                  >
                </div>
              </div>
            </div>
            <div class="col-6 mb-6 transactions">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                      <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt1"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="cardOpt1">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1">Jumlah Data <br> Peminjaman</p>
                  <h4 class="card-title mb-3">{{$jumlahPeminjaman}} Peminjaman</h4>
                  <small class="text-success fw-medium"
                    ><a href="{{route('admin.peminjaman.index')}}" class="text-cyan-600"><u>lihat data anggota</u></a></small
                  >
                </div>
              </div>
            </div>
            {{-- <div class="col-12 mb-6 profile-report">
              <div class="card h-100">
                <div class="card-body">
                  <div
                    class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10 flex-wrap">
                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                      <div class="card-title mb-6">
                        <h5 class="text-nowrap mb-1">Profile </h5>
                        <span class="badge bg-label-warning">YEAR 2022</span>
                      </div>
                      <div class="mt-sm-auto">
                        <span class="text-success text-nowrap fw-medium"
                          ><i class="icon-base bx bx-up-arrow-alt"></i> 68.2%</span
                        >
                        <h4 class="mb-0">$84,686k</h4>
                      </div>
                    </div>
                    <div id="profileReportChart"></div>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
@endsection
