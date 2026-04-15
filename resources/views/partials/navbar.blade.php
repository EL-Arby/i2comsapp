<nav class="fixed top-0 w-full z-50 bg-[#f5fbf2]/70 backdrop-blur-md shadow-[0_20px_40px_rgba(0,138,69,0.06)] flex justify-between items-center px-8 py-4 max-w-full">
    <a href="{{ route('home') }}" class="text-2xl font-black text-[#008a45] tracking-tighter font-['Space_Grotesk'] flex items-center gap-2">
        <span class="material-symbols-outlined text-3xl">hub</span>
        I2COMSAPP
    </a>

    <div class="hidden md:flex gap-8 items-center">
        <a class="font-['Space_Grotesk'] font-bold uppercase tracking-tight hover:text-[#006768]" href="{{ route('home') }}">Home</a>
        <a class="font-['Space_Grotesk'] font-bold uppercase tracking-tight hover:text-[#006768]" href="{{ route('call_for_papers') }}">Call for Papers</a>
        <a class="font-['Space_Grotesk'] font-bold uppercase tracking-tight hover:text-[#006768]" href="{{ route('committees') }}">Committees</a>
        <a class="font-['Space_Grotesk'] font-bold uppercase tracking-tight hover:text-[#006768]" href="{{ route('program') }}">Program</a>
        <a class="font-['Space_Grotesk'] font-bold uppercase tracking-tight hover:text-[#006768]" href="{{ route('registration') }}">Registration</a>

        <a href="{{ route('call_for_papers') }}" class="bg-primary text-on-primary px-6 py-2 rounded-xl font-bold uppercase text-sm tracking-widest">
            Submit Abstract
        </a>
    </div>

    <div class="md:hidden">
        <span class="material-symbols-outlined text-[#008a45]">menu</span>
    </div>
</nav>
