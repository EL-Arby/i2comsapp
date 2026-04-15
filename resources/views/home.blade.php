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
</style>
@endpush

@section('content')
<main class="pt-24">
    <section class="relative min-h-[88vh] flex items-center px-8 md:px-16 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/Maurit AI2024 Header.jpg') }}" alt="Conference Hero"
                 class="w-full h-full object-cover brightness-50">
            <div class="absolute inset-0 bg-gradient-to-br from-primary/50 to-black/30"></div>
        </div>
        <div class="absolute right-0 bottom-0 w-1/3 h-2/3 bg-primary/5 rounded-tl-[200px] -z-10 blur-3xl pointer-events-none" aria-hidden="true"></div>

        <div class="relative z-10 max-w-6xl mx-auto w-full">
            <div class="max-w-4xl">
                <span class="inline-block bg-secondary-container text-on-secondary-container px-4 py-2 rounded-full text-xs font-bold tracking-[0.2em] uppercase mb-6">
                    23–25 December 2026 • Nouakchott
                </span>

                <h1 class="text-4xl md:text-7xl font-black text-white leading-tight tracking-tighter mb-6">
                    International Conference on
                    <span class="text-primary-fixed">Artificial Intelligence</span>
                    and its
                    <span class="text-secondary-fixed">Practical Applications</span>
                </h1>

                <p class="text-white/85 text-lg md:text-xl max-w-3xl leading-relaxed mb-10">
                    A premier platform for researchers, academics and professionals to discuss advances in AI,
                    digital transformation, ethics, and real-world applications in developing countries.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('call_for_papers') }}" class="bg-primary text-on-primary px-8 py-4 rounded-xl font-bold text-sm uppercase tracking-widest">
                        Submit Paper
                    </a>
                    <a href="{{ route('registration') }}" class="bg-white/10 border border-white/20 text-white px-8 py-4 rounded-xl font-bold text-sm uppercase tracking-widest backdrop-blur-md">
                        Register Now
                    </a>
                </div>


<div class="info-container">

  <!-- Dates -->
  <div class="info-item">
    <div class="icon-circle">
      <span class="material-symbols-outlined">calendar_today</span>
    </div>
    <div>
      <p class="label">Dates</p>
      <p class="value">23–25 Dec 2026</p>
    </div>
  </div>

  <!-- Location -->
  <div class="info-item">
    <div class="icon-circle">
      <span class="material-symbols-outlined">location_on</span>
    </div>
    <div>
      <p class="label">Location</p>
      <p class="value">Convention Center, Nouakchott</p>
    </div>
  </div>

</div>

<!-- Organizer Card -->
<div class="organizer-card">
  <img src="{{ asset('images/logo.png') }}" alt="FST Logo" width="80" height="80">

  <p>
    Organized by the
    <strong>Faculty of Sciences and Techniques (FST)</strong>,
    Nouakchott University, Mauritania.
  </p>
</div>

            </div>
        </div>
    </section>
    <!-- Vertical News Ticker Section -->
<section class="bg-surface-container-low border-b border-outline-variant/10 py-4 overflow-hidden">
<div class="max-w-7xl mx-auto px-8 flex items-center gap-8">
<div class="flex-shrink-0 flex items-center gap-3">
<div class="w-2 h-2 rounded-full bg-error animate-pulse"></div>
<span class="font-headline font-bold text-on-surface tracking-widest text-xs uppercase">Latest News</span>
</div>
<div class="h-10 w-px bg-outline-variant/30"></div>
<div class="flex-1 h-8 overflow-hidden relative news-ticker-container">
<div class="animate-ticker-horizontal flex whitespace-nowrap gap-12">
<div class="flex items-center gap-12">
<p class="text-sm font-medium text-on-surface-variant">Deadline for abstract submission extended to May 30th</p>
<p class="text-sm font-medium text-on-surface-variant">Keynote speakers confirmed for the Opening Ceremony</p>
<p class="text-sm font-medium text-on-surface-variant">Early Bird Registration now open!</p>
</div>
<!-- Duplicate for infinite effect -->
<div class="flex items-center gap-12">
<p class="text-sm font-medium text-on-surface-variant">Deadline for abstract submission extended to May 30th</p>
<p class="text-sm font-medium text-on-surface-variant">Keynote speakers confirmed for the Opening Ceremony</p>
<p class="text-sm font-medium text-on-surface-variant">Early Bird Registration now open!</p>
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
<h2 class="font-headline text-3xl font-bold text-on-surface mb-4">Academic Excellence</h2>
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


<section class="bg-primary py-16 text-on-primary">
<div class="max-w-screen-2xl mx-auto px-8 flex flex-col md:flex-row items-center justify-between gap-12">
<div class="max-w-sm">
<h2 class="text-4xl font-headline font-bold leading-tight">The countdown to innovation has begun.</h2>
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
<section class="py-24 bg-surface">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="asymmetric-grid gap-20 items-start">
<div class="space-y-8 sticky top-32">
<h2 class="text-5xl font-headline font-bold text-emerald-900">Bridging the AI Divide</h2>
<div class="h-1 w-24 bg-primary"></div>
<p class="text-xl leading-relaxed text-on-surface-variant font-medium">
                            I2COMSAPP 2026 addresses the transformative power of Artificial Intelligence specifically through the lens of developing nations.
                        </p>
</div>
<div class="space-y-12">
<div class="bg-surface-container-low p-10 rounded-xl relative overflow-hidden group">
<div class="absolute top-0 right-0 p-8 text-primary/10">
<span class="material-symbols-outlined text-8xl" data-icon="diversity_3">diversity_3</span>
</div>
<h3 class="text-2xl font-bold mb-4 text-emerald-800">Our Vision</h3>
<p class="text-lg leading-relaxed text-on-surface-variant mb-6">
                                The conference provides a premier interdisciplinary platform for researchers, practitioners, and educators to present and discuss the most recent innovations, trends, and concerns as well as practical challenges encountered and solutions adopted in the fields of AI.
                            </p>
<div class="grid grid-cols-2 gap-8 pt-6">
<div class="space-y-2">
<h4 class="font-bold text-primary">Knowledge Hub</h4>
<p class="text-sm">Fostering intensive networking and scientific knowledge sharing across borders.</p>
</div>
<div class="space-y-2">
<h4 class="font-bold text-primary">Ethical AI</h4>
<p class="text-sm">Exploring deep ethical considerations unique to regional digital transformation.</p>
</div>
</div>
</div>
<div class="flex gap-8 items-center bg-secondary-container p-1 text-on-secondary-container rounded-xl overflow-hidden shadow-xl">
<div class="bg-white/10 p-8 backdrop-blur-md">
<span class="material-symbols-outlined text-5xl" data-icon="auto_graph">auto_graph</span>
</div>
<div class="pr-8 py-6">
<p class="text-xl font-bold italic">"Empowering the next generation of researchers to solve local problems with global technologies."</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Topics Section - Bento Grid Layout -->
<section class="py-24 bg-surface-container-low">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="flex justify-between items-end mb-16">
<div class="max-w-2xl">
<p class="text-primary font-bold tracking-widest uppercase text-sm mb-4">Research Domains</p>
<h2 class="text-5xl font-headline font-bold text-emerald-900">Conference Pillars</h2>
</div>
<a href="{{ route('call_for_papers') }}" class="flex items-center gap-2 text-primary font-bold hover:underline">
                        View Detailed Call <span class="material-symbols-outlined" data-icon="arrow_right_alt">arrow_right_alt</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-3 gap-4">
<!-- Topic 1 -->
<div class="md:col-span-2 md:row-span-2 bg-surface-container-highest p-8 rounded-xl flex flex-col justify-between hover:bg-primary transition-all group cursor-default">
<span class="material-symbols-outlined text-primary group-hover:text-white text-5xl" data-icon="account_balance">account_balance</span>
<div>
<h3 class="text-2xl font-bold mb-2 group-hover:text-white">Digital Economy-Oriented AI</h3>
<p class="text-on-surface-variant group-hover:text-white/80">Models for financial prediction, market analysis, and digital trade in emerging markets.</p>
</div>
</div>
<!-- Topic 2 -->
<div class="bg-surface-container p-6 rounded-xl border border-outline-variant/20 flex flex-col gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="face">face</span>
<h3 class="font-bold text-emerald-900">AI for Biometrics</h3>
<p class="text-xs text-on-surface-variant">Identity management and secure recognition systems.</p>
</div>
<!-- Topic 3 -->
<div class="bg-surface-container p-6 rounded-xl border border-outline-variant/20 flex flex-col gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="medical_services">medical_services</span>
<h3 class="font-bold text-emerald-900">AI/ML in Healthcare</h3>
<p class="text-xs text-on-surface-variant">Predictive diagnostics and personalized patient care.</p>
</div>
<!-- Topic 4 -->
<div class="bg-surface-container-highest p-6 rounded-xl flex flex-col gap-4">
<span class="material-symbols-outlined text-tertiary" data-icon="school">school</span>
<h3 class="font-bold text-emerald-900">AI in Education</h3>
<p class="text-xs text-on-surface-variant">Adaptive learning platforms and classroom analytics.</p>
</div>
<!-- Topic 5 -->
<div class="md:col-span-1 bg-surface-container p-6 rounded-xl border border-outline-variant/20 flex flex-col gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="precision_manufacturing">precision_manufacturing</span>
<h3 class="font-bold text-emerald-900">Autonomous Systems</h3>
<p class="text-xs text-on-surface-variant">Robotics, UAVs, and self-driving technologies.</p>
</div>
<!-- Topic 6 -->
<div class="md:col-span-2 bg-primary-container/10 p-8 rounded-xl flex items-center justify-between gap-6 border-l-4 border-primary">
<div class="flex flex-col gap-2">
<h3 class="text-xl font-bold text-emerald-900">Oil &amp; Gas / Mining</h3>
<p class="text-sm text-on-surface-variant">Resource optimization and predictive maintenance in industrial sectors.</p>
</div>
<span class="material-symbols-outlined text-primary text-4xl" data-icon="oil_barrel">oil_barrel</span>
</div>
<!-- Topic 7 -->
<div class="bg-surface-container p-6 rounded-xl border border-outline-variant/20 flex flex-col gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="agriculture">agriculture</span>
<h3 class="font-bold text-emerald-900">Agriculture</h3>
<p class="text-xs text-on-surface-variant">Precision farming and crop yield prediction.</p>
</div>
<!-- Topic 8 -->
<div class="bg-surface-container p-6 rounded-xl border border-outline-variant/20 flex flex-col gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="accessible">accessible</span>
<h3 class="font-bold text-emerald-900">Disability Support</h3>
<p class="text-xs text-on-surface-variant">Assistive AI for inclusivity and accessibility.</p>
</div>
<!-- Topic 9 -->
<div class="bg-surface-container p-6 rounded-xl border border-outline-variant/20 flex flex-col gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="model_training">model_training</span>
<h3 class="font-bold text-emerald-900">Generative AI</h3>
<p class="text-xs text-on-surface-variant">Creative models and content generation ethics.</p>
</div>
<!-- Topic 10 -->
<div class="bg-surface-container p-6 rounded-xl border border-outline-variant/20 flex flex-col gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="cloud">cloud</span>
<h3 class="font-bold text-emerald-900">Cloud Computing</h3>
<p class="text-xs text-on-surface-variant">Distributed AI architectures and network security.</p>
</div>
</div>
</div>
</section>
<!-- Featured Speakers Section -->
<section class="py-24 bg-surface">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="mb-16">
<p class="text-primary font-bold tracking-widest uppercase text-sm mb-4">Eminent Minds</p>
<h2 class="text-5xl font-headline font-bold text-emerald-900">Keynote Speakers</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Speaker 1 -->
<div class="group relative bg-surface-container-low rounded-xl overflow-hidden border border-outline-variant/10 transition-all hover:shadow-xl">
<div class="aspect-[4/5] overflow-hidden bg-surface-dim">
<img alt="Dr. Amadou Ba" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtOAcrpaAPbZHUDbfTRFmXFlYSHZ4mw8Mep0XxrcbOax9CO8pH0WVeOT5xAlHH3OUktILBufA0fHD-y6RkyQ-X4ikXm4qsut4wDNVugglaS-W4qHK4EZbqB-4LB6GKcEnUT3HTnpKQXJUFP12GUsAdONB73ZiOmBic_F16gXzsTNVYR_jit8rLds5PQ9WMVrS_gHqv5t7kEWFSOTg8mWiQQ8ADutflXNP6E8KZNPOyupCQWfrlEAlb02KHid6Gz522E7MxbZES89o"/>
</div>
<div class="p-6">
<h3 class="text-xl font-headline font-bold text-emerald-900">Dr. Amadou Ba</h3>
<p class="text-primary font-bold text-xs uppercase tracking-wider mb-3">Professor of Computer Science</p>
<p class="text-sm font-semibold text-on-surface-variant mb-4">University of Nouakchott</p>
<p class="text-sm text-on-surface-variant leading-relaxed opacity-80">Specialist in NLP and African languages processing, focusing on bridge technologies for rural development.</p>
</div>
</div>
<!-- Speaker 2 -->
<div class="group relative bg-surface-container-low rounded-xl overflow-hidden border border-outline-variant/10 transition-all hover:shadow-xl">
<div class="aspect-[4/5] overflow-hidden bg-surface-dim">
<img alt="Dr. Elena Petrova" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-8fqL4WoE1qaqlTsL4OkbMwtdehfrfO4CmXI2fh5exk9kmcx0MBzy5cBoiW_k4KKlI9My03xHyns32J8yEjH5iJZgA6xznKqkYCcsywV-ytCccmOSbm25qJ8VNB_Q9Wk-W-8Jej6bOmcS566wUir97DzFOwR8lxOpd6veqj4Fp2gM28BFCpGP9UzINMmTdmqWAYEUPnPOV8UjihJgQenTAQK1tU-FI7EBg568-1LUSsncJhALrNlJVS_B-8r_74_nT1iFXXcPuR8"/>
</div>
<div class="p-6">
<h3 class="text-xl font-headline font-bold text-emerald-900">Dr. Elena Petrova</h3>
<p class="text-primary font-bold text-xs uppercase tracking-wider mb-3">Lead AI Researcher</p>
<p class="text-sm font-semibold text-on-surface-variant mb-4">Global Tech Institute, London</p>
<p class="text-sm text-on-surface-variant leading-relaxed opacity-80">Pioneer in Ethical AI frameworks and algorithmic transparency in public sector decision-making.</p>
</div>
</div>
<!-- Speaker 3 -->
<div class="group relative bg-surface-container-low rounded-xl overflow-hidden border border-outline-variant/10 transition-all hover:shadow-xl">
<div class="aspect-[4/5] overflow-hidden bg-surface-dim">
<img alt="Prof. Marcus Chen" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBREjwwflLFyY62vpQP4IUBWHpWMi51xkyRdGoLvdFSbgLZ5NQ2X3hOimTFZ5sA5iBXrQSNErxc3z7lMdkxIaDoEHTYWtVXPAW5CpZq_Cb4Dr_dSks6DJIMAaWGntLJ1j824_rnmTNyKTseKHJ_DwLdj4H65YogQv6s0aEK5XoWRwUxmJJ5y95Z-txeTp55a1yoQGCyUNnP4YLR_yDVRhVelEUubg1xsTwgG2D773xPN6_-T5Vbhh1-tuJWnPK_UmtcjfHNI4Yfh50"/>
</div>
<div class="p-6">
<h3 class="text-xl font-headline font-bold text-emerald-900">Prof. Marcus Chen</h3>
<p class="text-primary font-bold text-xs uppercase tracking-wider mb-3">Chair of Cyber-Physical Systems</p>
<p class="text-sm font-semibold text-on-surface-variant mb-4">MIT Research Labs</p>
<p class="text-sm text-on-surface-variant leading-relaxed opacity-80">Expert in autonomous robotics and AI-driven predictive maintenance for industrial infrastructures.</p>
</div>
</div>
<!-- Speaker 4 -->
<div class="group relative bg-surface-container-low rounded-xl overflow-hidden border border-outline-variant/10 transition-all hover:shadow-xl">
<div class="aspect-[4/5] overflow-hidden bg-surface-dim">
<img alt="Dr. Sarah Al-Farsi" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3Qid6ZuX_f7UUFgpPdmsnPLnwJAyudxZM_hmrDJ1GIJ9gdAq1A-odiz5XwFXy-AkU7yxwjre_CCt-u8qoa9jGA1gj4PEh9IJBJ1IAxvt6kH3lduRgeYQv-LV3EE-11YyFeWflUr3qtr1O_oT-2bxpkJVdBou_H_yfNjLrWPwncttZGIGntmjP6U18Gi327OiUlWnl1Ksfhl_2TwNV8xwxRIVSosi4R4UrAdsMgd-2Vr3hWiNOHk3m6d-ePtaJp_-FsbsnzllG4fg"/>
</div>
<div class="p-6">
<h3 class="text-xl font-headline font-bold text-emerald-900">Dr. Sarah Al-Farsi</h3>
<p class="text-primary font-bold text-xs uppercase tracking-wider mb-3">Director of Health AI</p>
<p class="text-sm font-semibold text-on-surface-variant mb-4">Medical Research Council</p>
<p class="text-sm text-on-surface-variant leading-relaxed opacity-80">Focuses on leveraging ML for disease outbreak prediction and personalized diagnostics in resource-limited settings.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Important Dates Timeline -->
<section class="py-24 bg-surface-container-low">
<div class="max-w-screen-2xl mx-auto px-8">
<div class="mb-16 text-center max-w-2xl mx-auto">
<h2 class="text-5xl font-headline font-bold text-emerald-900 mb-6">Submission Timeline</h2>
<p class="text-on-surface-variant font-medium">Keep track of these critical milestones to ensure your research is part of I2COMSAPP 2026.</p>
</div>
<div class="relative pt-12">
<!-- Progress Line -->
<div class="absolute top-1/2 left-0 w-full h-0.5 bg-outline-variant/20 hidden md:block"></div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-8">
<!-- Date 1 -->
<div class="relative group">
<div class="bg-surface-container-high p-8 rounded-xl border-b-4 border-primary transition-all group-hover:-translate-y-2 group-hover:shadow-2xl z-10 relative">
<span class="text-primary font-bold text-sm tracking-tighter block mb-2 font-headline">June 15, 2026</span>
<h4 class="text-xl font-bold text-emerald-900 mb-4">Paper Submission</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">Deadline for submitting full research papers for peer review.</p>
</div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-primary ring-8 ring-background hidden md:block z-20"></div>
</div>
<!-- Date 2 -->
<div class="relative group">
<div class="bg-surface-container-high p-8 rounded-xl border-b-4 border-secondary transition-all group-hover:-translate-y-2 group-hover:shadow-2xl z-10 relative">
<span class="text-secondary font-bold text-sm tracking-tighter block mb-2 font-headline">Aug 20, 2026</span>
<h4 class="text-xl font-bold text-emerald-900 mb-4">Acceptance Notification</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">Authors will receive decisions from the international program committee.</p>
</div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-secondary ring-8 ring-background hidden md:block z-20"></div>
</div>
<!-- Date 3 -->
<div class="relative group">
<div class="bg-surface-container-high p-8 rounded-xl border-b-4 border-tertiary transition-all group-hover:-translate-y-2 group-hover:shadow-2xl z-10 relative">
<span class="text-tertiary font-bold text-sm tracking-tighter block mb-2 font-headline">Oct 10, 2026</span>
<h4 class="text-xl font-bold text-emerald-900 mb-4">Camera-Ready Paper</h4>
<p class="text-sm text-on-surface-variant leading-relaxed">Final versions of accepted papers must be submitted by this date.</p>
</div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-tertiary ring-8 ring-background hidden md:block z-20"></div>
</div>
<!-- Date 4 -->
<div class="relative group">
<div class="bg-primary text-on-primary p-8 rounded-xl border-b-4 border-emerald-900 transition-all group-hover:-translate-y-2 group-hover:shadow-2xl z-10 relative">
<span class="text-white/60 font-bold text-sm tracking-tighter block mb-2 font-headline">Dec 23-25, 2026</span>
<h4 class="text-xl font-bold mb-4">Conference Main Dates</h4>
<p class="text-sm text-white/80 leading-relaxed">Join us in Nouakchott for the flagship event and keynote sessions.</p>
</div>
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-emerald-900 ring-8 ring-background hidden md:block z-20"></div>
</div>
</div>
</div>
</div>
</section>
<!-- Final CTA/Sponsors Preview -->
<section class="py-20 bg-emerald-900 text-white overflow-hidden relative">
<div class="absolute top-0 right-0 w-1/2 h-full opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[400px]" data-icon="hub">hub</span>
</div>
<div class="max-w-screen-2xl mx-auto px-8 relative z-10">
<div class="flex flex-col md:flex-row items-center justify-between gap-12">
<div class="max-w-2xl">
<h2 class="text-4xl md:text-5xl font-headline font-bold mb-6">Ready to shape the future of AI in Africa?</h2>
<p class="text-xl text-emerald-100 font-medium mb-8">Download the template and submit your research today. Be part of the conversation that matters.</p>
<div class="flex flex-wrap gap-4">
<a href="{{ route('call_for_papers') }}" class="bg-white text-emerald-900 px-8 py-4 rounded-xl font-bold inline-flex items-center gap-2 hover:bg-emerald-50 transition-colors">
<span class="material-symbols-outlined" data-icon="download">download</span>
                                Paper template &amp; formats
                            </a>
<a href="{{ route('call_for_papers') }}" class="border border-emerald-500 text-emerald-100 px-8 py-4 rounded-xl font-bold hover:bg-emerald-800 transition-colors inline-flex items-center justify-center">
                                Submission guide
                            </a>
</div>
</div>
<div class="bg-white/5 backdrop-blur-xl p-10 rounded-2xl border border-white/10 w-full md:w-auto">
<h3 class="text-sm uppercase tracking-widest font-bold text-emerald-300 mb-8 text-center">Platinum Sponsors</h3>
<div class="grid grid-cols-2 gap-12 items-center grayscale invert opacity-70">
<div class="h-12 w-32 bg-stone-300 rounded flex items-center justify-center font-bold text-black text-xs">TECH LOGO 1</div>
<div class="h-12 w-32 bg-stone-300 rounded flex items-center justify-center font-bold text-black text-xs">UNIVERSITY LOGO</div>
</div>
</div>
</div>
</div>
</section>
</main>
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
</script>
@endpush


