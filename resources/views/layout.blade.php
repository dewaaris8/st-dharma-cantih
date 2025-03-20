<!doctype html>

<html lang="en" class="layout-menu-fixed layout-compact">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title', 'Default Title')</title> 
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/stdc.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>
<body>
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel CRUD</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('anggota.index') }}">Anggota</a>
                <a class="nav-link" href="{{ route('absensi.index') }}">Absensi</a>
                <a class="nav-link" href="{{ route('inventaris.index') }}">Inventaris</a>
                <a class="nav-link" href="{{ route('acara.index') }}">Inventaris</a>
            </div>
        </div>
    </nav> --}}

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                  <a href="{{route('dashboard')}}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                      
                    </span>
                    <div class="w-[50px] h-[50px]"><img src="{{asset('img/stdc.png')}}" alt=""></div>
                    <span class="app-brand-text demo menu-text fw-bold ms-2">STDC</span>
                  </a>
      
                  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
                  </a>
                </div>
      
                <div class="menu-divider mt-0"></div>
      
                <div class="menu-inner-shadow"></div>
      
                <ul class="menu-inner py-1">
                  <!-- Dashboards -->
                  <li class="menu-item">
                    <a href="{{route('dashboard')}}" class="menu-link ">
                      <div class="text-truncate" data-i18n="Layouts">Dashboard</div>
                    </a>
                  </li>
                  <li class="menu-item active open">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-home-smile"></i>
                      <div class="text-truncate" data-i18n="Dashboards">Pengumuman</div>
                      {{-- <span class="badge rounded-pill bg-danger ms-auto">5</span> --}}
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item active">
                        <a href="{{route('admin.pengumuman.index')}}" class="menu-link">
                          <div class="text-truncate" data-i18n="Analytics"> Data Pengumuman</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a
                          href="{{route('admin.pengumuman.create')}}"
                          class="menu-link"> 
                          <div class="text-truncate" data-i18n="CRM">Buat Pengumuman</div>
                        </a>
                      </li>
                    </ul>
                  </li>
      
                  <!-- Layouts -->
                  
                  
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-layout"></i>
                      <div class="text-truncate" data-i18n="Layouts">Anggota</div>
                    </a>
      
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="{{route('admin.anggota.index')}}" class="menu-link">
                          <div class="text-truncate" data-i18n="Without menu">Data Anggota</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{route('admin.anggota.create')}}" class="menu-link">
                          <div class="text-truncate" data-i18n="Without navbar">Tambah Anggota</div>
                        </a>
                      </li>
                    </ul>
                  </li>
      
                  <!-- Front Pages -->
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-store"></i>
                      <div class="text-truncate" data-i18n="Front Pages">Inventaris Barang</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a
                          href="{{route('admin.inventaris.index')}}"
                          class="menu-link"
                          >
                          <div class="text-truncate" data-i18n="Landing">Data Inventaris Barang</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a
                          href="{{route('admin.inventaris.create')}}"
                          class="menu-link"
                          >
                          <div class="text-truncate" data-i18n="Pricing">Tambah Barang</div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-store"></i>
                      <div class="text-truncate" data-i18n="Front Pages">Acara & Absensi</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a
                          href="{{route('admin.acara.index')}}"
                          class="menu-link"
                          >
                          <div class="text-truncate" data-i18n="Landing">Data Acara & Absensi</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a
                          href="{{route('admin.acara.create')}}"
                          class="menu-link"
                          >
                          <div class="text-truncate" data-i18n="Pricing">Tambah Acara</div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-store"></i>
                      <div class="text-truncate" data-i18n="Front Pages">Peminjaman Barang</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a
                          href="{{route('admin.peminjaman.index')}}"
                          class="menu-link"
                          >
                          <div class="text-truncate" data-i18n="Landing">Data Peminjaman Barang</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a
                          href="{{route('admin.peminjaman.create')}}"
                          class="menu-link"
                          >
                          <div class="text-truncate" data-i18n="Pricing">Tambah Peminjaman Barang</div>
                        </a>
                      </li>
                    </ul>
                  </li>
      
                  <!-- Apps & Pages -->
                  <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Laporan</span>
                  </li>
                  <!-- Pages -->
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-dock-top"></i>
                      <div class="text-truncate" data-i18n="Account Settings">Cetak Laporan</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        <a href="{{ route('admin.absensi.pdf', 'Delod') }}" class="menu-link">
                              Cetak Absensi Anggota Delod
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('admin.absensi.pdf', 'Kaja Kangin') }}" class="menu-link">
                              Cetak Absensi Anggota Kaja Kangin
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('admin.absensi.pdf', 'Kaja Kauh') }}" class="menu-link">
                              Cetak Absensi Anggota Kaja Kauh
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('inventaris.pdf') }}" class="menu-link">
                              Cetak Inventaris Barang
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="{{ route('anggota.pdf') }}" class="menu-link">
                              Cetak Data Anggota
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Apps &amp; Pages</span>
                  </li>
                  <!-- Pages -->
                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-dock-top"></i>
                      <div class="text-truncate" data-i18n="Account Settings">Account Settings</div>
                    </a>
                    <ul class="menu-sub">
                      <li class="menu-item">
                        
                      </li>
                      <li class="menu-item">
                        <a href="" class="menu-link">
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                              <button type="submit">
                                  Log Out
                              </button>
                          </form>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
            </aside>
            <div class="layout-page">
                <nav
                    class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                        <i class="icon-base bx bx-menu icon-md"></i>
                    </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center me-auto">
                        {{-- <div class="nav-item d-flex align-items-center">
                        <span class="w-px-22 h-px-22"><i class="icon-base bx bx-search icon-md"></i></span>
                        <input
                            type="text"
                            class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
                            placeholder="Search..."
                            aria-label="Search..." />
                        </div> --}}
                        <h1>Welcome Admin!</h1>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                        <!-- Place this tag where you want the button to render. -->
                        {{-- <li class="nav-item lh-1 me-4">
                        <a
                            class="github-button"
                            href="https://github.com/themeselection/sneat-bootstrap-html-admin-template-free"
                            data-icon="octicon-star"
                            data-size="large"
                            data-show-count="true"
                            aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                            >Star</a
                        >
                        </li> --}}

                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        {{-- <a
                            class="nav-link dropdown-toggle hide-arrow p-0"
                            href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a> --}}
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">John Doe</h6>
                                    <small class="text-body-secondary">Admin</small>
                                </div>
                                </div>
                            </a>
                            </li>
                            <li>
                            <div class="dropdown-divider my-1"></div>
                            </li>
                            <li>
                            <a class="dropdown-item" href="#">
                                <i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span>
                            </a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="#">
                                <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span>
                            </a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="#">
                                <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 icon-base bx bx-credit-card icon-md me-3"></i
                                ><span class="flex-grow-1 align-middle">Billing Plan</span>
                                <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                                </span>
                            </a>
                            </li>
                            <li>
                            <div class="dropdown-divider my-1"></div>
                            </li>
                            <li>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Log Out</span>
                            </a>
                            </li>
                        </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                    </div>
                </nav>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                </div>    
            </div>
        </div>        
    </div>            
    {{-- <div class="container mt-4">
        @yield('content')
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
