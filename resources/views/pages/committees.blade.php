@extends('base')

@section('title', 'Committees')

@section('content')

<main class="pt-32 px-6 md:px-16 pb-24 bg-white">

    <div class="max-w-6xl mx-auto">

        <header class="mb-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">
                Committees
            </h1>

            <p class="mt-2 text-gray-600">
                Organizing and scientific teams behind I2COMSAPP 2026
            </p>
        </header>

        @php
            $palette = [
                ['#0ea5e9', '#7c3aed'],
                ['#06b6d4', '#06b6b4'],
                ['#f59e0b', '#ef4444'],
                ['#10b981', '#06b6d4'],
                ['#ef4444', '#8b5cf6'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            @foreach($committees as $i => $committee)

                @php
                    $colors = $palette[$i % count($palette)];
                    $members = $committee->members
                        ->where('is_published', true)
                        ->sortBy('sort_order');
                @endphp

                <section class="rounded-xl shadow-lg overflow-hidden bg-white border">

                    {{-- HEADER --}}
                    <div class="p-6"
                         style="background: linear-gradient(90deg, {{ $colors[0] }}, {{ $colors[1] }});">

                        <h2 class="text-white text-xl font-bold">
                            {{ $committee->name }}
                        </h2>

                        @if($committee->description)
                            <p class="text-white/90 text-sm mt-1">
                                {{ $committee->description }}
                            </p>
                        @endif

                    </div>

                    {{-- MEMBERS --}}
                    <div class="p-6">

                        <ul class="space-y-4">

                            @foreach($members as $member)

                                {{-- TRACKS TITLE ONLY FOR GENERAL CHAIR --}}
                                @if(
                                    $committee->slug == 'general-chair'
                                    && $member->sort_order == 1
                                )

                                    <li class="pt-4 mt-4 border-t">

                                        <h3 class="text-sm font-extrabold text-gray-900 uppercase">
                                            Track Chairs
                                        </h3>

                                    </li>

                                @endif

                                <li class="flex items-start gap-4">

                                    {{-- AVATAR --}}
                                    <div class="flex-shrink-0">

                                        @if($member->photo_url)

                                            <img
                                                src="{{ asset($member->photo_url) }}"
                                                alt="{{ $member->name }}"
                                                class="h-12 w-12 rounded-full object-cover border"
                                            >

                                        @else

                                            <div class="h-12 w-12 rounded-full bg-gray-100 flex items-center justify-center text-lg text-gray-600">
                                                {{ strtoupper(substr($member->name,0,1)) }}
                                            </div>

                                        @endif

                                    </div>

                                    {{-- CONTENT --}}
                                    <div>

                                        @if($member->title)

                                            <div class="text-xs font-bold text-blue-600 leading-snug">
                                                {{ $member->title }}
                                            </div>

                                        @endif

                                        <div class="text-sm font-semibold text-gray-800">
                                            {{ $member->name }}
                                        </div>

                                        @if($member->affiliation)

                                            <div class="text-xs text-gray-500 mt-1 leading-relaxed">
                                                {{ $member->affiliation }}
                                            </div>

                                        @endif

                                    </div>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </section>

            @endforeach

        </div>

    </div>

</main>

@endsection
