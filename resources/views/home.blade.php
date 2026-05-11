@extends('base')
@section('title', 'I2COMSAPP 2026')

@push('styles')
<style>



.home-hero-slide{
    position:absolute;
    inset:0;
    opacity:0;
    transition:opacity 1.2s ease-in-out;
}

.home-hero-slide-active{
    opacity:1;
}

    /* ============================================
   Supported By / Strategic Partners
============================================ */

.supported-by {
    width: 100%;
    background: #ffffff;
    padding: 18px 40px;

    display: flex;
    align-items: center;
    gap: 28px;

    overflow: hidden;

    border-top: 1px solid #e5e7eb;
    border-bottom: 1px solid #e5e7eb;
    box-shadow: 0 4px 16px rgba(15, 23, 42, 0.06);
}

.supported-label {
    flex-shrink: 0;

    font-size: 22px;
    font-weight: 800;
    color: #0f172a;

    white-space: nowrap;
}

.partners-wrapper {
    flex: 1;
    overflow: hidden;
}

.partners-list {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: clamp(30px, 6vw, 110px);
    flex-wrap: nowrap;
}

.partner {
    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;
}

.partner img {
    max-width: 150px;
    height: 70px;

    object-fit: contain;

    filter: grayscale(0);
    transition: transform 0.25s ease, opacity 0.25s ease;
}

.partner img:hover {
    transform: scale(1.06);
    opacity: 0.9;
}

/* Optional animation */
.partners-list.is-animated {
    width: max-content;
    animation: partners-scroll 25s linear infinite;
}

@keyframes partners-scroll {
    from {
        transform: translateX(100%);
    }

    to {
        transform: translateX(-100%);
    }
}

/* RTL */
html[dir="rtl"] .supported-by {
    direction: rtl;
}

html[dir="rtl"] .partners-list {
    direction: ltr;
}

/* Mobile */
@media (max-width: 768px) {
    .supported-by {
        flex-direction: column;
        padding: 18px 16px;
        gap: 18px;
        text-align: center;
    }

    .supported-label {
        font-size: 20px;
        white-space: normal;
    }

    .partners-wrapper {
        width: 100%;
    }

    .partners-list {
        flex-wrap: wrap;
        gap: 22px;
    }

    .partner {
        width: calc(50% - 14px);
    }

    .partner img {
        max-width: 120px;
        height: 54px;
    }

    .partners-list.is-animated {
        animation: none;
        width: 100%;
    }
}
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




.sponsors-section{
    background:#ffffff;
    padding:60px 20px;
    overflow:hidden;
}

.sponsors-title{
    text-align:center;
    margin-bottom:40px;
}

.sponsors-title h2{
    margin:0;

    color:#111827;

    font-family:Arial, sans-serif;
    font-size:32px;
    font-weight:900;

    letter-spacing:5px;
    text-transform:uppercase;
}

.sponsors-slider{
    width:100%;
    overflow:hidden;
}

.sponsors-track{
    display:flex;
    align-items:center;

    gap:50px;

    width:max-content;

    animation:sponsorScroll 24s linear infinite;
}

.sponsor-item{
    width:220px;
    height:140px;

    background:#ffffff;

    border-radius:18px;

    padding:20px;

    display:flex;
    align-items:center;
    justify-content:center;

    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.sponsor-item img{
    max-width:100%;
    max-height:100%;

    object-fit:contain;
}

@keyframes sponsorScroll{

    from{
        transform:translateX(0);
    }

    to{
        transform:translateX(-50%);
    }
}

/* Mobile */

@media (max-width:768px){

    .sponsors-title h2{
        font-size:24px;
        letter-spacing:3px;
    }

    .sponsors-track{
        gap:25px;
    }

    .sponsor-item{
        width:150px;
        height:100px;
        padding:15px;
    }
}

</style>
@endpush

@section('content')




@php
    $s = $settings ?? [];

    $hero = $heroBackground ?? [
        'heroMode' => 'single',
        'heroSingleUrl' => asset('images/heroimg.png'),
        'heroCarouselUrls' => [],
    ];
@endphp

<main>

@php
    $s = $settings ?? [];

    $hero = $heroBackground ?? [
        'heroMode' => 'single',
        'heroSingleUrl' => asset('images/heroimg.png'),
        'heroCarouselUrls' => [],
    ];
@endphp

<main>
@php
    $s = $settings ?? [];

    $hero = $heroBackground ?? [
        'heroMode' => 'single',
        'heroSingleUrl' => asset('images/heroimg.png'),
        'heroCarouselUrls' => [],
    ];
@endphp

<main>

<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-black">

    {{-- HERO BACKGROUND --}}
    <div class="absolute inset-0 z-0 overflow-hidden bg-black">

        @if(($hero['heroMode'] ?? 'single') === 'carousel' && count($hero['heroCarouselUrls'] ?? []) > 0)

            <div class="home-hero-carousel absolute inset-0"
                 id="home-hero-carousel"
                 data-interval="5500">

                @foreach($hero['heroCarouselUrls'] as $i => $heroUrl)

                    <div class="home-hero-slide {{ $i === 0 ? 'home-hero-slide-active' : '' }}"
                         data-slide-index="{{ $i }}"
                         style="
                            background-image:url('{{ $heroUrl }}');
                            background-size:cover;
                            background-position:5% center;
                            background-repeat:no-repeat;
                         ">
                    </div>

                @endforeach

            </div>

        @else

            <div class="absolute inset-0"
                 style="
                    background-image:url('{{ $hero['heroSingleUrl'] ?? asset('images/heroimg.png') }}');
                    background-size:cover;
                    background-position:5% center;
                    background-repeat:no-repeat;
                 ">
            </div>

        @endif

        {{-- DARK OVERLAY --}}
        <div class="absolute inset-0 bg-black/45"></div>

    </div>

    {{-- HERO CONTENT --}}
    <div class="relative z-10 w-full max-w-6xl mx-auto px-6 text-center">

        {{-- CONFERENCE TITLE --}}
        <h1 class="font-black leading-tight tracking-tight mb-8">

            <span class="block text-cyan-400 text-3xl md:text-5xl lg:text-6xl mb-2">
                I2COMSAPP
            </span>

            <span class="block text-white text-lg md:text-3xl lg:text-4xl mb-2">
                International Conference on
            </span>

            <span class="block text-yellow-400 text-3xl md:text-5xl lg:text-6xl mb-2">
                Artificial Intelligence
            </span>

            <span class="block text-white text-lg md:text-3xl lg:text-4xl mb-2">
                and its Practical Applications
            </span>

            <span class="block text-fuchsia-300 text-lg md:text-2xl lg:text-3xl mb-3">
                in the Age of Digital Transformation
            </span>

            <span class="block text-green-400 text-xl md:text-2xl lg:text-3xl">
                3rd Edition
            </span>

        </h1>

        {{-- INFO BOXES --}}
        <div class="flex flex-wrap justify-center gap-5 mb-10">

            {{-- DATE --}}
            <div class="flex items-center gap-4 bg-white/10 border border-white/10 backdrop-blur-md px-6 py-4 rounded-2xl">

                <span class="material-symbols-outlined text-white text-3xl">
                    calendar_today
                </span>

                <div class="text-left">

                    <p class="text-xs uppercase tracking-[0.25em] text-white/60">
                        Dates
                    </p>

                    <p class="text-lg font-bold text-white">
                        {{ $s['info_dates'] ?? '23–25 Dec 2026' }}
                    </p>

                </div>

            </div>

            {{-- LOCATION --}}
            <div class="flex items-center gap-4 bg-white/10 border border-white/10 backdrop-blur-md px-6 py-4 rounded-2xl">

                <span class="material-symbols-outlined text-white text-3xl">
                    location_on
                </span>

                <div class="text-left">

                    <p class="text-xs uppercase tracking-[0.25em] text-white/60">
                        Location
                    </p>

                    <p class="text-lg font-bold text-white">
                        {{ $s['info_location'] ?? 'Nouakchott University Campus, Nouakchott' }}
                    </p>

                </div>

            </div>

        </div>

        {{-- ORGANIZER --}}
        <div class="bg-white/10 border border-white/10 backdrop-blur-xl rounded-3xl p-6 md:p-8 max-w-4xl mx-auto">

            <div class="flex flex-col md:flex-row items-center justify-center gap-6">

                {{-- LOGO --}}
               <img src="{{ asset('images/UNFST.png') }}"
                    alt="Logo FST-UNA"
                    class="h-16 md:h-16 object-contain drop-shadow-xl rounded-[20px]">
                                {{-- TEXT --}}
                <div class="text-center md:text-left">

                    <p class="text-white/70 uppercase tracking-[0.25em] text-sm mb-2">
                        Organized by
                    </p>

                    <h3 class="text-xl md:text-2xl font-bold text-white mb-2">
                        Faculty of Sciences and Techniques
                    </h3>

                    <p class="text-base md:text-lg text-white/90">
                        Nouakchott University, Nouakchott, Mauritania
                    </p>

                </div>

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

<!-- Supported By -->
<section class="supported-by">
    <div class="supported-label">
        <strong>Strategic partners:</strong>
    </div>

    <div class="partners-wrapper">
        <div class="partners-list">

            <div class="partner">
                <img src="{{ asset('images/comstech-logo.png') }}" alt="COMSTECH">
            </div>

            <div class="partner">
                <img src="{{ asset('images/ALECSO.png') }}" alt="ALECSO">
            </div>

            <div class="partner">
                <img src="{{ asset('images/FASRC.jpg') }}" alt="FASRC">
            </div>

            <div class="partner">
                <img src="{{ asset('images/giz_logo.jpg') }}" alt="GIZ">
            </div>

            <div class="partner">
                <img src="{{ asset('images/srping_LOGO.jpeg') }}" alt="Springer">
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
<!-- About / Scope Section -->
<section class="py-24 bg-white">

    <div class="w-full max-w-screen-2xl mx-auto px-8">

        <div class="w-full">

            <div class="space-y-8">

                <h2 class="text-5xl font-headline font-black text-zinc-950 mb-4">
                    {{ $s['about_title'] ?? 'Scope' }}
                </h2>

                <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>

                <p class="text-xl leading-relaxed text-gray-600 font-medium max-w-none">
                    {{ $s['about_lead'] ?? 'I2COMSAPP 2026 addresses the transformative power of Artificial Intelligence specifically through the lens of developing nations.' }}
                </p>

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
<h2 class="text-4xl font-headline font-black text-zinc-950 mb-4 bg-clip-text bg-gradient-to-r from-dark-900 to-purple-600">Conference Topics</h2>
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
            <p class="text-xs text-on-surface-variant leading-relaxed">{!! nl2br(e($topic->description)) !!}</p>
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
<h2 class="text-5xl font-headline font-black text-zinc-950 mb-4 bg-clip-text bg-gradient-to-r from-dark-900 to-purple-600">Keynote Speakers</h2>
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
<h2 class="text-5xl font-headline font-black text-zinc-950 mb-6 bg-clip-text bg-gradient-to-r from-dark-900 to-purple-600">{{ $s['timeline_title'] ?? 'Submission Timeline' }}</h2>
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
        ? 'Dec 14-16, 2026'
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



<section class="py-24 bg-white">

    <div class="max-w-screen-2xl mx-auto px-8">

        <!-- SECTION TITLE -->
        <div class="mb-16">
            <h2 class="text-5xl font-headline font-black text-zinc-950 mb-4 bg-clip-text bg-gradient-to-r from-dark-900 to-purple-600">
                Discussion Panels
            </h2>

        </div>

        <!-- PANELS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <!-- PANEL 1 -->
            <div class="group relative bg-white rounded-xl overflow-hidden border border-gray-200 transition-all hover:shadow-xl">

                <div class="overflow-hidden">
                    <img src="{{ asset('images/AI-Future.jpg') }}"
                         alt="Future of AI"
                         class="w-full h-[340px] object-cover transition-transform duration-500 group-hover:scale-105">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-blue-900 leading-snug">
                        Future of AI : Predictions from Industry Leaders
                    </h3>
                </div>

            </div>

            <!-- PANEL 2 -->
            <div class="group relative bg-white rounded-xl overflow-hidden border border-gray-200 transition-all hover:shadow-xl">

                <div class="overflow-hidden">

                    <img src="{{ asset('images/AI-Ethics.jpg') }}"
                         alt="Ethics in AI"
                         class="w-full h-[340px] object-cover transition-transform duration-500 group-hover:scale-105">

                </div>

                <div class="p-6">

                    <h3 class="text-2xl font-bold text-blue-900 leading-snug">
                        Ethics in AI : An Open Dialogue with Experts
                    </h3>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Sponsors Section -->
<section class="py-24 bg-white" id="sponsors-section">
    <div class="max-w-screen-2xl mx-auto px-8">
        <!-- Header -->
        {{-- <div class="mb-16 text-center">
            <h2 class="text-5xl font-headline font-black text-zinc-950 mb-4 bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-4">Our Sponsors & Partners</h2>
            <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">
                Thank you to our valued sponsors who make I2COMSAPP 2026 possible
            </p>
        </div> --}}

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
                <h3 class="text-5xl font-headline font-black text-zinc-950 mb-4 bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-600">Collaborators</h3>
                <p class="text-gray-600 mt-2">Academic and research partners</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 bg-gradient-to-b from-indigo-50 to-white p-8 rounded-2xl border border-indigo-200">
                @include('pages.sponsor-cards', ['sponsors' => $collaborators])
            </div>
        </div>
        @endif

        <!-- Sponsors Section -->
<section class="sponsors-section">

    <div class="sponsors-title">
        <h2>Sponsors</h2>
    </div>

   <div class="sponsors-slider">

    <div class="sponsors-track">

        <!-- University of Nouadhibou -->
        <div class="sponsor-item">
            <img src="images/UNDB.jpg"
                 alt="University of Nouadhibou">
        </div>

        <!-- ISCAE -->
        <div class="sponsor-item">
            <img src="images/iscae.png"
                 alt="ISCAE">
        </div>

        <!-- ESP -->
        <div class="sponsor-item">
            <img src="images/esp.jpg"
                 alt="ESP">
        </div>

        <!-- ISGI -->
        <div class="sponsor-item">
            <img src="images/ISGI.jpg"
                 alt="ISGI">
        </div>

        <!-- SUPNUM -->
        <div class="sponsor-item">
            <img src="images/LOGO-SUPNUM.png"
                 alt="SUPNUM">
        </div>

        <!-- duplicate for infinite scroll -->

        <div class="sponsor-item">
            <img src="images/Moov_Mauritel_logo.png"
                 alt="Moov Mauritel">
        </div>

        <div class="sponsor-item">
            <img src="images/logo-Next-Tech.jpg"
                 alt="Nex">
        </div>

        <div class="sponsor-item">
            <img src="images/giz_logo.jpg"
                 alt="GIZ">
        </div>

        <div class="sponsor-item">
            <img src="images/logo-arsco.jpg"
                 alt="ARSCO">
        </div>

        <div class="sponsor-item">
            <img src="images/Maurit-MESRS.png"
                 alt="MESRS">
        </div>

    </div>

</div>

</section>

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

{{-- <!-- Final CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-purple-900 text-white overflow-hidden relative">
<div class="absolute top-0 right-0 w-1/2 h-full opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[400px]" data-icon="hub">hub</span> --}}
{{-- </div>
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
</div> --}}
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


