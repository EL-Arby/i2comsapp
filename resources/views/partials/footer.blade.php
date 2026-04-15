<footer class="bg-[#d6dcd3] w-full mt-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 px-12 py-16 w-full">
        <div>
            <div class="text-lg font-bold text-[#171d18] mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined">hub</span>
                I2COMSAPP
            </div>
            <p class="font-['Manrope'] text-sm tracking-wide text-[#171d18]/60 leading-relaxed">
                © 2026 I2COMSAPP. International Conference on Artificial Intelligence and its Practical Applications in the Age of Digital Transformation.
            </p>
        </div>

        <div class="grid grid-cols-2 gap-8">
            <div class="flex flex-col gap-4">
                <a class="text-[#171d18]/60 hover:text-[#0054cd] text-sm" href="{{ route('registration') }}">Contact Info</a>
                <a class="text-[#171d18]/60 hover:text-[#0054cd] text-sm" href="{{ route('committees') }}">FST Faculty</a>
                <a class="text-[#171d18]/60 hover:text-[#0054cd] text-sm" href="{{ route('program') }}">Sponsors</a>
            </div>
            <div class="flex flex-col gap-4">
                <a class="text-[#171d18]/60 hover:text-[#0054cd] text-sm" href="#">LinkedIn</a>
                <a class="text-[#171d18]/60 hover:text-[#0054cd] text-sm" href="#">X</a>
                <a class="text-[#171d18]/60 hover:text-[#0054cd] text-sm" href="#">Facebook</a>
            </div>
        </div>

        <div class="flex flex-col gap-4">
            <div class="text-sm font-bold uppercase tracking-widest text-[#008a45]">Newsletter</div>
            <p class="text-xs text-[#171d18]/60">Get conference updates and deadline reminders directly in your inbox.</p>
            <div class="flex gap-2">
                <input class="bg-surface-container border-none rounded-lg px-4 py-2 flex-grow text-sm" placeholder="Email Address" type="email"/>
                <button class="bg-primary text-on-primary px-4 py-2 rounded-lg text-xs font-bold uppercase">Join</button>
            </div>
        </div>
    </div>
</footer>
