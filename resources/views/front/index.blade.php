<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ST. Darma Cantih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/stdc.png') }}" />
    <style>
        *{
            scroll-behavior: smooth;
        }
    </style>

</head>
<body>
    <div id="popup-modal" class="fixed inset-0 flex z-[100] items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden transition-opacity duration-300">
        <div class="bg-white p-6 rounded-2xl shadow-2xl max-w-md w-full transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800">Pengumuman</h2>
                <button id="close-popup" class="text-gray-500 hover:text-gray-800 transition">
                    ✖
                </button>
            </div>
            <p class="mt-3 text-gray-600 leading-relaxed">
                {{ $pengumuman->first()?->deskripsi ?? 'Tidak ada pengumuman saat ini.' }}
            </p>
            <div class="mt-4 flex justify-end">
                <button id="close-button" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all">Tutup Pengumuman</button>
            </div>
        </div>
    </div>
    
    
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
        <section>
            <div class="w-full mt-10 flex h-[500px] items-center justify-between">
                <div class="flex-1 px-20 flex flex-col gap-2">
                    <h3 class="text-[22px] font-poppins font-semibold mb-[-10px]  ">SELAMAT DATANG</h3>
                    <h1 class="text-[30px] font-semibold ">ST. <SPAN class="italic">DHARMA CANTIH</SPAN></h1>
                    <p class="w-[80%] text-[16px]">ST. Dharma Cantih merupakan organisasi kemasyarakatan yang beranggotakan pemuda dan pemudi sebagai sarana pengembangan generasi muda untuk menumbuhkan kesadaran dan juga tanggung jawab sosial di Banjar Pande Pedungan.</p>
                    <a href="#lihat" ><div class="px-4 py-2 text-[13px] w-max flex justify-center items-center bg-blue-500 rounded-xl text-white">Lihat Selengkapnya</div></a>
                </div>
                <div class="flex-1 overflow-hidden flex  rounded-l-xl w-full h-full">
                    <img class="w-full h-full" src="{{ asset('img/IMG_9353.JPG') }}" alt="">
                </div>
            </div>
        </section>
        <section>
            <div class="w-full  flex h-[500px] relative items-center flex-row-reverse justify-between">
                <div class="flex-1 pl-20 flex flex-col pr-5 gap-2">
                    <h3 id="lihat" class="text-[30px] font-poppins font-semibold mb-[-15px]  ">SEJARAH</h3>
                    <h1  class="text-[30px] font-semibold ">ST. PUTRA KAHYANGAN</h1>
                    <p class="w-[80%] text-[16px]">Sekeha Teruna Dharma Cantih atau STDC merupakan sebuah organisasi kepemudaan yang berada di lingkungan Banjar Pande Pedungan. Dimana organisasi ini sudah berdiri dari tahun 1936 dan sekarang memiliki anggota sebanyak 156 anggota yang dibagi menjadi 3 tempekan yaitu: kaje kangin marga, kaja kauh marga, dan delot marga.</p>
                </div>
                <div class="flex-1 rounded-r-xl flex relative items-center  w-full h-full">
                    <div class="overflow-hidden w-full z-50 rounded-r-lg h-max" id="embla">
                        <div class="flex touch-pan-y">
                            <div class="flex-[0_0_80%] overflow-hidden  sm:flex-[0_0_70%] md:flex-[0_0_60%] lg:flex-[0_0_66%] h-[350px] pr-4">
                                <img class="w-full h-full object-cover" src="{{ asset('img/ke1.JPG') }}" alt="">
                            </div>
                            <div class="flex-[0_0_80%] overflow-hidden  sm:flex-[0_0_70%] md:flex-[0_0_60%] lg:flex-[0_0_66%] h-[350px] pr-4">
                                <img class="w-full h-full object-cover" src="{{ asset('img/ke5.JPG') }}" alt="">
                            </div>
                            <div class="flex-[0_0_80%] overflow-hidden  sm:flex-[0_0_70%] md:flex-[0_0_60%] lg:flex-[0_0_66%] h-[350px] pr-4">
                                <img class="w-full h-full object-cover" src="{{ asset('img/ke7.JPG') }}" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-[60%] absolute left-0 bg-blue-500 h-[450px] rounded-r-xl">

                    </div>
                </div>
            </div>
        </section>
        <section class="w-full px-6 md:px-20 py-16 ">
            <h1 class="text-[30px] font-semibold text-center mb-10">PENGURUS <br> ST DHARMA CANTIH</h1>
        
            <div class="flex flex-wrap justify-center gap-10">
                @foreach ([
                    ['name' => 'Aditya Prabawa', 'role' => 'Ketua', 'image' => asset('img/ketua.jpg'),],
                    ['name' => 'Toby', 'role' => 'Wakil Ketua', 'image' => asset('img/wakil.jpg')],
                    ['name' => 'Renaldi', 'role' => 'Sekretaris 1', 'image' => asset('img/sekretaris1.jpg')],
                    ['name' => 'Nadutami', 'role' => 'Sekretaris 2', 'image' => asset('img/sekretaris2.jpg')],
                    ['name' => 'Mangde', 'role' => 'Bendahara 1', 'image' => asset('img/bendahara1.jpg')],
                    ['name' => 'Ayu Cili', 'role' => 'Bendahara 2', 'image' => asset('img/bendahara2.jpg')],
                    ['name' => 'Pande Wahyu', 'role' => 'Kesinoman', 'image' => asset('img/WAHYU.png')]
                ] as $pengurus)
        
                <div class="w-[260px] bg-white shadow-lg rounded-xl p-6 text-center flex flex-col items-center transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <div class="w-32 h-32 rounded-full border-4 overflow-hidden border-blue-500 p-1 flex justify-center items-center">
                        <img src="{{ $pengurus['image'] }}" alt="{{ $pengurus['name'] }}" class="w-full h-full rounded-full object-cover">
                    </div>
                    
                    <h2 class="text-xl font-semibold text-gray-800 mt-4">{{ $pengurus['name'] }}</h2>
                    <p class="text-gray-600 mt-1 text-sm">{{ $pengurus['role'] }}</p>
                </div>
        
                @endforeach
            </div>
        </section>
        <section class="w-full px-6 md:px-20 py-16 bg-gradient-to-b from-blue-500 to-blue-700 text-white">
            <h1 class="text-[30px] font-semibold text-center mb-10 uppercase">📍 Lokasi Kami</h1>
        
            <div class="flex flex-col md:flex-row items-center justify-center gap-10">
                <!-- Informasi Lokasi -->
                <div class="text-center md:text-left bg-white p-6 rounded-lg shadow-lg text-gray-800 w-full md:w-1/3">
                    <h2 class="text-2xl font-bold text-blue-600">ST. DHARMA CANTIH</h2>
                    <p class="mt-2 text-gray-700">
                        Jl. Pulau Saelus No.80, Pedungan, Denpasar Selatan, Kota Denpasar, Bali 80114
                    </p>
                    <div class="flex items-center justify-center md:justify-start gap-2 mt-4 text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.13 2 5 5.13 5 9c0 1.89.69 3.63 1.83 5L12 22l5.17-8c1.14-1.37 1.83-3.11 1.83-5 0-3.87-3.13-7-7-7z" />
                        </svg>
                        <span>Denpasar, Bali</span>
                    </div>
                </div>
        
                <!-- Peta Lokasi -->
                <div class="w-full md:w-[500px] h-[300px] overflow-hidden rounded-lg shadow-xl hover:scale-105 transition-transform duration-300">
                    <iframe 
                        class="w-full h-full rounded-lg"
                        frameborder="0"
                        style="border:0"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.037808613028!2d115.20782831438623!3d-8.684436451646784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240dc3e457b1d%3A0x4f542538def80e2c!2sBanjar%20Pande%20Pedungan!5e0!3m2!1sid!2sid!4v1741684338565!5m2!1sid!2sid">
                    </iframe>
                </div>
            </div>
        </section>
        
        
        
        {{-- <section class="w-full px-6 md:px-20 py-16 ">
            <h1 class="text-[30px] font-semibold text-center mb-10 uppercase">Galeri Kegiatan</h1>
        
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ([
                    asset('img/IMG_9353.JPG'),
                    asset('img/ke1.jpeg'),
                    asset('img/ke2.jpeg'),
                    asset('img/ke3.jpeg'),
                    asset('img/ke4.jpeg'),
                    asset('img/ke5.jpeg'),
                    asset('img/ke6.jpeg'),
                    asset('img/ke7.jpeg'),
                ] as $image)
        
                <div class="relative group cursor-pointer" onclick="openModal('{{ $image }}')">
                    <img src="{{ $image }}" alt="Kegiatan" class="w-full h-[220px] object-cover rounded-lg shadow-md transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center rounded-lg">
                        <span class="text-white text-lg font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">Lihat Foto</span>
                    </div>
                </div>
        
                @endforeach
            </div>
        
            <!-- Lightbox Modal -->
            <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 hidden transition-opacity duration-300">
                <div class="relative p-4 max-w-[90vw] max-h-[80vh]">
                    <img id="modalImage" class="w-full max-h-[80vh] object-contain rounded-lg shadow-xl">
                    <button class="absolute top-2 right-2 text-white text-2xl font-bold bg-gray-800 rounded-full px-3 py-1 hover:bg-red-600 transition-colors" onclick="closeModal()">✖</button>
                </div>
            </div>
        </section> --}}
        
        {{-- <section>
            <div class="w-full text-white text-[20px] bg-blue-700 min-h-[200px] flex gap-5 items-center justify-center">
                <div class="w-[80%] flex items-center gap-5 justify-center h-max">
                    <div class="w-[50%] h-[150px] flex justify-end gap-5">
                        <div class="w-[200px] h-[150px] bg-black"></div>
                        <div class="bg-white w-[2px] rounded-full h-full"></div>
                    </div>
                    <div class="w-[50%]">
                        <h3 class="font-medium text-[18px]">Pengumuman</h3>
                        <p class="text-[16px]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat tempora reprehenderit mollitia aliquam aperiam pariatur saepe consequatur ratione ea maxime, voluptate ullam neque odio iste doloribus vitae deserunt quis libero!</p>
                    </div>
                </div>
                
            </div>
    </section> --}}
    {{-- <footer class="w-full bg-blue-800 text-white py-10">
        <div class="container mx-auto px-6 md:px-20">
            <div class="flex flex-col md:flex-row justify-between gap-8">
                <!-- Logo & Deskripsi -->
                <div class="w-full md:w-1/3">
                    <h2 class="text-2xl font-bold">BTW Academy</h2>
                    <p class="mt-3 text-gray-300">
                        BTW Academy adalah lembaga pelatihan terbaik yang berfokus pada persiapan tes akademik dan kedinasan.
                    </p>
                </div>
    
                <!-- Navigasi -->
                <div class="w-full md:w-1/3">
                    <h3 class="text-lg font-semibold mb-3">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-gray-300 transition">Beranda</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Galeri</a></li>
                        <li><a href="#" class="hover:text-gray-300 transition">Kontak</a></li>
                    </ul>
                </div>
    
                <!-- Sosial Media -->
                <div class="w-full md:w-1/3">
                    <h3 class="text-lg font-semibold mb-3">Ikuti Kami</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-600 rounded-full hover:bg-blue-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="none">
                                <path d="M22,12A10,10,0,1,0,12,22V14H10v-2h2V9.5a3,3,0,0,1,3-3h2V9H15c-.5,0-1,.5-1,1V12h3l-.5,2H14v8A10,10,0,0,0,22,12Z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-600 rounded-full hover:bg-blue-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="none">
                                <path d="M22,5.1c-.8.4-1.7.6-2.6.7a4.6,4.6,0,0,0,2-2.5,9.1,9.1,0,0,1-3,1.2,4.6,4.6,0,0,0-7.9,4.2A13,13,0,0,1,2,4.5,4.6,4.6,0,0,0,3.4,10a4.6,4.6,0,0,1-2.1-.6v.1a4.6,4.6,0,0,0,3.7,4.5,4.5,4.5,0,0,1-2.1.1,4.6,4.6,0,0,0,4.3,3.2,9.2,9.2,0,0,1-5.7,2A8.9,8.9,0,0,1,0,19.5a13,13,0,0,0,7,2"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-600 rounded-full hover:bg-blue-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="none">
                                <path d="M22 2H2v20h20V2zM10 18H6V8h4v10zm-2-12c-1 0-2-1-2-2s1-2 2-2 2 1 2 2-1 2-2 2zm10 12h-4V12c0-2-2-2-2 0v6h-4V8h4v2c2-3 6-2 6 2v6z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
    
            <div class="border-t border-gray-700 mt-8 pt-4 text-center text-gray-300">
                <p>© 2025 BTW Academy. All Rights Reserved.</p>
            </div>
        </div>
    </footer> --}}
    <footer class="w-full bg-blue-800 text-white py-6">
        <div class="container mx-auto flex flex-col items-center">
            <img class="w-10 h-10" src="{{ asset('img/stdc.png') }}" alt="">
            <p class="text-sm text-gray-300">© 2025 BTW Academy. All Rights Reserved.</p>
        </div>
    </footer>
    
    
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
    <script>
        function openModal(imageUrl) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modalImage').src = imageUrl;
            setTimeout(() => {
                document.getElementById('modal').classList.add('opacity-100');
            }, 50);
        }
    
        function closeModal() {
            document.getElementById('modal').classList.remove('opacity-100');
            setTimeout(() => {
                document.getElementById('modal').classList.add('hidden');
            }, 300);
        }
    </script>
    
</body>
</html>
