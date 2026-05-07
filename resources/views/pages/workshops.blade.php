@extends('base')

@section('title', 'Workshops')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-16">
            <h1 class="text-6xl font-black tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Hands-on Workshops</h1>
            <p class="text-xl text-gray-600 font-medium">Learn practical skills directly from AI experts</p>

        </div>

        <!-- Workshops List -->
        {{-- <div class="space-y-6">
            @forelse ($workshops as $workshop)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all border-l-4 border-blue-600 overflow-hidden hover:-translate-y-2">
                    <div class="p-8">
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <h3 class="text-3xl font-bold text-blue-900 flex-1">{{ $workshop->title }}</h3>
                            @if ($workshop->capacity)
                                <div class="bg-purple-100 text-purple-700 px-4 py-2 rounded-full font-bold text-sm whitespace-nowrap">
                                    👥 {{ $workshop->capacity }} seats
                                </div>
                            @endif
                        </div>

                        @if ($workshop->abstract)
                            <div class="mb-6 pb-6 border-b border-gray-200">
                                <h4 class="font-bold text-blue-900 mb-2">📝 What You'll Learn:</h4>
                                <p class="text-gray-700 leading-relaxed">{{ $workshop->abstract }}</p>
                            </div>
                        @endif

                        @if ($workshop->presenters)
                            <div class="mb-6 pb-6 border-b border-gray-200">
                                <h4 class="font-bold text-blue-900 mb-2">👨‍🏫 Presenters:</h4>
                                <p class="text-gray-700">{{ $workshop->presenters }}</p>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @if ($workshop->start_date)
                                <div class="flex items-center gap-3">
                                    <span class="text-2xl">📅</span>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase tracking-widest font-bold">Date & Time</p>
                                        <p class="text-gray-900 font-semibold">{{ $workshop->start_date->format('M d, Y • H:i') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if ($workshop->location)
                                <div class="flex items-center gap-3">
                                    <span class="text-2xl">📍</span>
                                    <div>
                                        <p class="text-xs text-gray-600 uppercase tracking-widest font-bold">Location</p>
                                        <p class="text-gray-900 font-semibold">{{ $workshop->location }}</p>
                                    </div>
                                </div>
                            @endif

                            <div>
                                <a href="{{ route('registration') }}" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-3 rounded-xl font-bold hover:shadow-lg transition-all text-center">
                                    Register Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16">
                    <p class="text-2xl text-gray-400">🛠️ Workshop schedule coming soon</p>
                </div>
            @endforelse
        </div>

        <!-- Workshop Benefits -->
        <div class="mt-20 grid md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl border border-blue-200">
                <h3 class="text-2xl font-bold text-blue-900 mb-4">💡 Learn</h3>
                <p class="text-gray-700">Gain hands-on experience with cutting-edge AI frameworks and tools</p>
            </div>
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl border border-purple-200">
                <h3 class="text-2xl font-bold text-purple-900 mb-4">🤝 Network</h3>
                <p class="text-gray-700">Connect with researchers and professionals in the AI field</p>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-8 rounded-2xl border border-cyan-300">
                <h3 class="text-2xl font-bold text-cyan-900 mb-4">📜 Certify</h3>
                <p class="text-gray-700">Receive certificates for completed workshops</p>
            </div>
        </div>
    </div> --}}

    <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-cyan-50 p-10 rounded-2xl border-2 border-blue-300 text-center">

    <h3 class="text-2xl font-bold text-blue-900 mb-4">
        🚧 Content Coming Soon
    </h3>

    <p class="text-gray-600 text-lg">
        Will appear soon...
    </p>

</div>

</main>
@endsection
