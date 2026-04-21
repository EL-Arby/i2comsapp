@extends('base')

@section('title', 'Accommodations')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-16">
            <h1 class="text-6xl font-black tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Recommended Accommodations</h1>
            <p class="text-xl text-gray-600 font-medium">Special conference rates available at partner hotels</p>
        </div>

        <!-- Hotels Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse ($hotels as $hotel)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2 border border-gray-100">
                    @if ($hotel->image_url)
                        <img src="{{ asset($hotel->image_url) }}" alt="{{ $hotel->name }}" class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gradient-to-br from-blue-200 to-purple-200 flex items-center justify-center text-6xl">🏨</div>
                    @endif
                    
                    <div class="p-8">
                        <h3 class="text-3xl font-bold text-blue-900 mb-2">{{ $hotel->name }}</h3>
                        
                        @if ($hotel->address)
                            <p class="text-gray-600 mb-4 flex items-center gap-2">📍 {{ $hotel->address }}</p>
                        @endif
                        
                        @if ($hotel->description)
                            <p class="text-gray-700 mb-6 leading-relaxed">{{ $hotel->description }}</p>
                        @endif
                        
                        @if ($hotel->roomRates->count() > 0)
                            <div class="mb-6 pb-6 border-b border-gray-200">
                                <h4 class="font-bold text-blue-900 mb-4">🛏️ Special Conference Rates:</h4>
                                <div class="space-y-3">
                                    @foreach ($hotel->roomRates as $rate)
                                        <div class="flex justify-between items-center bg-gradient-to-r from-blue-50 to-purple-50 p-3 rounded-lg">
                                            <span class="text-gray-700 font-semibold">{{ $rate->room_type }}</span>
                                            <span class="font-bold text-purple-600 text-lg">{{ $rate->price }} {{ $rate->currency }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <div class="flex flex-col gap-3">
                            @if ($hotel->phone)
                                <a href="tel:{{ $hotel->phone }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center gap-2">
                                    📞 {{ $hotel->phone }}
                                </a>
                            @endif
                            
                            @if ($hotel->email)
                                <a href="mailto:{{ $hotel->email }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center gap-2">
                                    ✉️ {{ $hotel->email }}
                                </a>
                            @endif
                            
                            @if ($hotel->website)
                                <a href="{{ $hotel->website }}" target="_blank" rel="noopener noreferrer" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg font-bold text-center hover:shadow-lg transition">
                                    🌐 Visit Website
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <p class="text-2xl text-gray-400">🏨 Hotel information coming soon</p>
                </div>
            @endforelse
        </div>
    </div>
</main>
@endsection
