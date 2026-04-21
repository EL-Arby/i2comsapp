@extends('base')

@section('title', 'Committees')

@section('content')
<main class="pt-32 px-6 md:px-16 pb-24 bg-white">
  <div class="max-w-6xl mx-auto">
    <header class="mb-10 text-center">
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Committees</h1>
      <p class="mt-2 text-gray-600">Organizing and scientific teams behind I2COMSAPP 2026</p>
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
          $members = $committee->members->where('is_published', true)->sortBy('sort_order');
        @endphp

        <section class="rounded-xl shadow-lg overflow-hidden bg-white border" aria-labelledby="committee-{{ $committee->id }}">
          <div class="p-6" style="background: linear-gradient(90deg, {{ $colors[0] }}, {{ $colors[1] }});">
            <h2 id="committee-{{ $committee->id }}" class="text-white text-xl font-bold">{{ $committee->name }}</h2>
            @if($committee->description)
              <p class="text-white/90 text-sm mt-1">{{ $committee->description }}</p>
            @endif
          </div>

          <div class="p-6">
            <ul class="space-y-4">
              @foreach($members as $member)
                <li class="flex items-start gap-4">
                  <div class="flex-shrink-0">
                    @if($member->photo_url)
                      <img src="{{ asset($member->photo_url) }}" alt="{{ $member->name }}" class="h-12 w-12 rounded-full object-cover border">
                    @else
                      <div class="h-12 w-12 rounded-full bg-gray-100 flex items-center justify-center text-lg text-gray-600">{{ strtoupper(substr($member->name,0,1)) }}</div>
                    @endif
                  </div>
                  <div>
                    <div class="text-sm font-semibold text-gray-800">{{ $member->name }}</div>
                    <div class="text-xs text-gray-500">{{ $member->title ?? $member->affiliation }}</div>
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
{{-- <!-- Workshops Section -->
<section class="py-12 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6 md:px-0">
    <div class="mb-8 text-center">
      <h2 class="text-3xl font-bold">Workshops</h2>
      <p class="text-gray-600">Hands-on workshops and sessions organized for the conference.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @foreach($workshops ?? collect() as $workshop)
        <article class="bg-white rounded-xl shadow p-6">
          <div class="flex items-start justify-between gap-4">
            <div>
              <h3 class="text-xl font-bold">{{ $workshop->title }}</h3>
              <p class="text-sm text-gray-600 mt-2">{{ Str::limit($workshop->abstract ?? $workshop->description, 260) }}</p>
            </div>
          </div>

          @if($workshop->presenters)
            <div class="mt-4 text-sm text-gray-700">
              <strong>Presenters:</strong>
              <div class="mt-1">{!! nl2br(e($workshop->presenters)) !!}</div>
            </div>
          @endif

        </article>
      @endforeach
    </div> --}}
  </div>
</section>
@endsection
