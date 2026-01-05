@include('header')
@include('navBar')

<main class="container mx-auto px-4 md:px-0 my-20">
    <!-- Judul Halaman -->
    <header class="text-center mb-12">
        <h1 class="text-yellow-400 font-bold text-3xl md:text-4xl" data-aos="fade-up">
            Blog Terbaru Semar Rent Car – Tips & Info Rental Mobil di Semarang
        </h1>
        <p class="text-white/70 mt-3 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="300">
            Temukan tips, berita, dan informasi menarik seputar <strong>rental mobil di Semarang</strong> bersama Semar Rent Car. Dapatkan panduan sewa mobil, rekomendasi perjalanan, dan update promo terbaru.
        </p>
    </header>

    <!-- Grid Blog -->
    <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6" aria-label="Daftar artikel terbaru" data-aos="fade-in" data-aos-delay="500">
        @if(!empty($dataPaginate) && $status == true)
            @foreach($dataPaginate as $blog)
                <article class="bg-gray-800 rounded-xl overflow-hidden shadow-lg group hover:scale-105 transition-transform duration-300 cursor-pointer"
                        itemscope itemtype="https://schema.org/BlogPosting">
                    
                    {{-- Gambar --}}
                    <figure class="relative">
                        <img src="{{ asset('storage/'.$blog->gambar_utama) }}" 
                            alt="{{ $blog->judul }} – Semar Rent Car" 
                            class="w-full h-48 object-cover"
                            loading="lazy"
                            itemprop="image">
                    </figure>

                    <div class="p-6 flex flex-col gap-2">
                        {{-- Judul --}}
                        <h2 class="text-white font-bold text-lg md:text-xl" itemprop="headline">{{ $blog->judul }}</h2>
                        
                        {{-- Deskripsi --}}
                        <p class="text-white/70 text-sm" itemprop="description">{{ $blog->deskripsi1 }}</p>

                        {{-- Tanggal Publish --}}
                        <time datetime="{{ $blog->tanggal_publish }}" class="text-white/50 text-xs mt-2" itemprop="datePublished">
                            {{ \Carbon\Carbon::parse($blog->tanggal_publish)->format('d M Y') }}
                        </time>

                        {{-- Read More --}}
                        <a href="{{ route('blog-detail', $blog->id) }}" 
                        class="text-center mt-3 py-2 rounded-full font-semibold border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-black transition-all duration-300"
                        itemprop="url">
                            Baca Selengkapnya
                        </a>
                    </div>
                </article>
            @endforeach
        @else
            <div class="flex items-center justify-center h-64 bg-[#1F1F1F] rounded-lg shadow col-span-full">
                <p class="text-gray-400 text-lg font-semibold">Tidak ada artikel yang tersedia</p>
            </div>
        @endif
    </section>

    <!-- Pagination -->
    @if($status == true)
        <section aria-label="Navigasi Halaman Katalog">
            <h2 class="sr-only">Pagination Katalog</h2>
            <div class="flex justify-center gap-3 flex-wrap my-10">
                <a href="{{ $dataPaginate->previousPageUrl() }}" 
                    class="px-4 py-2 rounded-full bg-gray-700 text-white text-sm {{ !$dataPaginate->onFirstPage() ? '' : 'opacity-40 cursor-not-allowed' }}">
                    Prev
                </a>
                <a href="{{ $dataPaginate->nextPageUrl() }}" 
                    class="px-4 py-2 rounded-full bg-yellow-500 text-black text-sm font-semibold {{ $dataPaginate->hasMorePages() ? '' : 'opacity-40 cursor-not-allowed' }}">
                    Next
                </a>
            </div>
        </section>
    @endif
</main>

@include('footer')
