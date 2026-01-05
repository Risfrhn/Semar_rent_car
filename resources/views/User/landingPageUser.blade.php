@include('header')
@include('navBar')

@section('title', 'Rental Mobil Terpercaya di Semarang | Semar Rent Car')
@section('meta_description', 'Sewa mobil harian, mingguan, dan bulanan di Semar Rent Car. Armada lengkap, layanan lepas kunci atau dengan driver, aman dan nyaman sejak 2008.')
@section('og_title', 'Rental Mobil Terpercaya di Semarang | Semar Rent Car')
@section('og_description', 'Sewa mobil di Semar Rent Car: city car, MPV, SUV, Hiace/Elf, dan bus. Armada lengkap & terawat, harga transparan, layanan profesional.')
@section('og_image', asset('image/Semar.png'))
@section('twitter_title', 'Rental Mobil Terpercaya di Semarang | Semar Rent Car')
@section('twitter_description', 'Sewa mobil di Semar Rent Car: city car, MPV, SUV, Hiace/Elf, dan bus. Armada lengkap & terawat, harga transparan, layanan profesional.')
@section('twitter_image', asset('image/Semar.png'))

<main class="container mx-auto px-4 md:px-0 my-20">

    <!-- Hero Section -->
    <section aria-label="Banner Rental Mobil Semar Rent Car" class="text-center mb-10 relative">
        <h1 class="text-[#F2ECDD] font-bold text-3xl md:text-4xl leading-tight" data-aos="fade-up">
            Rental Mobil Terpercaya di Semarang – Semar Rent Car
        </h1>
        <p class="text-[#CD9C20] font-bold text-2xl mt-2" data-aos="fade-up" data-aos-delay="300">Nyaman, Aman, dan Profesional Sejak 2008</p>
        <p class="text-[#F2ECDD] opacity-50 text-sm mt-1" data-aos="fade-up" data-aos-delay="300">
            Layanan sewa mobil harian, mingguan, dan bulanan dengan armada terbaik di Semarang
        </p>

        <div class="flex justify-center my-3 gap-3 py-3 py-md-0" data-aos="fade-in" data-aos-delay="800">
            <button type="button" onclick="openModal('modalSyarat', this)" class="btn px-4 py-2 text-xs sm:px-3 sm:py-1 md:px-6 md:py-3 md:text-base rounded-full font-semibold bg-[#CD9C20] border border-2 border-[#CD9C20] text-[#282823] transition-all duration-300 hover:shadow-[0_0_25px_rgba(205,156,32,0.6)] hover:bg-transparent hover:text-[#CD9C20]">Sewa sekarang</button>
            <a href="{{route('catalog')}}" class="btn px-4 py-2 text-xs sm:px-3 sm:py-1 md:px-6 md:py-3 md:text-base rounded-full font-semibold border border-2 border-[#CD9C20] text-[#CD9C20] hover:bg-[#CD9C20] hover:text-[#282823] transition-all duration-300 hover:shadow-[0_0_25px_rgba(205,156,32,0.6)]">Lihat kendaraan</a>
        </div>

        <div class="flex flex-row items-center justify-center gap-3 mt-6" data-aos="fade-in" data-aos-delay="800">
            <img src="{{ asset('Image/Innova.png') }}" class="w-44 md:w-80 lg:w-[400px] xl:w-[600px] h-auto" alt="Rental mobil di Semarang - Semar Rent Car" loading="lazy">
            <img src="{{ asset('Image/Innova.png') }}" class="w-44 md:w-80 lg:w-[400px] xl:w-[600px] h-auto scale-x-[-1]" alt="Rental mobil di Semarang - Semar Rent Car" loading="lazy">
        </div>
        <div class="absolute top-60 w-full h-[100px] sm:h-[200px] xl:h-1/2 bg-[#CD9C20] blur-[60px] opacity-40 -z-10 rounded-t-[500px]"></div>
    </section>

    <!-- About / Kenapa Section -->
    <section aria-label="Tentang Semar Rent Car" class="my-20">
        <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
            <div class="lg:w-1/3 w-full">
                <h2 class="text-white font-bold text-3xl leading-snug" data-aos="fade-in">
                    Rental Mobil Semarang Terpercaya Sejak 2008 <span class="text-[#E9BE5F]">Semar Rent Car sejak 2008</span>
                </h2>
            </div>
            <div class="lg:w-2/3 w-full lg:pl-6">
                <p class="text-white text-sm sm:text-base lg:text-[15px] mb-6" data-aos="fade-right" data-aos-delay="300">
                    Semar Rent Car adalah perusahaan jasa persewaan mobil dan motor di Semarang yang telah
                    berdiri sejak tahun 2008. Kami menyediakan berbagai pilihan kendaraan dengan layanan
                    <strong>lepas kunci</strong> maupun <strong>dengan driver</strong>, cocok untuk kebutuhan
                    liburan, perjalanan bisnis, hingga acara keluarga.
                </p>
                <a href="{{route('catalog')}}" data-aos="fade-in" class="btn px-4 py-2 text-xs sm:px-3 sm:py-1 md:px-6 md:py-3 md:text-base rounded-full font-semibold border border-2 border-[#CD9C20] text-[#CD9C20] hover:bg-[#CD9C20] hover:text-[#282823] transition-all duration-300 hover:shadow-[0_0_25px_rgba(205,156,32,0.6)]">Lihat kendaraan</a>
            </div>
        </div>

        <!-- Kenapa Memilih Section -->
        <div class="flex flex-col lg:flex-row gap-6 mt-12" data-aos="fade-in">
            <div class="hidden md:block lg:w-1/3 w-1/2 mx-auto">
                <img src="{{asset('Image/whyChooseUse.png')}}"  class="w-full h-auto object-contain" alt="Kenapa Memilih Semar Rent Car" loading="lazy">
            </div>

            <div class="lg:w-2/3 w-full md:pl-6">
                <h2 class="text-white font-bold text-3xl mb-6">Kenapa Memilih <span class="text-[#E9BE5F]">Semar Rent Car?</span></h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <article class="flex items-start gap-3 py-2">
                        <div class="flex items-center justify-center w-12 h-12 rounded border flex-shrink-0 bg-[#CD9C20]">
                            <i class="bi bi-wallet-fill text-black text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-[#E9BE5F] font-bold text-sm mb-1">Harga Transparan & Terjangkau</h3>
                            <p class="text-white text-[0.8rem] leading-tight">
                                Kami menawarkan harga rental mobil di Semarang yang kompetitif tanpa biaya tersembunyi,
                                sesuai dengan kualitas kendaraan dan layanan yang diberikan.
                            </p>
                        </div>
                    </article>

                    <article class="flex items-start gap-3 py-2">
                        <div class="flex items-center justify-center w-12 h-12 rounded border flex-shrink-0 bg-[#CD9C20]">
                            <i class="bi bi-wallet-fill text-black text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-[#E9BE5F] font-bold text-sm mb-1">Pilihan Kendaraan Lengkap</h3>
                            <p class="text-white text-[0.8rem] leading-tight">
                                Tersedia berbagai jenis mobil dan motor, mulai dari city car, MPV keluarga,
                                hingga kendaraan untuk perjalanan wisata dan bisnis.
                            </p>
                        </div>
                    </article>

                    <article class="flex items-start gap-3 py-2">
                        <div class="flex items-center justify-center w-12 h-12 rounded border flex-shrink-0 bg-[#CD9C20]">
                            <i class="bi bi-wallet-fill text-black text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-[#E9BE5F] font-bold text-sm mb-1">Lepas Kunci & Dengan Driver</h3>
                            <p class="text-white text-[0.8rem] leading-tight">
                                Bebas memilih layanan sewa mobil lepas kunci atau dengan driver profesional
                                yang berpengalaman dan ramah
                            </p>
                        </div>
                    </article>

                    <article class="flex items-start gap-3 py-2">
                        <div class="flex items-center justify-center w-12 h-12 rounded border flex-shrink-0 bg-[#CD9C20]">
                            <i class="bi bi-wallet-fill text-black text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-[#E9BE5F] font-bold text-sm mb-1">Berpengalaman Sejak 2008</h3>
                            <p class="text-white text-[0.8rem] leading-tight">
                                Dengan pengalaman lebih dari 15 tahun, Semar Rent Car dipercaya
                                ribuan pelanggan sebagai solusi transportasi yang aman dan nyaman.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Armada Section -->
    <section aria-label="Armada Rental Mobil" class="my-20">
        <div class="text-center mb-6" data-aos="fade-up">
            <h2 class="text-yellow-400 font-bold text-4xl">Armada Rental Mobil di Semarang</h2>
            <p class="text-white/50 text-sm md:text-base mt-2 max-w-2xl mx-auto leading-snug">
                Semar Rent Car menyediakan armada rental mobil di Semarang yang lengkap dan terawat,
                mulai dari city car, MPV keluarga, SUV, hingga Hiace, Elf, dan bus untuk kebutuhan
                liburan, bisnis, maupun perjalanan rombongan.
            </p>
        </div>

        <div class="autoScroll snap-scroll overflow-x-auto flex gap-4 snap-x snap-mandatory px-4 py-6" data-aos="fade-in">
            @foreach($dataCatalog as $data)
            <article class="snap-item flex-shrink-0 w-full sm:w-full md:w-1/2 lg:w-1/4 bg-gradient-to-b from-gray-700 to-gray-900 rounded-lg p-4" x-data="{ showMore: false }">
                <div class="text-center p-2">
                    <img src="{{ asset('storage/' . $data->gambar) }}" class="w-full h-40 md:h-44 object-contain" alt="Rental mobil {{$data->nama}} di Semarang - Semar Rent Car" loading="lazy">
                </div>
                <p class="text-yellow-400 font-bold mb-1 text-lg md:text-xl leading-tight truncate">{{$data->nama}}</p>
                <p class="text-white text-sm mb-0">Mulai dari</p>
                <p class="text-yellow-400 font-bold mb-2 text-xl md:text-2xl leading-tight">
                     @if($data->harga == 0)
                        By Phone
                    @else
                        {{ $data->harga }}K/hari
                    @endif
                </p>
                
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

    <!-- FAQ Section -->
    <section aria-label="FAQ Semar Rent Car" class="my-20">
        <h2 class="text-4xl font-bold text-yellow-500 mb-6" data-aos="fade-in">Pertanyaan yang Sering Diajukan (FAQ)</h2>
        <div class="space-y-4" x-data="{ openIndex: null }" data-aos="fade-up">
            @foreach([1,2,3,4,5] as $i)
                <article class="border border-yellow-500 rounded-lg">
                    <button 
                        class="w-full text-left text-yellow-500 font-semibold p-4 flex justify-between items-center"
                        @click="openIndex === {{ $i }} ? openIndex = null : openIndex = {{ $i }}">
                        @switch($i)
                            @case(1) Apa itu Semar Rent Car? @break
                            @case(2) Apakah Semar Rent Car menyediakan layanan lepas kunci? @break
                            @case(3) Jenis kendaraan apa saja yang tersedia di Semar Rent Car? @break
                            @case(4) Apakah Semar Rent Car melayani perjalanan wisata? @break
                            @case(5) Bagaimana cara melakukan pemesanan di Semar Rent Car? @break
                        @endswitch
                        <svg :class="openIndex === {{ $i }} ? 'rotate-180' : ''" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openIndex === {{ $i }}" x-transition class="p-4 text-yellow-500 text-sm">
                        @switch($i)
                            @case(1) Semar Rent Car adalah perusahaan jasa rental mobil di Semarang yang telah beroperasi sejak tahun 2008. Kami menyediakan berbagai pilihan kendaraan mobil dan motor untuk kebutuhan liburan, bisnis, maupun acara keluarga. @break
                            @case(2) Ya, Semar Rent Car melayani sewa mobil lepas kunci maupun dengan driver profesional, sehingga pelanggan dapat memilih layanan sesuai kebutuhan dan kenyamanan perjalanan. @break
                            @case(3) Kami menyediakan armada lengkap mulai dari city car, MPV keluarga, SUV, hingga kendaraan untuk rombongan seperti Hiace, Elf, dan bus. @break
                            @case(4) Tentu. Semar Rent Car melayani rental mobil untuk wisata di Semarang dan sekitarnya, baik untuk perjalanan pribadi, keluarga, maupun rombongan. @break
                            @case(5) Pemesanan dapat dilakukan dengan mudah melalui WhatsApp, telepon, atau datang langsung ke lokasi. Tim kami siap membantu Anda memilih kendaraan terbaik. @break
                        @endswitch
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <!-- Lokasi / Maps -->
    <section id="kontak" aria-label="Lokasi Semar Rent Car" class="my-20" data-aos="fade-in">
        <h2 class="text-yellow-600 text-3xl md:text-4xl font-bold mb-2" data-aos="fade-right" data-aos-duration="800" data-aos-easing="ease-in-sine">Our Locations</h2>
        <div class="w-full border border-white mb-6"></div>
        <h3 class="text-white text-2xl md:text-3xl mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-sine">Semarang, Jawa Tengah</h3>
        <div class="w-full rounded-xl overflow-hidden border-4 border-yellow-600" data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-sine">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21799.108348126287!2d110.4170386920457!3d-7.016400539991404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b829493ef03%3A0xfd34aa99e9e8efcd!2sSemar%20Rent%20Car%20-%20Rental%20mobil%20terpercaya%2C%20lengkap%20dan%20murah!5e0!3m2!1sid!2sid!4v1767605367596!5m2!1sid!2sid" class="w-full h-[450px]" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Testimoni -->
    <section aria-label="Testimoni Pelanggan Semar Rent Car" class="container mx-auto px-4 md:px-20 my-12 py-12 bg-gray-800/10">
        <h2 class="text-white font-bold text-3xl md:text-5xl leading-tight mb-8 text-center">Pengalaman Pelanggan Menggunakan Jasa Rental Mobil di Semar Rent Car</h2>
        <div class="flex flex-col lg:flex-row gap-4">
            <div class="hidden lg:flex flex-col items-start justify-start w-48">
                <i class="bi bi-quote text-white/25 text-[100px] mb-2"></i>
                <p class="text-white/60 font-thin text-3xl">Apa yang dikatakan mereka</p>
            </div>

            <div class="flex-1 overflow-x-auto">
                <div class="snap-scroll autoScroll flex gap-4 snap-x snap-mandatory">
                    @forelse($reviews as $review)
                    <article class="snap-item flex-shrink-0 flex flex-col min-w-[335px] min-h-[250px] bg-gray-700 rounded-xl p-5">
                        <div class="mb-2">
                            <div class="flex gap-1 mb-2">
                                @for($i=0;$i<$review['rating'];$i++)
                                    <i class="bi bi-star-fill text-yellow-400"></i>
                                @endfor
                                @for($i=$review['rating']; $i<5; $i++)
                                    <i class="bi bi-star text-yellow-400"></i>
                                @endfor
                            </div>
                            <p class="text-white leading-snug w-[335px]">“{{ $review['text'] }}”</p>
                        </div>
                        <div class="flex items-center gap-2 mt-auto">
                            <img src="{{asset('Image/icon.jpg')}}" class="rounded-full w-10 h-10" alt="Profil {{ $review['author_name'] }}">
                            <div>
                                <p class="text-white font-bold mb-0">{{ $review['author_name'] }}</p>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="flex justify-center items-center min-h-[250px] w-full bg-gray-900 rounded-lg">
                        <p class="text-gray-400 font-semibold">Belum ada review pelanggan</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal Syarat -->
<div id="modalSyarat" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden" role="dialog" aria-modal="true" aria-labelledby="modalSyaratTitle">
    <div class="bg-gray-900 text-white rounded-xl w-full max-w-lg p-6 relative shadow-lg">
        <button onclick="closeModal('modalSyarat')" class="absolute top-4 right-4 text-white/70 hover:text-white text-xl font-bold" aria-label="Tutup modal">✕</button>
        <h2 id="modalSyaratTitle" class="text-yellow-400 text-2xl font-bold mb-4">Syarat dan Ketentuan</h2>
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
        <div class="flex justify-end gap-3">
            <button onclick="closeModal('modalSyarat')" class="px-4 py-2 rounded-full font-semibold border border-yellow-500 text-yellow-400 hover:bg-yellow-500 hover:text-black transition">Tutup</button>
            <button onclick="kirimWA()" class="px-4 py-2 rounded-full bg-yellow-500 text-black font-semibold hover:bg-yellow-400 transition">Setuju & Lanjut Sewa</button>
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
