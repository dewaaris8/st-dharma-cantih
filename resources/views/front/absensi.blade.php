<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/stdc.png') }}" />
</head>
<body>
    <nav class="bg-blue-600 font-poppins rounded-b-xl p-4">
        <div class="container px-20 mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-white text-xl font-bold">
                <img class="w-10 h-10" src="{{ asset('img/stdc.png') }}" alt="">
            </a>
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
             class="fixed top-0 right-0 h-full w-1/2 bg-blue-700 text-white transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col space-y-4 p-4 md:hidden">
            <button id="close-menu" class="self-end text-white text-2xl">&times;</button>
            <a href="#" class="block py-2">Home</a>
            <a href="#" class="block py-2">About</a>
            <a href="#" class="block py-2">Services</a>
            <a href="#" class="block py-2">Contact</a>
        </div>
    </nav>

    <section class="container font-poppins flex flex-col gap-10 mx-auto h-max">
        <div class="container mx-auto p-6">
            <h2 class="text-center text-2xl font-semibold mb-6">📌 Data Absensi Per Anggota</h2>

            @foreach($dataAbsensi as $daerah => $anggotaList)
                <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
                    <div class="px-6 py-3 text-white text-lg font-semibold
                        {{ $loop->iteration % 3 == 1 ? 'bg-blue-600' : ($loop->iteration % 3 == 2 ? 'bg-green-600' : 'bg-yellow-500 text-black') }}">
                        🗺️ Daerah: {{ $daerah }}
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">👤 Nama</th>
                                <th class="py-3 px-4 text-center">✅ Hadir</th>
                                <th class="py-3 px-4 text-center">❌ Tidak Hadir</th>
                                <th class="py-3 px-4 text-center">🤒 Sakit</th>
                            </tr>
                            </thead>
                            <tbody id="table-body-{{ $loop->index }}" class="text-gray-700">
                            @foreach($anggotaList as $index => $anggota)
                                <tr class="border-b hover:bg-gray-100 {{ $index >= 5 ? 'hidden' : '' }}">
                                    <td class="py-3 px-4">{{ $anggota->nama }}</td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="px-3 py-1 text-sm font-medium text-white bg-green-500 rounded-full">
                                            {{ $anggota->absensi->first()->total_hadir ?? 0 }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="px-3 py-1 text-sm font-medium text-white bg-red-500 rounded-full">
                                            {{ $anggota->absensi->first()->total_tidak_hadir ?? 0 }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="px-3 py-1 text-sm font-medium text-black bg-yellow-400 rounded-full">
                                            {{ $anggota->absensi->first()->total_sakit ?? 0 }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        @if(count($anggotaList) > 5)
                            <div class="text-center mt-4">
                                <button data-target="table-body-{{ $loop->index }}"
                                        class="load-more bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Load More
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
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

        // Load More functionality
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.load-more');
            const chunkSize = 5;

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const tbodyId = button.getAttribute('data-target');
                    const rows = document.querySelectorAll(`#${tbodyId} tr.hidden`);
                    for (let i = 0; i < chunkSize && i < rows.length; i++) {
                        rows[i].classList.remove('hidden');
                    }

                    // Hide button if no more hidden rows
                    if (document.querySelectorAll(`#${tbodyId} tr.hidden`).length === 0) {
                        button.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
