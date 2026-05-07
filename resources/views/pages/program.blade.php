@extends('base')

@section('title', 'Program')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-16">
            <h1 class="text-6xl font-black tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Conference Program</h1>
            <p class="text-xl text-gray-600 font-medium">3 days of learning, networking, and innovation</p>
        </div>

        <div class="mb-12">
            <p>Will appear later ...</p>
            </div>

        <!-- Day 1 -->
        {{-- <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-2xl">1️⃣</div>
                <div>
                    <h2 class="text-4xl font-bold text-blue-900">Day 1: Opening & Keynotes</h2>
                    <p class="text-gray-600">December 23, 2026</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                    <p class="text-blue-600 font-bold text-sm">08:00 - 09:00</p>
                    <h3 class="text-xl font-bold text-blue-900 mt-2">Registration & Breakfast</h3>
                    <p class="text-gray-600 text-sm mt-2">Welcome desk opens, networking breakfast</p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-xl border border-blue-200">
                    <p class="text-blue-600 font-bold text-sm">09:30 - 10:15</p>
                    <h3 class="text-xl font-bold text-blue-900 mt-2">Opening Ceremony</h3>
                    <p class="text-gray-600 text-sm mt-2">Welcome remarks and conference overview</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                    <p class="text-purple-600 font-bold text-sm">10:30 - 11:30</p>
                    <h3 class="text-xl font-bold text-purple-900 mt-2">Keynote 1: AI in Africa</h3>
                    <p class="text-gray-600 text-sm mt-2">Leading expert on AI applications in developing economies</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-xl border border-purple-200">
                    <p class="text-purple-600 font-bold text-sm">12:00 - 13:30</p>
                    <h3 class="text-xl font-bold text-purple-900 mt-2">Networking Lunch</h3>
                    <p class="text-gray-600 text-sm mt-2">Connect with peers and research community</p>
                </div>
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-6 rounded-xl border border-cyan-300">
                    <p class="text-cyan-600 font-bold text-sm">14:00 - 15:30</p>
                    <h3 class="text-xl font-bold text-cyan-900 mt-2">Parallel Sessions A</h3>
                    <p class="text-gray-600 text-sm mt-2">Technical paper presentations - Stream 1</p>
                </div>
                <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-6 rounded-xl border border-cyan-300">
                    <p class="text-cyan-600 font-bold text-sm">16:00 - 17:30</p>
                    <h3 class="text-xl font-bold text-cyan-900 mt-2">Parallel Sessions B</h3>
                    <p class="text-gray-600 text-sm mt-2">Technical paper presentations - Stream 2</p>
                </div>
            </div>
        </div>

        <!-- Day 2 -->
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-purple-600 text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-2xl">2️⃣</div>
                <div>
                    <h2 class="text-4xl font-bold text-purple-900">Day 2: Research & Innovation</h2>
                    <p class="text-gray-600">December 24, 2026</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-200">
                    <p class="text-purple-600 font-bold text-sm">09:00 - 10:00</p>
                    <h3 class="text-xl font-bold text-purple-900 mt-2">Morning Keynote</h3>
                    <p class="text-gray-600 text-sm mt-2">Ethics and responsible AI development</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-200">
                    <p class="text-purple-600 font-bold text-sm">10:30 - 12:00</p>
                    <h3 class="text-xl font-bold text-purple-900 mt-2">Panel Discussion</h3>
                    <p class="text-gray-600 text-sm mt-2">Industry leaders discussing AI transformation</p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-200">
                    <p class="text-blue-600 font-bold text-sm">13:00 - 14:30</p>
                    <h3 class="text-xl font-bold text-blue-900 mt-2">Research Showcase</h3>
                    <p class="text-gray-600 text-sm mt-2">Poster presentations and demos</p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-200">
                    <p class="text-blue-600 font-bold text-sm">15:00 - 17:00</p>
                    <h3 class="text-xl font-bold text-blue-900 mt-2">Workshop Series</h3>
                    <p class="text-gray-600 text-sm mt-2">Hands-on training in AI tools and frameworks</p>
                </div>
            </div>
        </div>

        <!-- Day 3 -->
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-cyan-600 text-white rounded-full w-16 h-16 flex items-center justify-center font-bold text-2xl">3️⃣</div>
                <div>
                    <h2 class="text-4xl font-bold text-cyan-900">Day 3: Closing & Future</h2>
                    <p class="text-gray-600">December 25, 2026</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-gradient-to-br from-cyan-50 to-teal-50 p-6 rounded-xl border border-cyan-300">
                    <p class="text-cyan-600 font-bold text-sm">09:00 - 10:30</p>
                    <h3 class="text-xl font-bold text-cyan-900 mt-2">Advanced Workshops</h3>
                    <p class="text-gray-600 text-sm mt-2">Deep dive sessions on specialized topics</p>
                </div>
                <div class="bg-gradient-to-br from-cyan-50 to-teal-50 p-6 rounded-xl border border-cyan-300">
                    <p class="text-cyan-600 font-bold text-sm">11:00 - 12:00</p>
                    <h3 class="text-xl font-bold text-cyan-900 mt-2">Closing Keynote</h3>
                    <p class="text-gray-600 text-sm mt-2">Future of AI in developing nations</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-200">
                    <p class="text-green-600 font-bold text-sm">13:00 - 14:00</p>
                    <h3 class="text-xl font-bold text-green-900 mt-2">Awards Ceremony</h3>
                    <p class="text-gray-600 text-sm mt-2">Recognition of best papers and presentations</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-200">
                    <p class="text-green-600 font-bold text-sm">14:30 - 16:00</p>
                    <h3 class="text-xl font-bold text-green-900 mt-2">Gala Dinner & Closing</h3>
                    <p class="text-gray-600 text-sm mt-2">Celebration and networking event</p>
                </div>
            </div>
        </div>

        <!-- Download Schedule -->
        <div class="bg-gradient-to-r from-blue-900 to-purple-900 text-white p-12 rounded-2xl text-center">
            <h3 class="text-3xl font-bold mb-4">📅 Download Full Schedule</h3>
            <p class="text-blue-100 mb-8 text-lg">Get the complete program with all sessions, speakers, and venue details</p>
            <button class="bg-white text-blue-900 px-8 py-3 rounded-xl font-bold hover:bg-gray-100 transition">
                📥 Download PDF
            </button>
        </div>
    </div> --}}
</main>
@endsection
