@extends('base')
@section('title', 'I2COMSAPP 2026')

@push('styles')
<style>
    .asymmetric-grid {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
    }
    @media (max-width: 768px) {
        .asymmetric-grid {
            grid-template-columns: 1fr;
        }
    }

    .home-hero-slide {
        opacity: 0;
        transition: opacity 1.2s ease-in-out;
    }
    .home-hero-slide-active {
        opacity: 1;
    }
</style>
@endpush

@section('content')
@php
    $s = $settings ?? [];
    $hero = $heroBackground ?? [
        'heroMode' => 'single',
        'heroSingleUrl' => asset('images/Maurit AI2024 Header.jpg'),
        'heroCarouselUrls' => [],
    ];
@endphp
<main class="pt-24">
    <section class="relative min-h-[88vh] flex items-center px-8 md:px-16 overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if(($hero['heroMode'] ?? 'single') === 'carousel' && count($hero['heroCarouselUrls'] ?? []) > 0)
                <div class="home-hero-carousel absolute inset-0" id="home-hero-carousel" data-interval="5500" aria-label="{{ __('Hero images') }}">
                    @foreach($hero['heroCarouselUrls'] as $i => $heroUrl)
                        <img src="{{ $heroUrl }}" alt=""
                             class="home-hero-slide absolute inset-0 w-full h-full object-cover brightness-50 {{ $i === 0 ? 'home-hero-slide-active' : '' }}"
                             data-slide-index="{{ $i }}">
                    @endforeach
                </div>
            /* @else
                <img src="{{ $hero['heroSingleUrl'] ?? asset('images/Maurit AI2024 Header.jpg') }}" alt="Conference Hero"
                     class="w-full h-full object-cover brightness-50">   */
            @endif
            <div class="absolute inset-0 bg-gradient-to-br from-primary/50 to-black/30"></div>
        </div>
        <div class="absolute right-0 bottom-0 w-1/3 h-2/3 bg-primary/5 rounded-tl-[200px] -z-10 blur-3xl pointer-events-none" aria-hidden="true"></div>

        <div class="relative z-10 max-w-6xl mx-auto w-full">
            <div class="max-w-4xl">
                <span class="inline-block bg-secondary-container text-on-secondary-container px-4 py-2 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-6">
                    {{ $s['hero_badge'] ?? '23–25 December 2026 • Nouakchott' }}
                </span>

                <h1 class="text-4xl md:text-7xl font-black text-white leading-tight tracking-tighter mb-6">
                   3nd International Conference on
                    <span style="color: #FFD700;">Artificial Intelligence</span>
                    and its
                    <span style="color: #FFD700;">Practical Applications</span>
                    <br>
                    <span style="color: #EE82EE;">in the Age of Digital Transformation</span>
                </h1>

                {{-- <p class="text-white/85 text-lg md:text-xl max-w-3xl leading-relaxed mb-10">
                    {{ $s['hero_lead'] ?? 'A premier platform for researchers, academics and professionals to discuss advances in AI, digital transformation, ethics, and real-world applications in developing countries.' }}
                </p> --}}

                {{-- <div class="flex flex-wrap gap-4">
                    <a href="{{ route('call_for_papers') }}" class="bg-primary text-on-primary px-8 py-4 rounded-xl font-bold text-sm uppercase tracking-widest">
                        Submit Paper
                    </a>
                    <a href="{{ route('registration') }}" class="bg-white/10 border border-white/20 text-white px-8 py-4 rounded-xl font-bold text-sm uppercase tracking-widest backdrop-blur-md">
                        Register Now
                    </a> --}}
                    {{-- <a href="#sponsors-section" class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-8 py-4 rounded-xl font-bold text-sm uppercase tracking-widest hover:shadow-lg transition">
                        View Sponsors
                    </a> --}}
                {{-- </div> --}}


<div class="info-container">

  <!-- Dates -->
  <div class="info-item">
    <div class="icon-circle">
      <span class="material-symbols-outlined">calendar_today</span>
    </div>
    <div>
      <p class="label">Dates</p>
      <p class="value">{{ $s['info_dates'] ?? '23–25 Dec 2026' }}</p>
    </div>
  </div>

  <!-- Location -->
  <div class="info-item">
    <div class="icon-circle">
      <span class="material-symbols-outlined">location_on</span>
    </div>
    <div>
      <p class="label">Location</p>
      <p class="value">{{ $s['info_location'] ?? 'Nouakchott University Campus, Nouakchott' }}</p>
    </div>
  </div>

</div>

<!-- Organizer Card with Large University Logos -->
<div class="organizer-card flex flex-col items-center gap-8 bg-white/10 p-8 rounded-xl backdrop-blur-sm">
  <div class="flex gap-8 items-center justify-center">
   <img src="{{ asset('images/UNFST.png') }}" alt="Logo FST-UNA" class="h-32 w-auto drop-shadow-lg hover:scale-110 transition-transform">

  <p class="text-center text-lg font-semibold text-white max-w-2xl">
    Organized by </br> the
    <strong> Faculty of Sciences and Techniques </strong>,</br>
    <b>Nouakchott University, Nouakchott, Mauritania </b>

  </p> </div>

</div>

            </div>
        </div>
    </section>
    <!-- Vertical News Ticker Section -->
<section class="sticky top-16 z-30 bg-surface-container-low border-b border-outline-variant/10 py-4 overflow-hidden">
<div class="max-w-7xl mx-auto px-8 flex items-center gap-8">
<div class="flex-shrink-0 flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-error animate-pulse"></div>
<span class="font-headline font-bold text-on-surface tracking-widest text-xs uppercase">Latest News</span>
</div>
<div class="h-10 w-px bg-outline-variant/30"></div>
<div class="flex-1 h-8 overflow-hidden relative news-ticker-container">
<div class="animate-ticker-horizontal flex whitespace-nowrap gap-12">
<div class="flex items-center gap-12">
@forelse($newsItems as $item)
<p class="text-sm font-medium text-on-surface-variant">{{ $item->title }}</p>
@empty
<p class="text-sm font-medium text-on-surface-variant">Conference updates will appear here.</p>
@endforelse
</div>
<div class="flex items-center gap-12">
@forelse($newsItems as $item)
<p class="text-sm font-medium text-on-surface-variant">{{ $item->title }}</p>
@empty
<p class="text-sm font-medium text-on-surface-variant">Conference updates will appear here.</p>
@endforelse
</div>
</div>
</div>
</div>
</section>
<!-- Organizer Section -->
{{-- <section class="py-24 bg-surface-container-low">
<div class="max-w-7xl mx-auto px-8">
<div class="flex flex-col md:flex-row items-center justify-between gap-12 bg-white p-12 rounded-full border border-outline-variant/10">
<div class="max-w-xl">
<h2 class="font-headline text-3xl font-bold text-blue-600 mb-4">Academic Excellence</h2>
<p class="text-on-surface-variant leading-relaxed">Organized by the <span class="font-bold text-primary">Faculty of Sciences and Techniques (FST)</span>, our mission is to foster a global dialogue on the most pressing challenges in applied physics and modern computing systems.</p>
</div>
<div class="flex items-center gap-8">
<div class="h-32 w-32 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer">
<img class="w-full h-full object-contain" data-alt="Official logo of the Faculty of Sciences and Techniques FST with intricate shield emblem and academic typography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDn5RwyPt39-jEdqWw5m8PhD1p86KqLAErpQX-8IwOPIqFt2vgVS5oaShmctcPHuX4m_9LtOh50sdiKpNruKWdPr7StPz3ggxb8PLqoFhAPMp7J0AbwjMQSG2oWgw3rZJik-DSfBKDw44f5beTUIvWkmSDgwkLN_AD6KZLoFJB2oldXjMsP81TC_0l43_UCm3m3Mes-_xV9GnxBb1TMYhEc7h5oqDzeZXw5aG4fEVSNVV2ONFKs_UtF4Lx9ZyUUpyobP1U46o0KwdE"/>
</div>
<div class="h-16 w-px bg-outline-variant/30"></div>
<div class="text-right">
<span class="block font-headline font-bold text-on-surface">Nouakchott, Mauritania</span>
<span class="text-sm text-on-surface-variant">Host Institution</span>
</div>
</div>
</div>
</div>
</section> --}}

<!-- Countdown Section -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 py-16 text-white">
<div class="max-w-screen-2xl mx-auto px-8 flex flex-col md:flex-row items-center justify-between gap-12">
<div class="max-w-sm">
<h2 class="text-4xl font-headline font-bold leading-tight text-white">The countdown to innovation has begun.</h2>
</div>
<div class="grid grid-cols-4 gap-4 md:gap-12 w-full md:w-auto">
<div class="text-center group">
<div class="text-5xl md:text-7xl font-headline font-bold" id="countdown-days">000</div>
<div class="text-xs uppercase tracking-[0.2em] font-bold opacity-60 mt-2">Days</div>
</div>
<div class="text-center">
<div class="text-5xl md:text-7xl font-headline font-bold" id="countdown-hours">00</div>
<div class="text-xs uppercase tracking-[0.2em] font-bold opacity-60 mt-2">Hours</div>
</div>
<div class="text-center">
<div class="text-5xl md:text-7xl font-headline font-bold" id="countdown-minutes">00</div>
<div class="text-xs uppercase tracking-[0.2em] font-bold opacity-60 mt-2">Mins</div>
</div>
<div class="text-center">
<div class="text-5xl md:text-7xl font-headline font-bold" id="countdown-seconds">00</div>
<div class="text-xs uppercase tracking-[0.2em] font-bold opacity-60 mt-2">Secs</div>
</div>
</div>
</div>
</section>
<!-- About/Scope Section -->
<section class="py-24 bg-white">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="asymmetric-grid gap-20 items-start">
<div class="space-y-8 sticky top-32">
<h2 class="text-5xl font-headline font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">{{ $s['about_title'] ?? 'Bridging the AI Divide' }}</h2>
<div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-purple-600"></div>
<p class="text-xl leading-relaxed text-gray-600 font-medium">
                            {{ $s['about_lead'] ?? 'I2COMSAPP 2026 addresses the transformative power of Artificial Intelligence specifically through the lens of developing nations.' }}
                        </p>
</div>
<div class="space-y-12">
<div class="bg-white p-10 rounded-xl relative overflow-hidden group border border-blue-100">
<div class="absolute top-0 right-0 p-8 text-blue-600/10">
<span class="material-symbols-outlined text-8xl" data-icon="diversity_3">diversity_3</span>
</div>
<h3 class="text-2xl font-bold mb-4 text-blue-900">Our Vision</h3>
<p class="text-lg leading-relaxed text-gray-600 mb-6">
                                {{ $s['vision_body'] ?? 'The conference provides a premier interdisciplinary platform for researchers, practitioners, and educators to present and discuss the most recent innovations, trends, and concerns as well as practical challenges encountered and solutions adopted in the fields of AI.' }}
                            </p>
<div class="grid grid-cols-2 gap-8 pt-6">
<div class="space-y-2">
<h4 class="font-bold text-blue-600">Knowledge Hub</h4>
<p class="text-sm">Fostering intensive networking and scientific knowledge sharing across borders.</p>
</div>
<div class="space-y-2">
<h4 class="font-bold text-purple-600">Ethical AI</h4>
<p class="text-sm">Exploring deep ethical considerations unique to regional digital transformation.</p>
</div>
</div>
</div>
<div class="flex gap-8 items-center bg-gradient-to-r from-purple-100 to-blue-100 p-1 rounded-xl overflow-hidden shadow-xl border border-purple-200">
<div class="bg-gradient-to-br from-blue-600 to-purple-600 p-8">
<span class="text-white text-5xl material-symbols-outlined" data-icon="auto_graph">auto_graph</span>
</div>
<div class="pr-8 py-6">
<p class="text-xl font-bold italic text-blue-900">"{{ $s['vision_quote'] ?? 'Empowering the next generation of researchers to solve local problems with global technologies.' }}"</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Topics Section - Bento Grid Layout -->
<section class="py-16 bg-transparent">
<div class="max-w-screen-xl mx-auto px-8">
<div class="flex justify-between items-end mb-10">
<div class="max-w-2xl">
<p class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-4">Research Domains</p>
<h2 class="text-4xl font-headline font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Conference Topics</h2>
</div>

</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-3">
@foreach($topics as $topic)
    @php
        $border = $topic->border_color ?? '#bfdbfe';
        $style = "background: transparent; border-color: {$border};";
    @endphp
    <div class="rounded-xl border-2 p-4 flex flex-col gap-3 transition hover:shadow-md text-slate-900"
         style="{{ $style }}">
        <span class="material-symbols-outlined text-4xl text-blue-600">{{ $topic->icon_name ?? 'circle' }}</span>
        <div class="flex-1 space-y-2">
            <h3 class="text-xl font-bold leading-tight">{{ $topic->title }}</h3>
            <p class="text-xs text-on-surface-variant leading-relaxed">{{ $topic->description }}</p>
        </div>
    </div>
@endforeach
</div>
</div>
</section>
<!-- Featured Speakers Section -->
<section class="py-24 bg-white">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="mb-16">
<p class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-4">Eminent Minds</p>
<h2 class="text-5xl font-headline font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Keynote Speakers</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
@forelse($speakers as $speaker)
<div class="group relative bg-white rounded-xl overflow-hidden border border-gray-200 transition-all hover:shadow-xl">
<div class="aspect-[4/5] overflow-hidden bg-gray-100">
<img alt="{{ $speaker->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
src="{{ $speaker->photo_url ? asset($speaker->photo_url) : 'https://placehold.co/600x750/eff5ec/006b34?text=Speaker' }}"/>
{{-- src="{{ $speaker->photo_url ?? 'https://placehold.co/600x750/eff5ec/006b34?text=Speaker' }}"/> --}}
</div>
<div class="p-6" data-speaker-card>
<h3 class="text-xl font-headline font-bold text-blue-900">{{ $speaker->name }}</h3>
@if($speaker->role_title)
<p class="text-blue-600 font-bold text-xs uppercase tracking-wider mb-3">{{ $speaker->role_title }}</p>
@endif
@if($speaker->affiliation)
<p class="text-sm font-semibold text-gray-600 mb-4">{{ $speaker->affiliation }}</p>
@endif
@php
    $speakerBio = $speaker->bio ?? '';
    $speakerBioPreview = \Illuminate\Support\Str::limit($speakerBio, 160);
@endphp
<div class="text-sm text-gray-600 leading-relaxed opacity-80">
    <p data-speaker-bio>
        {{ $speakerBioPreview }}
    </p>
    <span data-speaker-bio-full class="hidden">{{ $speakerBio }}</span>
    <span data-speaker-bio-short class="hidden">{{ $speakerBioPreview }}</span>
</div>
@if(strlen($speakerBio) > 160)
<button type="button" data-speaker-toggle data-expanded="false" class="mt-4 text-sm font-semibold text-blue-600 hover:text-blue-800 transition">Read more</button>
@endif
</div>
</div>
@empty
<p class="text-gray-600 col-span-full text-center py-12">Keynote speakers will be announced soon.</p>
@endforelse
</div>
</div>
</section>
<script>
    document.addEventListener('click', function (event) {
        const button = event.target.closest('[data-speaker-toggle]');
        if (!button) {
            return;
        }

        const card = button.closest('[data-speaker-card]');
        if (!card) {
            return;
        }

        const bio = card.querySelector('[data-speaker-bio]');
        const full = card.querySelector('[data-speaker-bio-full]');
        const short = card.querySelector('[data-speaker-bio-short]');
        const expanded = button.getAttribute('data-expanded') === 'true';

        if (!bio || !full || !short) {
            return;
        }

        if (expanded) {
            bio.textContent = short.textContent.trim();
            button.textContent = 'Read more';
            button.setAttribute('data-expanded', 'false');
        } else {
            bio.textContent = full.textContent.trim();
            button.textContent = 'Show less';
            button.setAttribute('data-expanded', 'true');
        }
    });
</script>
<!-- Important Dates Timeline -->
<section class="py-24 bg-gray-50">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="mb-16 text-center max-w-2xl mx-auto">
<h2 class="text-5xl font-headline font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-6">{{ $s['timeline_title'] ?? 'Submission Timeline' }}</h2>
<p class="text-gray-600 font-medium">{{ $s['timeline_subtitle'] ?? 'Keep track of these critical milestones to ensure your research is part of I2COMSAPP 2026.' }}</p>
</div>
<div class="relative pt-12">
<!-- Progress Line -->
<div class="absolute top-1/2 left-0 w-full h-0.5 bg-outline-variant/20 hidden md:block"></div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-8">
@forelse($milestones as $milestone)
@php
    $borderClass = match ($milestone->accent) {
        'secondary' => 'border-purple-600',
        'tertiary' => 'border-cyan-500',
        'highlight' => 'border-blue-600',
        default => 'border-blue-600',
    };
    $dotClass = match ($milestone->accent) {
        'secondary' => 'bg-purple-600',
        'tertiary' => 'bg-cyan-500',
        'highlight' => 'bg-blue-600',
        default => 'bg-blue-600',
    };
    $dateLabel = $milestone->accent === 'highlight'
        ? 'Dec 23-25, 2026'
        : $milestone->milestone_date->format('M j, Y');
    $dateTextClass = match ($milestone->accent) {
        'secondary' => 'text-purple-400',
        'tertiary' => 'text-cyan-400',
        'highlight' => 'text-blue-100',
        default => 'text-blue-100',
    };
@endphp
<div class="relative group">
@if($milestone->accent === 'highlight')
<div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white p-8 rounded-xl border-b-4 {{ $borderClass }} transition-all group-hover:-translate-y-2 group-hover:shadow-2xl z-10 relative">
<span class="{{ $dateTextClass }} font-bold text-sm tracking-tighter block mb-2 font-headline">{{ $dateLabel }}</span>
<h4 class="text-xl font-bold mb-4">{{ $milestone->title }}</h4>
<p class="text-sm text-white/80 leading-relaxed">{{ $milestone->description }}</p>
</div>
@else
<div class="bg-white p-8 rounded-xl border-b-4 {{ $borderClass }} transition-all group-hover:-translate-y-2 group-hover:shadow-2xl z-10 relative">
<span class="{{ $dateTextClass }} font-bold text-sm tracking-tighter block mb-2 font-headline">{{ $dateLabel }}</span>
<h4 class="text-xl font-bold text-blue-900 mb-4">{{ $milestone->title }}</h4>
<p class="text-sm text-gray-600 leading-relaxed">{{ $milestone->description }}</p>
</div>
@endif
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 rounded-full {{ $dotClass }} ring-8 ring-background hidden md:block z-20"></div>
</div>
@empty
<p class="text-gray-600 col-span-full text-center">Important dates will be posted soon.</p>
@endforelse
</div>
</div>
</div>
</section>


<!-- Workshops Section (navbar #hands-on-workshops)
<section id="hands-on-workshops" class="py-24 bg-gradient-to-br from-indigo-50 to-purple-50 scroll-mt-[5.5rem]" aria-labelledby="hands-on-workshops-heading">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="mb-16">
<p class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-4">Professional Development</p>
<h2 id="hands-on-workshops-heading" class="text-5xl font-headline font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Hands-on Workshops</h2>
<p class="text-gray-600 mt-4 max-w-2xl">Learn from industry experts and gain practical skills in cutting-edge AI technologies and applications.</p>
<p class="text-sm text-gray-500 mt-3 max-w-2xl">
     <a href="{{ route('workshops') }}" class="font-semibold text-blue-600 underline hover:text-blue-800">Workshop listings from the CMS</a>
    for titles, abstracts, and schedules published by the committee.
</p>-->
</div>

<!-- Sponsors Section -->
<section class="py-24 bg-white" id="sponsors-section">
    <div class="max-w-screen-2xl mx-auto px-8">
        <!-- Header -->
        <div class="mb-16 text-center">
            <h2 class="text-5xl font-headline font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-4">Our Sponsors & Partners</h2>
            <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">
                Thank you to our valued sponsors who make I2COMSAPP 2026 possible
            </p>
        </div>

        @if ($platinumSponsors->count() > 0)
        <!-- Platinum Sponsors -->
        <div class="mb-16">
            <div class="mb-8">
                <h3 style="color: #FFD700;" class="text-4xl font-bold">💎 Platinum Sponsors</h3>
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
                <h3 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">🏆 Gold Sponsors</h3>
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
                <h3 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">✨ Silver Sponsors</h3>
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
                <h3 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-700">🤝 Bronze Partners</h3>
                <p class="text-gray-600 mt-2">Community supporters</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 bg-gradient-to-b from-orange-50 to-white p-8 rounded-2xl border border-orange-200">
                @include('pages.sponsor-cards', ['sponsors' => $bronzeSponsors])
            </div>
        </div>
        @endif

        @if ($collaborators->count() > 0)
        <!-- Collaborators -->
        <div class="mb-16">
            <div class="mb-8">
                <h3 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-600">🌐 Collaborators</h3>
                <p class="text-gray-600 mt-2">Academic and research partners</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 bg-gradient-to-b from-indigo-50 to-white p-8 rounded-2xl border border-indigo-200">
                @include('pages.sponsor-cards', ['sponsors' => $collaborators])
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
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-purple-900 text-white overflow-hidden relative">
<div class="absolute top-0 right-0 w-1/2 h-full opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[400px]" data-icon="hub">hub</span>
</div>
<div class="max-w-screen-2xl mx-auto px-8 relative z-10">
<div class="flex flex-col md:flex-row items-center justify-between gap-12">
<div class="max-w-2xl">
<h2 class="text-4xl md:text-5xl font-headline font-bold mb-6 text-white">{{ $s['cta_title'] ?? 'Ready to shape the future of AI in Africa?' }}</h2>
<p class="text-xl text-blue-100 font-medium mb-8">{{ $s['cta_lead'] ?? 'Download the template and submit your research today. Be part of the conversation that matters.' }}</p>
<div class="flex flex-wrap gap-4">
<a href="{{ route('call_for_papers') }}" class="bg-white text-blue-900 px-8 py-4 rounded-xl font-bold inline-flex items-center gap-2 hover:bg-blue-50 transition-colors">
<span class="material-symbols-outlined" data-icon="download">download</span>
                                Paper template &amp; formats
                            </a>
<a href="{{ route('call_for_papers') }}" class="border border-blue-300 text-blue-100 px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition-colors inline-flex items-center justify-center">
                                Submission guide
                            </a>
</div>
</div>
</div>
</div>
</section>


</main>



            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
(function () {
    const targetDate = new Date('December 23, 2026 00:00:00').getTime();
    const daysEl = document.getElementById('countdown-days');
    const hoursEl = document.getElementById('countdown-hours');
    const minutesEl = document.getElementById('countdown-minutes');
    const secondsEl = document.getElementById('countdown-seconds');
    if (!daysEl || !hoursEl || !minutesEl || !secondsEl) {
        return;
    }
    function updateCountdown() {
        const distance = targetDate - Date.now();
        if (distance < 0) {
            daysEl.textContent = '00';
            hoursEl.textContent = '00';
            minutesEl.textContent = '00';
            secondsEl.textContent = '00';
            return;
        }
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        daysEl.textContent = days.toString().padStart(2, '0');
        hoursEl.textContent = hours.toString().padStart(2, '0');
        minutesEl.textContent = minutes.toString().padStart(2, '0');
        secondsEl.textContent = seconds.toString().padStart(2, '0');
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);
})();
(function () {
    const root = document.getElementById('home-hero-carousel');
    if (!root) {
        return;
    }
    const slides = root.querySelectorAll('.home-hero-slide');
    if (slides.length < 2) {
        return;
    }
    let i = 0;
    const interval = parseInt(String(root.dataset.interval || '5500'), 10) || 5500;
    setInterval(function () {
        slides[i].classList.remove('home-hero-slide-active');
        i = (i + 1) % slides.length;
        slides[i].classList.add('home-hero-slide-active');
    }, interval);
})();
</script>
@endpush


