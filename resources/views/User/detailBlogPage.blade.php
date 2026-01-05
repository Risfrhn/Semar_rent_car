@include('header')
@include('navBar')
@section('title', $data->judul)
@section('meta_description', Str::limit(strip_tags($data->deskripsi1), 160))
@section('og_title', $data->judul)
@section('og_description', Str::limit(strip_tags($data->deskripsi1), 160))
@section('og_image', asset('storage/' . $data->gambar_utama))
@section('twitter_title', $data->judul)
@section('twitter_description', Str::limit(strip_tags($data->deskripsi1), 160))
@section('twitter_image', asset('storage/' . $data->gambar_utama))
<!-- Blog Content -->
    <main class="container mx-auto px-4 md:px-0 my-20">
        <!-- Breadcrumb -->
        <nav class="text-sm mb-6" aria-label="Breadcrumb">
            <ol class="list-reset flex text-white/50">
                <li><a href="{{ route('blog') }}" class="hover:text-yellow-400 transition">Blog</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-white">{{ $data->judul }}</li>
            </ol>
        </nav>

        <!-- Judul Blog -->
        <header class="mb-6 text-center" data-aos="fade-up">
            <span class="bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded">Blogs</span>
            <h1 class="text-white font-bold text-3xl md:text-4xl mt-3">{{ $data->judul }}</h1>
            <p class="text-white/70 mt-2 text-sm md:text-base">
                Dipublikasikan pada {{ \Carbon\Carbon::parse($data->tanggal_publish)->locale('id')->isoFormat('D MMMM YYYY') }}
            </p>
        </header>

        <!-- Gambar Utama -->
        <figure class="mb-8" data-aos="fade-in" data-aos-delay="300">
            <img src="{{ asset('storage/' . $data->gambar_utama) }}" 
                 alt="{{ $data->judul }}" 
                 class="w-full h-auto rounded-xl object-cover shadow-lg" 
                 loading="lazy">
        </figure>

        <!-- Konten Artikel -->
        <article class="max-w-4xl mx-auto my-10 text-white space-y-6" data-aos="fade-in" data-aos-delay="500">
            @if($data->subjudul1)<h2 class="text-2xl font-bold">{{ $data->subjudul1 }}</h2>@endif
            @if($data->deskripsi1)<p>{{ $data->deskripsi1 }}</p>@endif

            @if($data->gambar_pendukung)
                <figure class="mb-8">
                    <img src="{{ asset('storage/' . $data->gambar_pendukung) }}" 
                         alt="{{ $data->judul }} - gambar pendukung" 
                         class="w-full h-auto rounded-xl object-cover shadow-lg" 
                         loading="lazy">
                </figure>
            @endif

            @if($data->subjudul2)<h2 class="text-2xl font-bold">{{ $data->subjudul2 }}</h2>@endif
            @if($data->deskripsi2)<p>{{ $data->deskripsi2 }}</p>@endif

            @if($data->subjudul3)<h2 class="text-2xl font-bold">{{ $data->subjudul3 }}</h2>@endif
            @if($data->deskripsi3)<p>{{ $data->deskripsi3 }}</p>@endif
        </article>
    </main>

    <!-- Blog Lainnya -->
    <section class="container mx-auto px-4 md:px-0 my-10" data-aos="fade-right" data-aos-delay="500">
        <h3 class="text-yellow-400 font-bold text-2xl mb-4">Blog Lainnya</h3>
        <div class="snap-scroll flex gap-4 snap-x snap-mandatory py-6">
            @foreach($allData as $item)
                <a href="{{ route('blog-detail', $item->id) }}" class="flex-shrink-0 w-64 bg-gray-800 rounded-xl overflow-hidden shadow-lg group hover:scale-105 transition-transform duration-300 cursor-pointer" title="{{ $item->judul }}">
                    <img src="{{ asset('storage/' . $item->gambar_utama) }}" alt="{{ $item->judul }}" class="w-full h-32 object-cover" loading="lazy">
                    <div class="p-4">
                        <h4 class="text-white font-bold text-sm md:text-base">{{ $item->judul }}</h4>
                        <p class="text-white/50 text-xs mt-1">{{ \Carbon\Carbon::parse($item->tanggal_publish)->locale('id')->isoFormat('D MMMM YYYY') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

@include('footer')
