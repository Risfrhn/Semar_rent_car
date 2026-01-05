@include('header')
@include('navBar')

@section('title', 'Tentang Semar Rent Car')
@section('meta_description', 'Semar Rent Car adalah jasa rental mobil terpercaya di Semarang sejak 2008. Lepas kunci atau dengan driver profesional.')
@section('og_title', 'Tentang Semar Rent Car | Semar Rent Car')
@section('og_description', 'Semar Rent Car adalah jasa rental mobil terpercaya di Semarang. Armada lengkap dan harga transparan.')
@section('og_image', asset('image/Semar.png'))
@section('twitter_title', 'Tentang Semar Rent Car | Semar Rent Car')
@section('twitter_description', 'Semar Rent Car adalah jasa rental mobil terpercaya di Semarang. Armada lengkap dan harga transparan.')
@section('twitter_image', asset('image/Semar.png'))

<main class="container mx-auto my-20">

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row gap-4 " aria-label="Tentang Semar Rent Car">
        <div class="flex-none md:w-1/3 p-4" data-aos="fade-up">
            <h1 class="text-white font-bold text-5xl md:text-3xl leading-tight">
                Percayakan Perjalanan Anda Bersama <span class="text-[#CD9C20]">Semar Rent Car</span>
            </h1>
        </div>
        <div class="flex-1 text-white p-4" data-aos="fade-up" data-aos-delay="300">
            <p class="text-sm sm:text-base leading-relaxed">
                Semar Rent Car adalah perusahaan <strong>jasa rental mobil di Semarang</strong> yang menyediakan berbagai pilihan mobil dan motor untuk kebutuhan perjalanan Anda.
                Kami melayani <strong>sewa mobil lepas kunci</strong> maupun <strong>dengan driver profesional</strong>. Berdiri sejak tahun <strong>2008</strong>, Semar Rent Car
                telah berpengalaman melayani kebutuhan transportasi untuk liburan, bisnis, dan perjalanan keluarga dengan aman dan nyaman.
            </p>
        </div>
    </section>

    <!-- Catalog / Slider Section -->
    <section id="catalog" class="autoScroll snap-scroll flex gap-4 overflow-x-auto snap-x snap-mandatory py-6 mx-4" aria-label="Armada mobil Semar Rent Car" data-aos="fade-right" data-aos-delay="500">
        @foreach(range(1,5) as $i) <!-- Ganti dengan loop data asli -->
        <article class="snap-item group relative flex-shrink-0 w-72 sm:w-80 md:w-64 lg:w-72 h-96 rounded-lg overflow-hidden cursor-pointer shadow-lg transition-transform duration-300 hover:scale-105 snap-start">
            <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=400&h=600&fit=crop" 
                 alt="Mobil {{ $i }} - Toyota Fortuner dari Semar Rent Car" 
                 class="w-full h-full object-cover">
            
            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black via-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                <h2 class="text-white text-xl font-bold mb-2">
                    Toyota Fortuner
                </h2>
                <p class="text-white text-sm">Sewa mobil premium dengan driver profesional atau lepas kunci.</p>
            </div>
        </article>
        @endforeach
    </section>

    <!-- Contact Section -->
    <section class="container mx-auto px-4 md:px-0 mb-20" aria-label="Kontak Semar Rent Car" data-aos="fade-in" data-aos-delay="300">
        <div class="text-center mb-12">
            <h2 class="text-yellow-400 font-bold text-3xl md:text-4xl">Kontak Semar Rent Car</h2>
            <p class="text-white/70 mt-3 max-w-2xl mx-auto">
                Butuh informasi seputar <strong>rental mobil di Semarang</strong> atau ingin
                melakukan pemesanan? Hubungi Semar Rent Car melalui formulir di bawah ini
                atau datang langsung ke lokasi kami.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <!-- Form Kontak -->
            <div class="bg-gray-800 rounded-xl p-8 shadow-lg flex flex-col gap-5" aria-label="Formulir Kontak">
                <div>
                    <label class="text-white font-semibold mb-1 block" for="name">Nama</label>
                    <input type="text" id="name" name="name" placeholder="Nama Anda"
                        class="w-full p-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>
                <div>
                    <label class="text-white font-semibold mb-1 block" for="type">Tipe pesan</label>
                    <select  id="feedbackType" name="type" class="w-full p-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-yellow-400 outline-none">
                        <option value="">Filter Tipe</option>
                        <option value="melakukan booking kendaraan di semar rent car">Booking</option>
                        <option value="melakukan kerja sama dengan semar rent car">Kerja sama</option>
                        <option value="memberikan kritik dan saran untuk semar rent car">Kritik dan saran</option>
                    </select>
                </div>
                <div>
                    <label class="text-white font-semibold mb-1 block" for="message">Pesan</label>
                    <textarea id="message" name="message" rows="5" placeholder="Tulis pesan Anda..."
                        class="w-full p-3 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-yellow-400 outline-none"></textarea>
                </div>
                <button type="button" onclick="openModal('modalSyarat')" class="bg-yellow-400 text-black font-bold py-3 rounded-lg hover:bg-yellow-500 transition-all">Kirim Pesan</button>
            </div>

            <!-- Info Kontak + Map -->
            <div class="flex flex-col gap-6">

                <!-- Alamat & Sosial Media -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <address class="bg-gray-800 rounded-xl p-6 shadow-lg not-italic">
                        <h3 class="text-yellow-400 font-bold text-xl mb-2">Alamat</h3>
                        <p class="text-white/70">Gedung Astagina AKPOL, Jl. Sultan Agung, Candi Baru, Gajahmungkur, Semarang, Jawa Tengah 50232</p>
                    </address>

                    <div class="bg-gray-800 rounded-xl p-6 shadow-lg">
                        <h3 class="text-yellow-400 font-bold text-xl mb-4">Sosial Media</h3>
                        <ul class="flex flex-col gap-3">
                            <li>
                                <a href="https://instagram.com" target="_blank" class="text-yellow-400 hover:text-yellow-500 transition">
                                    <i class="bi bi-instagram"></i> <span class="text-white/70">@semarrentcar</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/6285822972624" target="_blank" class="text-yellow-400 hover:text-yellow-500 transition">
                                    <i class="bi bi-whatsapp"></i> <span class="text-white/70">0858-2297-2624</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/6281325212803" target="_blank" class="text-yellow-400 hover:text-yellow-500 transition">
                                    <i class="bi bi-whatsapp"></i> <span class="text-white/70">0813-2521-2803</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9231985569554!2d110.41580959999999!3d-7.0183138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b829493ef03%3A0xfd34aa99e9e8efcd!2sSemar%20Rent%20Car%20-%20Rental%20mobil%20terpercaya%2C%20lengkap%20dan%20murah!5e0!3m2!1sid!2sid!4v1766898445377!5m2!1sid!2sid" 
                        class="w-full h-72 border-0" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade" 
                        title="Lokasi Semar Rent Car di Google Maps">
                    </iframe>
                </div>

            </div>
        </div>
    </section>
</main>

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
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function kirimWA() {
        const select = document.getElementById('feedbackType');
        const valueSelect = select.value;
        const nama = document.getElementById('name');
        const valueNama = nama.value
        const note = document.getElementById('message');
        const valueNote = note.value
        let pesan = `Halo Semar Rent Car, perkenalkan saya ${valueNama}\nSaya ingin ${valueSelect}\nCatatan: ${valueNote}`;
        const nomorWA = "6281345765427";
        const urlWA = `https://wa.me/${nomorWA}?text=${encodeURIComponent(pesan)}`;
        window.open(urlWA, "_blank");
        closeModal('modalSyarat');
    }
</script>

@include('footer')
