<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/stdc.png') }}" />
</head>
<body>
    <nav class="bg-blue-600 font-poppins z-50 rounded-b-xl p-4">
        <div class="container px-20 mx-auto flex justify-between items-center">
            <div class="flex items-center gap-[20px]">
                <a href="{{ route('home') }}" class="text-white text-xl font-bold">
                    <img class="w-16 h-16" src="{{ asset('img/stdc.png') }}" alt="">
                </a>
                <h1 class="text-white text-xl font-bold">STDC</h1>
            </div>
            <button id="menu-btn" class="block md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
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
        <div id="mobile-menu" class="fixed top-0 right-0 h-full w-1/2 bg-blue-700 text-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col space-y-4 p-4 md:hidden">
            <button id="close-menu" class="self-end text-white text-2xl">&times;</button>
            <li><a href='{{ route('home') }}' class="hover:text-gray-300">Home</a></li>
                <li><a href='{{ route('pengumuman') }}'  class="hover:text-gray-300">Pengumuman</a></li>
                <li><a href='{{ route('absensi') }}'  class="hover:text-gray-300">Presensi</a></li>
                <li><a href='{{ route('barang') }}'  class="hover:text-gray-300">Inventaris</a></li>
                <li><a href='{{ route('login') }}'  class="hover:text-gray-300">Login</a></li>
        </div>
    </nav>

    <section class="container w-[95%] my-[50px] font-poppins flex flex-col gap-10 mx-auto h-max">
        <h2 class="text-center text-2xl font-semibold my-[0px]">📌 Data Inventaris Barang</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">📌 Nama Barang</th>
                        <th class="py-3 px-4 text-center">📊 Jumlah</th>
                        <th class="py-3 px-4 text-center">📝 Catatan</th>
                    </tr>
                </thead>
                <tbody id="barang-table-body" class="text-gray-700">
                    @foreach($inventarisBarangs as $barang)
                        <tr class="border-b hover:bg-gray-100 {{ $loop->index >= 5 ? 'hidden' : '' }}">
                            <td class="py-3 px-4">{{ $barang->nama_barang }}</td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-3 py-1 text-sm font-medium text-white bg-green-500 rounded-full">
                                    {{ $barang->jumlah }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">{{ $barang->catatan ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if(count($inventarisBarangs) > 5)
            <div class="text-center w-full my-4">
                <button id="load-more-barang"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Load More
                </button>
            </div>
        @endif
    </section>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn?.addEventListener('click', () => {
            mobileMenu.classList.remove('translate-x-full');
        });

        closeMenu?.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
        });

        // Load More Script
        document.addEventListener('DOMContentLoaded', () => {
            const loadMoreBtn = document.getElementById('load-more-barang');
            const rows = document.querySelectorAll('#barang-table-body tr.hidden');
            let currentIndex = 0;
            const chunkSize = 5;

            loadMoreBtn?.addEventListener('click', () => {
                for (let i = 0; i < chunkSize && currentIndex < rows.length; i++, currentIndex++) {
                    rows[currentIndex].classList.remove('hidden');
                }

                if (currentIndex >= rows.length) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
