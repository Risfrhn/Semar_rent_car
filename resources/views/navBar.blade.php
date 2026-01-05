<nav class="bg-[#0B0B0B] fixed w-full z-20 top-0 start-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('Image/Semar.png')}}" class="h-16" alt="Flowbite Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-3 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">
                <li>
                    <a href="{{route('landing')}}" class="block py-2 px-3 text-[#F2ECDD] rounded transition-colors duration-200 hover:text-[#CD9C20] hover:bg-white md:border-0 md:px-3 md:py-1" aria-current="page">Halaman utama</a>
                </li>
                <li>
                    <a href="{{route('catalog')}}" class="block py-2 px-3 text-[#F2ECDD] rounded transition-colors duration-200 hover:text-[#CD9C20] hover:bg-white md:border-0 md:px-3 md:py-1">Katalog</a>
                </li>
                <li>
                    <a href="/tentang-kami" class="block py-2 px-3 text-[#F2ECDD] rounded transition-colors duration-200 hover:text-[#CD9C20] hover:bg-white md:border-0 md:px-3 md:py-1">Tentang</a>
                </li>
                <li>
                    <a href="{{route('blog')}}" class="block py-2 px-3 text-[#F2ECDD] rounded transition-colors duration-200 hover:text-[#CD9C20] hover:bg-white md:border-0 md:px-5 md:py-1">Blog</a>
                </li>
                <li>
                    <a href="{{route('promo')}}" class="block py-2 px-3 text-[#F2ECDD] rounded transition-colors duration-200 hover:text-[#CD9C20] hover:bg-white md:border-0 md:px-3 md:py-1">Promo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
