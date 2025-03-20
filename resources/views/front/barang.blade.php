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
    <nav class="bg-blue-600 font-poppins rounded-b-xl p-4">
        <div class="container px-20 mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-white text-xl font-bold"><img class="w-10 h-10" src="{{ asset('img/stdc.png') }}" alt=""></a>
            <button id="menu-btn" class="block md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <ul class="hidden md:flex space-x-6 text-white">
                <li><a href='{{ route('home') }}' class="hover:text-gray-300">Home</a></li>
                <li><a href='{{ route('home') }}'  class="hover:text-gray-300">Pengumuman</a></li>
                <li><a href='{{ route('absensi') }}'  class="hover:text-gray-300">Absensi</a></li>
                <li><a href='{{ route('barang') }}'  class="hover:text-gray-300">Barang</a></li>
                <li><a href='{{ route('login') }}'  class="hover:text-gray-300">Login</a></li>
            </ul>
        </div>
        <div id="mobile-menu" class="fixed top-0 right-0 h-full w-1/2 bg-blue-700 text-white transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col space-y-4 p-4 md:hidden">
            <button id="close-menu" class="self-end text-white text-2xl">&times;</button>
            <a href="#" class="block py-2">Home</a>
            <a href="#" class="block py-2">About</a>
            <a href="#" class="block py-2">Services</a>
            <a href="#" class="block py-2">Contact</a>
        </div>
    </nav>
    <section class="container font-poppins flex flex-col gap-10 mx-auto  h-max">
        <div class="container mx-auto p-6">
            <h2 class="text-center text-2xl font-semibold mb-6">📌 Data Inventaris Barang</h2>
            <div class="flex space-x-4 mb-4">
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">📌 Nama Barang</th>
                            <th class="py-3 px-4 text-center">📊 Jumlah</th>
                            <th class="py-3 px-4 text-center">📝 Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($inventarisBarangs as $barang)
                            <tr class="border-b hover:bg-gray-100">
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
        </div>
    </section>
    <script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
          // Function to initialize Embla with specific alignment
          const initializeEmbla = (alignment) => {
            const emblaNode = document.querySelector('#embla');
            return EmblaCarousel(emblaNode, {
              align: alignment,
              loop: true,
              slidesToScroll: 1,
              dragFree: true,
            });
          };
      
          // Initial Embla setup
          let embla = initializeEmbla(window.matchMedia('(max-width: 640px)').matches ? 'start' : 'center');
      
          // Listen for screen size changes
          const mediaQuery = window.matchMedia('(max-width: 640px)');
          mediaQuery.addEventListener('change', (event) => {
            const newAlignment = event.matches ? 'start' : 'center';
            embla.destroy(); // Destroy the existing instance
            embla = initializeEmbla(newAlignment); // Reinitialize with new alignment
          });
        });
      </script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            const popupModal = document.getElementById('popup-modal');
            const closePopup = document.getElementById('close-popup');
            const closeButton = document.getElementById('close-button');
    
            // Show the modal with animation
            popupModal.classList.remove('hidden');
            setTimeout(() => {
                popupModal.classList.add('opacity-100');
                popupModal.querySelector('div').classList.add('scale-100');
            }, 100);
    
            // Function to close modal
            function closeModal() {
                popupModal.classList.remove('opacity-100');
                popupModal.querySelector('div').classList.remove('scale-100');
                setTimeout(() => {
                    popupModal.classList.add('hidden');
                }, 300);
            }

            
            // Close the modal when buttons are clicked
            closePopup.addEventListener('click', closeModal);
            closeButton.addEventListener('click', closeModal);
            refreshButton.addEventListener('click', function () {
                location.reload(); // Reloads the current page
            });
        });
    </script>
    
    
</body>
{{-- </html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
</head>
<body>
    <h1>Data Absensi</h1>

    @foreach ($dataAbsensi as $daerah => $anggotaList)
        <button onclick="window.location.href='{{ route('absensi.pdf', $daerah) }}'">
            Cetak PDF Absensi {{ $daerah }}
        </button>
        
        <h2>Data Absensi - {{ $daerah }}</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Hadir</th>
                    <th>Tidak Hadir</th>
                    <th>Sakit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotaList as $anggota)
                    <tr>
                        <td>{{ $anggota->nama }}</td>
                        <td>{{ $anggota->absensi->sum('total_hadir') }}</td>
                        <td>{{ $anggota->absensi->sum('total_tidak_hadir') }}</td>
                        <td>{{ $anggota->absensi->sum('total_sakit') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html> --}}
