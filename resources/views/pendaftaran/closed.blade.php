<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ditutup</title>
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

    {{-- Main Content --}}
    <section class="container mx-auto p-8 flex flex-col items-center justify-center min-h-[60vh] text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">🚫 Pendaftaran Belum/Tidak Dibuka</h2>
        <p class="text-gray-600 text-lg">Silakan cek kembali pada tanggal yang telah ditentukan.</p>
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
