<nav class="fixed top-0 w-full z-50 bg-white shadow-lg navbar-scroll" style="background-color: rgba(33, 33, 33, 0.95);">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2 hover:opacity-90 transition">
            <!-- Conference Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="I2COMSAPP Logo" class="h-10 w-auto drop-shadow-md">
            <span class="text-lg font-extrabold ml-2">
                <span style="color: #FFD700;">I2</span><span style="color: #FFFFFF;">COMSAPP</span>
            </span>
        </a>

        <!-- Desktop Navigation -->


        <div class="hidden lg:flex items-center justify-end flex-1 gap-1 ml-6">

    <a href="{{ route('home') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Home
    </a>

    <a href="{{ route('call_for_papers') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Important Dates
    </a>

    <a href="{{ route('committees') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Committees
    </a>

    <a href="{{ route('program') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Program
    </a>

    <a href="{{ route('registration') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Registration
    </a>

    <a href="{{ route('workshops') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Workshops
    </a>

    <a href="{{ route('exhibitions') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Exhibitions
    </a>

    <a href="{{ route('hotels') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Accommodation
    </a>

    <a href="{{ route('previous_editions') }}"
       class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl transition whitespace-nowrap">
        Previous Editions
    </a>

</div>
        {{-- <div class="hidden lg:flex gap-2 items-center">
            <a href="{{ route('home') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">Home</a>
            <a href="{{ route('call_for_papers') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">Important Dates</a>
            <a href="{{ route('committees') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">Committees</a>
            <a href="{{ route('program') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">Program</a>
            <a href="{{ route('registration') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">Registration</a>
            <a href="{{ route('workshops') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">orkshops</a>
            <a href="{{ route('exhibitions') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">Exhibitions</a>
            <a href="{{ route('hotels') }}"
               class="px-3 py-2 text-[15px] font-semibold text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition whitespace-nowrap">
                Accommodation
            </a>
            <a href="{{ route('previous_editions') }}" class="px-4 py-2 font-600 text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-lg transition">Previous editions</a>

        </div> --}}

        <!-- Mobile Menu Button -->
        <button class="lg:hidden text-white" onclick="toggleMenu()">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>

    <!-- Mobile Navigation (hidden by default) -->

    <div id="mobileMenu"
     class="hidden lg:hidden bg-gray-900 border-t border-gray-700">

    <div class="px-6 py-4 space-y-2">

        <a href="{{ route('home') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Home
        </a>

        <a href="{{ route('call_for_papers') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Important Dates
        </a>

        <a href="{{ route('committees') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Committees
        </a>

        <a href="{{ route('program') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Program
        </a>

        <a href="{{ route('registration') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Registration
        </a>

        <a href="{{ route('workshops') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Workshops
        </a>

        <a href="{{ route('exhibitions') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Exhibitions
        </a>

        <a href="{{ route('hotels') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Accommodation
        </a>

        <a href="{{ route('previous_editions') }}"
           class="block px-4 py-3 text-[15px] text-gray-200 hover:text-blue-300 hover:bg-white/10 rounded-xl font-semibold transition">
            Previous Editions
        </a>

    </div>

</div>
    {{-- <div id="mobileMenu" class="hidden lg:hidden bg-gray-900 border-t border-gray-700">
        <div class="px-6 py-4 space-y-2">
            <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-600">Home</a>
            <a href="{{ route('call_for_papers') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-600">Call for Papers</a>
            <a href="{{ route('committees') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-600">Committees</a>
            <a href="{{ route('program') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-600">Program</a>
            <a href="{{ route('registration') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-600">Registration</a>
             <a href="{{ route('workshops') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-semibold">Workshops</a>
            <a href="{{ route('exhibitions') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-600">Exhibitions</a>
             <a href="{{ route('hotels') }}"
                    class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-semibold">
                Accommodation
            </a>
            <a href="{{ route('previous_editions') }}" class="block px-4 py-2 text-gray-200 hover:bg-white/10 rounded-lg font-600">Previous editions</a>
        </div>
    </div> --}}
</nav>

<script>
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}

// Optional: Change navbar style on scroll
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('nav');
    if (window.scrollY > 50) {
        navbar.style.backgroundColor = 'rgba(33, 33, 33, 0.98)';
    } else {
        navbar.style.backgroundColor = 'rgba(33, 33, 33, 0.95)';
    }
});

</script>

<style>
    body {


        padding-top: 70px;
    }
</style>
