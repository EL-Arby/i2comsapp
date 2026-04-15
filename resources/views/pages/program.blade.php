@extends('base')

@section('title', 'Program')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-5xl font-black tracking-tighter mb-10">Conference Program</h1>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold">Day 1 - Opening Ceremony</h2>
                <p class="text-on-surface-variant">Keynote, welcome remarks, and first technical sessions.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold">Day 2 - Scientific Sessions</h2>
                <p class="text-on-surface-variant">Parallel paper presentations and panel discussions.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold">Day 3 - Workshops & Closing</h2>
                <p class="text-on-surface-variant">Workshops, networking, and awards ceremony.</p>
            </div>
        </div>
    </div>
</main>
@endsection
