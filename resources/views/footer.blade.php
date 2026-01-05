        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
        <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,   // animasi cuma sekali
            offset: 120
        });
        </script>

        @verbatim
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    {
                        "@type": "Question",
                        "name": "Apa itu Semar Rent Car?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "Semar Rent Car adalah perusahaan jasa rental mobil di Semarang yang berdiri sejak 2008."
                        }
                    },
                    {
                        "@type": "Question",
                        "name": "Apakah Semar Rent Car menyediakan layanan lepas kunci?",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "Ya, tersedia sewa mobil lepas kunci dan dengan driver profesional."
                        }
                    }
                ]
            }
        </script>
        @endverbatim
        
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                // Semua container yang mau auto-scroll
                const containers = document.querySelectorAll('.autoScroll');

                containers.forEach(container => {
                    const cards = container.querySelectorAll('.snap-item');
                    if (!cards.length) return;

                    const gap = parseInt(getComputedStyle(container).gap) || 0;
                    const cardWidth = cards[0].offsetWidth + gap;

                    let index = 0;
                    setInterval(() => {
                        index++;
                        if (index >= cards.length) index = 0;

                        container.scrollTo({
                            left: index * cardWidth,
                            behavior: 'smooth'
                        });
                    }, 3000);
                });
            });
        </script>
        <footer class="w-full bg-gray-800/20 text-white py-10">
            <div class="max-w-7xl mx-auto px-4 md:px-10">
                <div class="flex flex-col lg:flex-row lg:justify-between gap-10 lg:gap-0">
                    <div class="lg:w-1/3 flex justify-center lg:justify-start">
                        <img src="{{ asset('image/Semar.png') }}" alt="Logo" class="max-w-[150px] h-auto">
                    </div>
                    <div class="lg:w-1/3 flex flex-col items-center lg:items-start">
                        <p class="font-semibold mb-2">Social Media Kami</p>
                        <div class="flex flex-col gap-2 text-sm">
                        <a href="https://wa.link/" target="_blank" class="flex items-center gap-2 text-gray-200 hover:text-yellow-400 transition">
                            <i class="bi bi-whatsapp"></i> Whatsapp
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="flex items-center gap-2 text-gray-200 hover:text-yellow-400 transition">
                            <i class="bi bi-instagram"></i> Instagram
                        </a>
                        <a href="mailto:SemarentCar@gmail.com" class="flex items-center gap-2 text-gray-200 hover:text-yellow-400 transition">
                            <i class="bi bi-envelope-at-fill"></i> SemarentCar@gmail.com
                        </a>
                        </div>
                    </div>
                    <div class="lg:w-1/3 flex justify-center lg:justify-start">
                        <p class="italic text-center lg:text-left text-sm">
                        "Semar Rent Car adalah penyedia jasa rental mobil di Semarang yang melayani
                        sewa mobil lepas kunci dan dengan driver untuk kebutuhan bisnis, wisata,
                        dan keluarga sejak 2008."
                        </p>
                    </div>
                </div>
                
                <!-- Bottom Row -->
                <div class="mt-8 flex flex-col sm:flex-row justify-between items-center text-sm gap-4">
                    <div class="flex items-center gap-2">
                        <i class="bi bi-c-circle"></i>
                        <span>Semar Rent Car</span>
                    </div>
                    <p class="italic text-xs text-center sm:text-right">
                        Layanan jasa penyewaan<br>mobil.
                    </p>
                </div>
            </div>
        </footer>
    </body> 
</html>