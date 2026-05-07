<footer class="bg-gradient-to-b from-gray-900 via-gray-900 to-black text-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Footer Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <!-- About -->
            <div>
                <h3 class="text-xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">I2COMSAPP 2026</h3>
                <p class="text-gray-400 text-sm leading-relaxed">A premier international conference on Artificial Intelligence and its practical applications in developing nations.</p>
                <div class="flex gap-4 mt-6">
                    <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-purple-600 transition font-bold">f</a>
                    <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-purple-600 transition font-bold">X</a>
                    <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-purple-600 transition font-bold">in</a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-6">Quick Links</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Home</a></li>
                    <li><a href="{{ route('call_for_papers') }}" class="hover:text-blue-400 transition">Call for Papers</a></li>
                    <li><a href="{{ route('registration') }}" class="hover:text-blue-400 transition">Registration</a></li>
                    <li><a href="{{ route('committees') }}" class="hover:text-blue-400 transition">Committees</a></li>
                    <li><a href="{{ route('program') }}" class="hover:text-blue-400 transition">Program</a></li>
                </ul>
            </div>

            <!-- Information -->
            <div>
                <h4 class="text-lg font-bold mb-6">Information</h4>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="#" class="hover:text-blue-400 transition">Keynote Speakers</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Accommodation</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Contact Us</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">FAQ</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-bold mb-6">Contact</h4>
                <div class="space-y-4 text-gray-400 text-sm">
                    <div>
                        <p class="font-semibold text-white">Email</p>
                        <a href="mailto:info@i2comsapp.org" class="hover:text-blue-400">info@i2comsapp.org</a>
                    </div>
                    <div>
                        <p class="font-semibold text-white">Location</p>
                        <p>Nouakchott, Mauritania</p>
                    </div>
                    <div>
                        <p class="font-semibold text-white">Dates</p>
                        <p>Dec 14-16, 2026</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-700 my-12"></div>

        <!-- Bottom Footer -->
        <div class="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
            <p>&copy; 2026 I2COMSAPP. All rights reserved. Organized by FST, Nouakchott University, Mauritania.</p>
            <div class="flex gap-6 mt-6 md:mt-0">
                {{-- <a href="#" class="hover:text-blue-400 transition">Privacy Policy</a>
                <a href="#" class="hover:text-blue-400 transition">Terms of Service</a> --}}
                {{-- <a href="#" class="hover:text-blue-400 transition">Designed By</a>
                 --}}
                 {{-- <p class="text-center text-sm text-gray-500 mt-6"> --}}
    Designed by
    <span class="font-semibold text-blue-600">
    <a href="https://reem-technology.com" target="_blank" class="text-blue-600 hover:underline">
        Reem Technology
    </a></span>
{{-- </p> --}}
            </div>
        </div>
    </div>
</footer>
