<div class="fixed bottom-6 right-6 z-50 flex flex-col items-end space-y-4">
    <div id="menu-options" class="flex flex-col items-end space-y-3 mb-4 opacity-0 scale-0 transform transition-all duration-300 origin-bottom-right">
        
        <a href="{{ route('dashboard-admin') }}" class="flex items-center gap-3 bg-gray-800 rounded-full px-4 py-2 shadow-lg hover:bg-yellow-500 transition-colors">
            <span class="text-white font-medium">Dashboard</span>
            <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-black">
                <i class="bi bi-house-fill"></i>
            </div>
        </a>

        <a href="{{ route('promo-admin') }}" class="flex items-center gap-3 bg-gray-800 rounded-full px-4 py-2 shadow-lg hover:bg-yellow-500 transition-colors">
            <span class="text-white font-medium">Promo</span>
            <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-black">
                <i class="bi bi-ticket"></i>
            </div>
        </a>

        <a href="{{ route('blog-admin') }}" class="flex items-center gap-3 bg-gray-800 rounded-full px-4 py-2 shadow-lg hover:bg-yellow-500 transition-colors">
            <span class="text-white font-medium">blog</span>
            <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-black">
                <i class="bi bi-file-earmark"></i>
            </div>
        </a>

        <a href="{{ route('catalog-admin') }}" class="flex items-center gap-3 bg-gray-800 rounded-full px-4 py-2 shadow-lg hover:bg-yellow-500 transition-colors">
            <span class="text-white font-medium">catalog</span>
            <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-black">
                <i class="bi bi-car-front-fill"></i>
            </div>
        </a>

        <form action="{{route('logOut')}}" method="post">
            @csrf
            <button type="submit" class="flex items-center gap-3 bg-gray-800 rounded-full px-4 py-2 shadow-lg hover:bg-yellow-500 transition-colors">
                <span class="text-white font-medium">Logout</span>
                <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-black">
                    <i class="bi bi-box-arrow-left"></i>
                </div>
            </button>
        </form>
    </div>


    <button id="menu-button" class="w-16 h-16 rounded-full bg-yellow-500 flex items-center justify-center text-black shadow-lg focus:outline-none transition-transform duration-300">
        <i id="menu-icon" class="bi bi-list text-2xl"></i>
    </button>
</div>

<script>
    const menuButton = document.getElementById('menu-button');
    const menuOptions = document.getElementById('menu-options');
    const menuIcon = document.getElementById('menu-icon');

    menuButton.addEventListener('click', () => {
        menuOptions.classList.toggle('opacity-0');
        menuOptions.classList.toggle('scale-0');
        menuOptions.classList.toggle('opacity-100');
        menuOptions.classList.toggle('scale-100');

        // toggle icon hamburger <-> close
        menuIcon.classList.toggle('bi-list');
        menuIcon.classList.toggle('bi-x');
    });

    // klik di luar untuk menutup menu
    document.addEventListener('click', (e) => {
        if (!menuButton.contains(e.target) && !menuOptions.contains(e.target)) {
            menuOptions.classList.add('opacity-0', 'scale-0');
            menuOptions.classList.remove('opacity-100', 'scale-100');
            menuIcon.classList.add('bi-list');
            menuIcon.classList.remove('bi-x');
        }
    });
</script>