@section('title', 'Promo Rental Mobil Semarang Terbaru | Semar Rent Car')

@section(
    'meta_description',
    'Dapatkan promo rental mobil Semarang terbaru dari Semar Rent Car. Diskon sewa mobil harian, mingguan, dan bulanan. Armada lengkap & terpercaya.'
)

@section('og_title', 'Promo Rental Mobil Semarang Terbaru | Semar Rent Car')
@section(
    'og_description',
    'Promo sewa mobil Semarang dari Semar Rent Car. Harga spesial untuk liburan, bisnis, dan kebutuhan keluarga.'
)
@section('og_image', asset('image/Semar.png'))
@section('og_type', 'website')

@section('twitter_title', 'Promo Rental Mobil Semarang | Semar Rent Car')
@section(
    'twitter_description',
    'Promo sewa mobil Semarang terbaru. Armada lengkap, harga spesial, dan layanan profesional.'
)
@section('twitter_image', asset('image/Semar.png'))

@include('header')
@include('navBar')

<main class="container mx-auto px-4 md:px-0 my-20" aria-labelledby="promo-title">

    <!-- HEADER -->
    <header class="text-center mb-12">
        <h1 id="promo-title" class="text-yellow-400 font-bold text-3xl md:text-4xl" data-aos="fade-up">
            Promo Rental Mobil Semarang
        </h1>
        <p class="text-white/70 mt-3 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="300">
            Nikmati berbagai <strong>promo sewa mobil di Semarang</strong> dari Semar Rent Car
            dengan harga spesial untuk liburan, perjalanan bisnis, dan acara keluarga.
        </p>
    </header>

    <!-- PROMO GRID -->
    <section class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6" aria-label="Daftar promo terbaru" data-aos="fade-in" data-aos-delay="400">
        @if(!empty($data) && $status == true)
            @foreach($data as $item)
                {{-- Card Promo --}}
                <article 
                    class="bg-gray-800 rounded-xl overflow-hidden shadow-lg group hover:scale-105 transition-transform duration-300 relative"
                    itemscope itemtype="https://schema.org/Offer"
                >
                    {{-- Expiry Date untuk SEO --}}
                    <meta itemprop="priceValidUntil" content="{{ $item->berlaku_hingga }}">

                    {{-- Badge Berlaku Hingga --}}
                    <div class="absolute top-2 left-2 bg-yellow-400 text-black text-xs font-bold px-2 py-1 rounded z-10">
                        Berlaku hingga {{ \Carbon\Carbon::parse($item->berlaku_hingga)->format('d M Y') }}
                    </div>

                    {{-- Gambar --}}
                    <img 
                        src="{{ asset('storage/'.$item->flyer) }}"
                        alt="Promo {{ $item->nama }} – Rental Mobil Semarang"
                        class="w-full h-48 object-cover"
                        loading="lazy"
                        itemprop="image"
                    >

                    {{-- Konten --}}
                    <div class="p-6 flex flex-col gap-2">
                        <h2 class="text-white font-bold text-xl" itemprop="name">{{ $item->nama }}</h2>
                        <p class="text-white/70 text-sm" itemprop="description">{{ $item->deskripsi }}</p>
                        <button
                            type="button"
                            data-id="{{ $item->id }}"
                            data-judul="{{ $item->nama }}"
                            onclick="openModal('modalSyarat{{$item->id}}', this)"
                            class="mt-3 py-2 rounded-full font-semibold border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black transition"
                        >
                            Gunakan voucher
                        </button>
                    </div>
                </article>
            @endforeach
        @else
            {{-- Pesan kosong --}}
            <div class="flex items-center justify-center h-64 bg-[#1F1F1F] rounded-lg shadow col-span-full">
                <p class="text-gray-400 text-lg font-semibold">Tidak ada promo yang tersedia</p>
            </div>
        @endif
    </section>

    @if(!empty($data) && $status == true)
        @foreach($data as $item)
            <div 
                id="modalSyarat{{$item->id}}"
                class="fixed inset-0 z-50 hidden bg-black/50 overflow-hidden items-center justify-center"
                role="dialog"
                aria-modal="true"
                aria-labelledby="modalTitle{{$item->id}}"
            >
                <!-- Modal Box -->
                <div class="bg-[#0B0B0B] rounded-xl w-full max-w-xl p-8 text-white relative max-h-[95vh] overflow-y-auto">
                    
                    <!-- Close -->
                    <button 
                        onclick="closeModal('modalSyarat{{$item->id}}')" 
                        class="absolute top-4 right-4 text-white/70 hover:text-white text-xl font-bold z-10"
                        aria-label="Tutup modal"
                    >
                        ✕
                    </button>

                    <!-- Konten Scrollable -->
                    <div class="space-y-4">
                        <img 
                            src="{{ asset('storage/'.$item->flyer) }}"
                            alt="Syarat promo {{ $item->nama }}"
                            class="w-full h-48 object-cover rounded-xl"
                        >

                        <h2 id="modalTitle{{$item->id}}" class="text-yellow-400 text-2xl font-bold">
                            {{ $item->nama }}
                        </h2>

                        <p class="text-white/90">{{ $item->deskripsi }}</p>

                        <div class="text-white/90 text-sm leading-relaxed">
                            {!! nl2br(e($item->syarat)) !!}
                        </div>

                        <h3 class="text-yellow-400 text-xl font-bold">Syarat dan Ketentuan Booking</h3>

                        <ul class="list-disc list-inside text-white/90 space-y-2">
                            <li>Usia minimal 21 tahun.</li>
                            <li>Membawa KTP dan SIM asli.</li>
                            <li>Deposit wajib sesuai harga sewa.</li>
                            <li>Mobil dikembalikan dalam kondisi baik dan tepat waktu.</li>
                            <li>Setiap kerusakan ditanggung sesuai perjanjian.</li>
                            <li>Lain-lain sesuai kesepakatan.</li>
                        </ul>

                        <div class="flex justify-end gap-3 pt-4">
                            <button
                                type="button"
                                onclick="closeModal('modalSyarat{{$item->id}}')"
                                class="px-4 py-2 rounded-full border border-yellow-500 text-yellow-400 hover:bg-yellow-500 hover:text-black"
                            >
                                Tutup
                            </button>

                            <button
                                type="button"
                                onclick="kirimWA()"
                                class="px-4 py-2 rounded-full bg-yellow-500 text-black font-semibold hover:bg-yellow-400"
                            >
                                Setuju & Lanjut Sewa
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <!-- Pagination -->
    @if($status == true)
        <section aria-label="Navigasi Halaman Katalog">
            <h2 class="sr-only">Pagination Katalog</h2>
            <div class="flex justify-center gap-3 flex-wrap my-10">
                <a href="{{ $data->previousPageUrl() }}" 
                    class="px-4 py-2 rounded-full bg-gray-700 text-white text-sm {{ !$data->onFirstPage() ? '' : 'opacity-40 cursor-not-allowed' }}">
                    Prev
                </a>
                <a href="{{ $data->nextPageUrl() }}" 
                    class="px-4 py-2 rounded-full bg-yellow-500 text-black text-sm font-semibold {{ $data->hasMorePages() ? '' : 'opacity-40 cursor-not-allowed' }}">
                    Next
                </a>
            </div>
        </section>
    @endif
</main>

<script>
    let judul = '';

    function openModal(id, el = null) {
        judul = el?.dataset?.judul ?? '';
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        modal.classList.add('flex'); 
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function kirimWA() {
        const nomorWA = "6281345765427";
        const pesan = `Halo Semar Rent Car, saya ingin menggunakan promo ${judul}`;
        const urlWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
        window.open(urlWA, "_blank");
    }
</script>

@include('footer')
