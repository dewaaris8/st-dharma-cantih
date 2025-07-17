<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/stdc.png') }}" />
</head>
<body class="bg-gray-50 font-poppins">

    {{-- Navbar --}}
    <nav class="bg-blue-600 z-50 rounded-b-xl p-4">
        <div class="container px-20 mx-auto flex justify-between items-center">
            <div class="flex items-center gap-[20px]">
                <a href="{{ route('home') }}" class="text-white text-xl font-bold">
                    <img class="w-16 h-16" src="{{ asset('img/stdc.png') }}" alt="STDC">
                </a>
                <h1 class="text-white text-xl font-bold">STDC</h1>
            </div>
            <button id="menu-btn" class="block md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <ul class="hidden md:flex space-x-6 text-white">
                <li><a href='{{ route('home') }}' class="hover:text-gray-300">Home</a></li>
                <li><a href='{{ route('pengumuman') }}' class="hover:text-gray-300">Pengumuman</a></li>
                <li><a href='{{ route('absensi') }}' class="hover:text-gray-300">Presensi</a></li>
                <li><a href='{{ route('barang') }}' class="hover:text-gray-300">Inventaris</a></li>
                <li><a href='{{ route('login') }}' class="hover:text-gray-300">Login</a></li>
            </ul>
        </div>
        <div id="mobile-menu"
             class="fixed top-0 right-0 h-full w-1/2 bg-blue-700 text-white transform z-50 translate-x-full transition-transform duration-300 ease-in-out flex flex-col space-y-4 p-4 md:hidden">
            <button id="close-menu" class="self-end text-white text-2xl">&times;</button>
            <li><a href='{{ route('home') }}' class="hover:text-gray-300">Home</a></li>
            <li><a href='{{ route('pengumuman') }}' class="hover:text-gray-300">Pengumuman</a></li>
            <li><a href='{{ route('absensi') }}' class="hover:text-gray-300">Presensi</a></li>
            <li><a href='{{ route('barang') }}' class="hover:text-gray-300">Inventaris</a></li>
            <li><a href='{{ route('login') }}' class="hover:text-gray-300">Login</a></li>
        </div>
    </nav>

    {{-- Main Section --}}
    <section class="container mx-auto p-6">
        <h2 class="text-center text-2xl font-semibold text-blue-700 mb-6">📝 Pendaftaran Anggota Baru</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('pendaftaran.store') }}" class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="nama" required value="{{ old('nama') }}"
                       class="w-full mt-1 border px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                       class="w-full mt-1 border px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Telepon</label>
                <input type="text" name="telepon" required value="{{ old('telepon') }}"
                       class="w-full mt-1 border px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Alamat</label>
                <input type="text" name="alamat" required value="{{ old('alamat') }}"
                       class="w-full mt-1 border px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Nama Ibu</label>
                <input type="text" name="nama_ibu" required value="{{ old('nama_ibu') }}"
                       class="w-full mt-1 border px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Nama Ayah</label>
                <input type="text" name="nama_ayah" required value="{{ old('nama_ayah') }}"
                       class="w-full mt-1 border px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Daerah</label>
                <select name="daerah" required
                        class="w-full mt-1 border px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Daerah --</option>
                    <option value="Delod" {{ old('daerah') == 'Delod' ? 'selected' : '' }}>Delod</option>
                    <option value="Kaja Kangin" {{ old('daerah') == 'Kaja Kangin' ? 'selected' : '' }}>Kaja Kangin</option>
                    <option value="Kaja Kauh" {{ old('daerah') == 'Kaja Kauh' ? 'selected' : '' }}>Kaja Kauh</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition duration-200">
                    Daftar
                </button>
            </div>
        </form>
    </section>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
        });
    </script>
</body>
</html>
