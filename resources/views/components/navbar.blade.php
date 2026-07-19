<nav class="bg-white shadow-sm fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-brand-green">Desa Resapombo</a>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#1a5624] font-semibold border-b-2 border-[#1a5624] pb-1' : 'text-gray-500 hover:text-[#1a5624] font-medium transition' }}">Home</a>
                
                <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'text-[#1a5624] font-semibold border-b-2 border-[#1a5624] pb-1' : 'text-gray-500 hover:text-[#1a5624] font-medium transition' }}">Profil</a>
                
                <a href="{{ route('pemerintahan') }}" class="{{ request()->routeIs('pemerintahan') ? 'text-[#1a5624] font-semibold border-b-2 border-[#1a5624] pb-1' : 'text-gray-500 hover:text-[#1a5624] font-medium transition' }}">Pemerintahan</a>
                
                <a href="{{ route('potensi') }}" class="{{ request()->routeIs('potensi') ? 'text-[#1a5624] font-semibold border-b-2 border-[#1a5624] pb-1' : 'text-gray-500 hover:text-[#1a5624] font-medium transition' }}">Potensi</a>
                
                <a href="{{ route('bumdes') }}" class="{{ request()->routeIs('bumdes') ? 'text-[#1a5624] font-semibold border-b-2 border-[#1a5624] pb-1' : 'text-gray-500 hover:text-[#1a5624] font-medium transition' }}">BUMDes</a>
                <a href="#" class="text-gray-500 hover:text-[#1a5624] font-medium transition">Berita</a>
                <a href="#" class="text-gray-500 hover:text-[#1a5624] font-medium transition">FAQ</a>
            </div>

            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" class="text-gray-500 hover:text-[#1a5624] focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md {{ request()->is('/') ? 'text-brand-green font-semibold bg-green-50' : 'text-gray-500 hover:text-brand-green hover:bg-gray-50' }}">Home</a>
            
            <a href="{{ route('profil') }}" class="block px-3 py-2 rounded-md {{ request()->routeIs('profil') ? 'text-brand-green font-semibold bg-green-50' : 'text-gray-500 hover:text-brand-green hover:bg-gray-50' }}">Profil</a>
            
            <a href="{{ route('pemerintahan') }}" class="block px-3 py-2 rounded-md {{ request()->routeIs('struktur') ? 'text-brand-green font-semibold bg-green-50' : 'text-gray-500 hover:text-brand-green hover:bg-gray-50' }}">Pemerintahan</a>
            
            <a href="{{ route('potensi') }}" class="block px-3 py-2 rounded-md {{ request()->routeIs('potensi') ? 'text-brand-green font-semibold bg-green-50' : 'text-gray-500 hover:text-brand-green hover:bg-gray-50' }}">Potensi</a>

            <a href="{{ route('bumdes') }}" class="block px-3 py-2 rounded-md {{ request()->routeIs('bumdes') ? 'text-brand-green font-semibold bg-green-50' : 'text-gray-500 hover:text-brand-green hover:bg-gray-50' }}">BUMDes</a>

            <a href="{{ route('potensi') }}" class="block px-3 py-2 rounded-md {{ request()->routeIs('potensi') ? 'text-brand-green font-semibold bg-green-50' : 'text-gray-500 hover:text-brand-green hover:bg-gray-50' }}">Berita</a>

            <a href="{{ route('potensi') }}" class="block px-3 py-2 rounded-md {{ request()->routeIs('potensi') ? 'text-brand-green font-semibold bg-green-50' : 'text-gray-500 hover:text-brand-green hover:bg-gray-50' }}">FAQ</a>
        </div>
    </div>
</nav>

<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>