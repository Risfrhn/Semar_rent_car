@include('header')
@include('navBar')

@section('title', 'Armada Rental Mobil Semarang | Semar Rent Car')
@section('meta_description', 'Semar Rent Car menyediakan armada rental mobil di Semarang lengkap dan terawat, mulai dari city car, MPV, SUV, hingga Hiace/Elf dan bus untuk liburan, bisnis, maupun perjalanan rombongan.')
@section('og_title', 'Armada Rental Mobil Semarang | Semar Rent Car')
@section('og_description', 'Sewa mobil di Semar Rent Car: city car, MPV, SUV, Hiace, Elf, bus. Armada lengkap dan terawat, harga transparan, layanan profesional.')
@section('og_image', asset('image/Semar.png')) 
@section('twitter_title', 'Armada Rental Mobil Semarang | Semar Rent Car')
@section('twitter_description', 'Sewa mobil di Semar Rent Car: city car, MPV, SUV, Hiace, Elf, bus. Armada lengkap dan terawat, harga transparan, layanan profesional.')
@section('twitter_image', asset('image/Semar.png'))

<main class="container mx-auto px-3 md:px-5 my-20">

    <!-- Header & Judul -->
    <section aria-label="Header Armada Rental Mobil" class="text-center mb-8">
        <h1 class="text-yellow-400 font-bold text-3xl md:text-4xl leading-tight" data-aos="fade-up">
            Armada Rental Mobil di Semar Rent Car
        </h1>
        <p class="text-white/70 text-sm mt-3 max-w-2xl mx-auto leading-snug" data-aos="fade-up" data-aos-delay="300">
            Semar Rent Car menyediakan armada rental mobil di Semarang yang lengkap dan terawat, mulai dari city car, MPV keluarga, SUV, hingga Hiace, Elf, dan bus untuk kebutuhan liburan, bisnis, maupun perjalanan rombongan.
        </p>
    </section>

    <!-- Search & Filter -->
    <section aria-label="Search dan Filter Mobil" class="mb-6" data-aos="fade-in" data-aos-delay="400">
        <h2 class="sr-only">Cari dan Filter Armada</h2>
        <form method="GET" action="{{ route('catalog') }}">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
                <!-- Search -->
                <div class="flex flex-1 gap-2">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari mobil..."
                        class="flex-1 px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button class="px-4 py-2 bg-yellow-500 text-black font-semibold rounded hover:bg-yellow-400 transition">
                        Search
                    </button>
                </div>

                <!-- Filter -->
                <div class="flex flex-wrap md:flex-nowrap gap-2 mt-2 md:mt-0">
                    <select name="type" class="px-4 py-2 w-full rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <option value="">Filter Tipe</option>
                        <option value="Keluarga" {{ request('type') == 'Keluarga' ? 'selected' : '' }}>Keluarga</option>
                        <option value="SUV" {{ request('type') == 'SUV' ? 'selected' : '' }}>SUV</option>
                        <option value="Hiace/Elf" {{ request('type') == 'Hiace/Elf' ? 'selected' : '' }}>Hiace/Elf</option>
                        <option value="Mewah" {{ request('type') == 'Mewah' ? 'selected' : '' }}>Mewah</option>
                    </select>
                    <input type="number" name="harga_min" placeholder="Harga min" value="{{ request('harga_min') }}"
                        class="px-4 py-2 w-full rounded-lg bg-gray-700 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 w-32">
                    <input type="number" name="harga_max" placeholder="Harga max" value="{{ request('harga_max') }}"
                        class="px-4 py-2 w-full rounded-lg bg-gray-700 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-yellow-400 w-32">
                    <button class="px-4 py-2 w-full bg-yellow-500 text-black font-semibold rounded hover:bg-yellow-400 transition">
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </section>

    <!-- Grid Kartu Mobil -->
    <section aria-label="Katalog Armada Mobil" class="mb-10" data-aos="fade-in" data-aos-delay="500">
        <h2 class="sr-only">Daftar Armada Semar Rent Car</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($dataCatalog as $data)
                <article class="bg-gradient-to-b from-gray-700 to-gray-900 rounded-lg p-4 max-w-sm mx-auto" x-data="{ showMore: false }">
                    <div class="text-center p-2">
                        <img src="{{ asset('storage/' . $data->gambar) }}" class="w-full h-40 md:h-44 object-contain"
                             alt="Rental mobil {{$data->nama}} di Semarang - Semar Rent Car" loading="lazy">
                    </div>
                    <p class="text-yellow-400 font-bold mb-1 text-lg md:text-xl leading-tight">{{$data->nama}}</p>
                    <p class="text-white text-sm mb-0">Mulai dari</p>
                    <p class="text-yellow-400 font-bold mb-2 text-xl md:text-2xl leading-tight">{{$data->harga}}/hari</p>
                    
                    <div x-show="showMore" x-transition class="my-3 text-white text-sm space-y-2">
                        @foreach($data->fasilitas as $item)
                            <p>{{$item}}</p>
                            <hr>
                        @endforeach
                    </div>

                    <button @click="showMore = !showMore" class="w-full mt-3 py-2 rounded-full font-semibold border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black transition-all duration-300 text-sm md:text-base">
                        <span x-text="showMore ? 'Show less' : 'Show more'"></span>
                    </button>
                    <button data-nama-mobil="{{ $data->nama }}" onclick="openModal('modalSyarat', this)" class="w-full mt-3 py-2 rounded-full font-semibold border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black transition-all duration-300 text-sm md:text-base">
                        Pesan sekarang
                    </button>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Pagination -->
    <section aria-label="Navigasi Halaman Katalog">
        <h2 class="sr-only">Pagination Katalog</h2>
        <div class="flex justify-center gap-3 flex-wrap my-10">
            <a href="{{ $dataCatalog->previousPageUrl() }}" 
                class="px-4 py-2 rounded-full bg-gray-700 text-white text-sm {{ !$dataCatalog->onFirstPage() ? '' : 'opacity-40 cursor-not-allowed' }}">
                Prev
            </a>
            <a href="{{ $dataCatalog->nextPageUrl() }}" 
                class="px-4 py-2 rounded-full bg-yellow-500 text-black text-sm font-semibold {{ $dataCatalog->hasMorePages() ? '' : 'opacity-40 cursor-not-allowed' }}">
                Next
            </a>
        </div>
    </section>

</main>

<!-- Modal Syarat -->
<div id="modalSyarat" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden" role="dialog" aria-modal="true" aria-labelledby="modalSyaratTitle">
    <div class="bg-gray-900 text-white rounded-xl w-full max-w-lg p-6 relative shadow-lg">
        <!-- Close Button -->
        <button onclick="closeModal('modalSyarat')" class="absolute top-4 right-4 text-white/70 hover:text-white text-xl font-bold" aria-label="Tutup modal">
            ✕
        </button>

        <!-- Judul -->
        <h2 id="modalSyaratTitle" class="text-yellow-400 text-2xl font-bold mb-4">Syarat dan Ketentuan</h2>

        <!-- Konten scrollable -->
        <div class="max-h-64 overflow-y-auto pr-2 mb-6">
            <ul class="list-disc list-inside space-y-2 text-white/90">
                <li>Usia minimal 21 tahun.</li>
                <li>Membawa KTP dan SIM asli.</li>
                <li>Deposit wajib sesuai harga sewa.</li>
                <li>Mobil dikembalikan dalam kondisi baik dan tepat waktu.</li>
                <li>Setiap kerusakan ditanggung sesuai perjanjian.</li>
                <li>Lain-lain sesuai kesepakatan antara penyewa dan penyedia.</li>
            </ul>
        </div>

        <!-- Button aksi -->
        <div class="flex justify-end gap-3">
            <button onclick="closeModal('modalSyarat')"
                class="px-4 py-2 rounded-full font-semibold border border-yellow-500 text-yellow-400 hover:bg-yellow-500 hover:text-black transition">
                Tutup
            </button>

            <button onclick="kirimWA()"
                class="px-4 py-2 rounded-full bg-yellow-500 text-black font-semibold hover:bg-yellow-400 transition">
                Setuju & Lanjut Sewa
            </button>
        </div>
    </div>
</div>

<script>
    let namaMobil = '';
    function openModal(id, el = null) {
        if(el && el.dataset.namaMobil){
            namaMobil = el.dataset.namaMobil
        }else{
            namaMobil = ''
        }
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function kirimWA() {
        let pesan = namaMobil ? `Halo Semar Rent Car, saya ingin menyewa mobil ${namaMobil}` : `Halo Semar Rent Car, saya ingin menyewa mobil.`;
        const nomorWA = "6281345765427";
        const urlWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
        window.open(urlWA, "_blank");
        closeModal('modalSyarat');
    }
</script>

@include('footer')
