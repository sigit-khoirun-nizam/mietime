<!-- START: HEADER -->


<!-- END: HEADER -->

<nav class="bg-white border-gray-200">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-80">
                <div>
                    <!-- Website Logo -->
                    <a href="/" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-gray-600 text-lg">Mie Time</span>
                    </a>
                </div>
                <!-- Primary Navbar items -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/" class="py-4 px-2 {{ request()->is('/') ? 'text-red-600' : 'text-gray-600' }} hover:text-red-500 font-semibold ">Beranda</a>
                    <a href="{{ route('menu') }}" class="py-4 px-2 {{ request()->is('menu') ? 'text-red-600' : 'text-gray-600' }} font-semibold hover:text-red-500 transition duration-300">Menu</a>
                    <a href="{{ route('lokasi') }}" class="py-4 px-2 {{ request()->is('lokasi') ? 'text-red-600' : 'text-gray-600' }} font-semibold hover:text-red-500 transition duration-300">Lokasi</a>
                    <a href="{{ route('berita') }}" class="py-4 px-2 {{ request()->is('berita') ? 'text-red-600' : 'text-gray-600' }} font-semibold hover:text-red-500 transition duration-300">Berita</a>
                    <a href="{{ route('contact-show') }}" class="py-4 px-2 {{ request()->is('contact') ? 'text-red-600' : 'text-gray-600' }} font-semibold hover:text-red-500 transition duration-300">Kontak</a>
                    @auth
                    <a href="{{ route('testimoni-show') }}" class="py-4 px-2 {{ request()->is('testimoni') ? 'text-red-600' : 'text-gray-600' }} font-semibold">Testimoni</a>
                    <a href="{{ route('dashboard') }}" class="py-4 px-2 {{ request()->is('dashboard') ? 'text-red-600' : 'text-gray-600' }} font-semibold">Dashboard</a>
                    @endauth
                    <a id="header-cart"
                    class="flex items-center justify-center w-8 h-8 text-black {{ Route::current()->getName() == 'index' ? 'md:text-white' : 'md:text-black' }}"
                    href="{{ route('cart') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>

                </a>
                </div>
            </div>
            <!-- Secondary Navbar items -->
            <div class="hidden md:flex items-center space-x-3 ">
                @guest
                <a href="{{ route('login') }}" class="py-2 px-2 font-semibold text-gray-500 rounded hover:bg-red-500 hover:text-white transition duration-300">Log In</a>
                <a href="{{ route('register') }}" class="py-2 px-2 font-semibold text-white bg-red-500 rounded hover:bg-red-400 transition duration-300">Sign Up</a>
                @endguest
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                <svg class=" w-6 h-6 text-gray-500 hover:text-red-500 "
                    x-show="!showMenu"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            </div>
        </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li><a href="/" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Beranda</a></li>
            <li><a href="{{ route('menu') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Menu</a></li>
            <li><a href="{{ route('lokasi') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Lokasi</a></li>
            <li><a href="{{ route('berita') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Berita</a></li>
            <li><a href="{{ route('contact-show') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Kontak</a></li>
            @auth
                <li><a href="{{ route('testimoni-show') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Testimoni</a></li>
                <li><a href="{{ route('dashboard') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Dashboard</a></li>
            @endauth
            @guest
                <li><a href="{{ route('login') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Login</a></li>
                <li><a href="{{ route('register') }}" class="block text-sm px-4 py-4 text-white bg-red-500 font-semibold">Register</a></li>
            @endguest
        </ul>
    </div>
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</nav>
