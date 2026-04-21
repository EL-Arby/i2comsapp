@extends('base')

@section('title', 'Sponsors & Partners')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-16 text-center">
            <h1 class="text-6xl font-black tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Our Sponsors & Partners</h1>
            <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">
                Thank you to our valued sponsors who make I2COMSAPP 2026 possible
            </p>
        </div>

        @if ($platinumSponsors->count() > 0)
        <!-- Platinum Sponsors -->
        <div class="mb-16">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-yellow-600">💎 Platinum Sponsors</h2>
                <p class="text-gray-600 mt-2">Our premier partners</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 bg-gradient-to-b from-yellow-50 to-white p-8 rounded-2xl border border-yellow-200">
                @include('pages.sponsor-cards', ['sponsors' => $platinumSponsors])
            </div>
        </div>
        @endif

        @if ($goldSponsors->count() > 0)
        <!-- Gold Sponsors -->
        <div class="mb-16">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">🏆 Gold Sponsors</h2>
                <p class="text-gray-600 mt-2">Key strategic partners</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 bg-gradient-to-b from-blue-50 to-white p-8 rounded-2xl border border-blue-200">
                @include('pages.sponsor-cards', ['sponsors' => $goldSponsors])
            </div>
        </div>
        @endif

        @if ($silverSponsors->count() > 0)
        <!-- Silver Sponsors -->
        <div class="mb-16">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">✨ Silver Sponsors</h2>
                <p class="text-gray-600 mt-2">Supporting organizations</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 bg-gradient-to-b from-gray-50 to-white p-8 rounded-2xl border border-gray-200">
                @include('pages.sponsor-cards', ['sponsors' => $silverSponsors])
            </div>
        </div>
        @endif

        @if ($bronzeSponsors->count() > 0)
        <!-- Bronze Sponsors -->
        <div class="mb-16">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-700">🤝 Bronze Partners</h2>
                <p class="text-gray-600 mt-2">Community supporters</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 bg-gradient-to-b from-orange-50 to-white p-8 rounded-2xl border border-orange-200">
                @include('pages.sponsor-cards', ['sponsors' => $bronzeSponsors])
            </div>
        </div>
        @endif

        <!-- Sponsorship Opportunities -->
        <div class="mt-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white p-12 rounded-2xl text-center">
            <h3 class="text-4xl font-bold mb-4">🎯 Sponsorship Opportunities</h3>
            <p class="text-blue-100 mb-8 text-lg max-w-2xl mx-auto">
                Interested in sponsoring I2COMSAPP 2026? Join our community of leading organizations shaping the future of AI in Africa.
            </p>
            <a href="mailto:sponsors@i2comsapp.org" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-xl font-bold hover:bg-gray-100 transition">
                📧 Become a Sponsor
            </a>
        </div>

        @if ($collaborators->count() > 0)
        <div class="mb-12 mt-16">
            <h2 class="text-3xl font-bold mb-6 text-blue-600">Collaborators</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @include('pages.sponsor-cards', ['sponsors' => $collaborators])
            </div>
        </div>
        @endif
    </div>
</main>
@endsection
