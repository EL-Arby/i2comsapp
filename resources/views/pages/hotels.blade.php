@extends('base')

@section('title', 'Accommodations')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">


    <div class="bg-gradient-to-br from-blue-50/80 via-purple-50/80 to-cyan-50/80 backdrop-blur-md rounded-[2rem] shadow-xl overflow-hidden p-10 text-gray-900 border border-blue-200">
                <div class="mb-8">
                    <h2 class="text-5xl font-headline font-black tracking-tight">Accommodation</h2>
                </div>
                <div class="text-base leading-8 text-slate-200 mb-10">
                    <p class="mb-4">For those coming from abroad, the organization committee has discussed promotional accommodation fees for the three hotels shown below. For more details, please contact conference organizers:</p>
                    <p class="text-blue-700 font-semibold mb-8">
                        Will appear here
                    </p>
                    {{-- <p class="mb-2">•  at: <a href="mailto:senhourry@yahoo.com" class="underline text-blue-600">senhourry@yahoo.com</a></p>
                    <p>• at: <a href="mailto:medmhdbennannu@gmail.com" class="underline text-blue-600">medmhdbennannu@gmail.com</a></p> --}}
                </div>

                <div class="grid gap-8 lg:grid-cols-3 text-slate-900">
                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-2xl text-center p-6">
                        <h3 class="font-bold text-2xl mb-4">Sunset Hotel</h3>
                        <img src="{{ asset('images/sunset-hotel.jpg') }}" alt="Sunset Hotel" class="mx-auto mb-4 rounded-3xl object-cover h-64 w-full">
                        <p class="text-lg font-semibold mb-3">Single room: 110 euros<br>Double room: 125 euros</p>
                        <a href="http://www.sunsethotel.mr/" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-600 font-semibold hover:text-blue-800">Hotel Website</a>
                    </div>
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl text-center p-6">
                        <h3 class="font-bold text-2xl mb-4">Nouakchott Hotel</h3>
                        <img src="{{ asset('images/nouakchott-hotel.jpg') }}" alt="Nouakchott Hotel" class="mx-auto mb-4 rounded-3xl object-cover h-64 w-full">
                        <p class="text-lg font-semibold mb-3">Single room: 109 euros<br>Double room: 136 euros</p>
                        <a href="http://www.nouakchotthotel.com/" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-600 font-semibold hover:text-blue-800">Hotel Website</a>
                    </div>
                    <div class="bg-white rounded-3xl overflow-hidden shadow-xl text-center p-6">
                        <h3 class="font-bold text-2xl mb-4">Fasq Hotel</h3>
                        <img src="{{ asset('images/fasq-hotel.jpg') }}" alt="Fasq Hotel" class="mx-auto mb-4 rounded-3xl object-cover h-64 w-full">
                        <p class="text-lg font-semibold mb-3">Single room: 225 euros</p>
                        <a href="http://www.fasqhotels.com/" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-600 font-semibold hover:text-blue-800">Hotel Website</a>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    {{-- <div class="max-w-6xl mx-auto">
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
        </div> --}}
    </div>
</main>
@endsection
