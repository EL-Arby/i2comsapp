@extends('base')

@section('title', $settings['call_for_papers_title'] ?? 'Call for Papers')

@section('content')
@php
    $settings = $settings ?? [];
    $brochurePath = $settings['call_for_papers_brochure_path'] ?? 'storage/I2comsapp2024_Call4Papers.pdf';
    $bodyHtml = $settings['call_for_papers_body'] ?? null;
    $guidelinesText = $settings['call_for_papers_guidelines'] ?? "📝 Format: PDF or Word document (max 8 pages)\n📎 Font: Times New Roman, 12pt, 1.5 line spacing\n🏷️ Language: English (abstracts welcome in French or Arabic)\n👥 Authorship: Maximum 5 authors per paper\n📧 Correspondence: Provide email for all co-authors";
    // Admin-managed flags
    $enabled = isset($settings['call_for_papers_enabled']) ? filter_var($settings['call_for_papers_enabled'], FILTER_VALIDATE_BOOLEAN) : true;
    $forceOpen = isset($settings['call_for_papers_force_open']) ? filter_var($settings['call_for_papers_force_open'], FILTER_VALIDATE_BOOLEAN) : false;

    // Deadline parsing
    try {
        $abstractDeadline = isset($settings['call_for_papers_abstract_deadline']) ? \Carbon\Carbon::parse($settings['call_for_papers_abstract_deadline'])->endOfDay() : null;
    } catch (Exception $e) {
        $abstractDeadline = null;
    }
    $now = \Carbon\Carbon::now();
    $submissionOpen = $forceOpen || ($abstractDeadline ? $now->lte($abstractDeadline) : false);
@endphp
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    @if ($bodyHtml)
        {!! $bodyHtml !!}
    @else
    <div class="max-w-5xl mx-auto">
        <!-- Header Section -->
        <div class="mb-16">
            <h1 class="text-6xl font-black text-zinc-950 mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">{{ $settings['call_for_papers_heading'] ?? 'Important Dates ' }}</h1>
            {{-- <p class="text-xl text-gray-600 font-medium max-w-3xl">
                {{ $settings['call_for_papers_lead'] ?? 'Submit your abstracts and research papers related to AI, digital transformation, ethics, and practical applications in developing nations.' }}
            </p> --}}
        </div>

        <!-- Important Dates -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-xl border border-blue-200">
                <h3 class="font-bold text-blue-600 text-sm uppercase tracking-widest mb-2">Paper Submission</h3>
                <p class="text-2xl font-bold text-blue-900">{{ $settings['call_for_papers_abstract_deadline'] ?? 'August 31, 2026' }}</p>
            </div>

            <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-8 rounded-xl border border-cyan-300">
                <h3 class="font-bold text-cyan-600 text-sm uppercase tracking-widest mb-2">Acceptance Decision</h3>
                <p class="text-2xl font-bold text-cyan-900">{{ $settings['call_for_papers_notification_deadline'] ?? 'November 15, 2026' }}</p>
            </div>
                        <div class="bg-gradient-to-br from-purple-50 to-cyan-50 p-8 rounded-xl border border-purple-200">
                <h3 class="font-bold text-purple-600 text-sm uppercase tracking-widest mb-2">Camera Ready & Registration</h3>
                <p class="text-2xl font-bold text-purple-900">{{ $settings['call_for_papers_full_deadline'] ?? 'October 15, 2026' }}</p>
            </div>
        </div>

<!-- Submission -->
<div id="Submission" class="bg-white">

    <h2 class="text-3xl font-bold text-blue-900 mb-6">Submission</h2>

    <!-- Call for Papers -->
    <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-cyan-50 p-10 rounded-2xl border-2 border-blue-300 mb-8">
        <h3 class="text-2xl font-bold text-blue-900 mb-6">📢 Call for Papers</h3>

        <p class="text-gray-700 mb-8">
            We are soliciting original contributions that align with the conference's objectives and topics,
            illustrating the latest research advancements and practical implementations of artificial intelligence
            (AI) and machine learning (ML) technologies, with a particular emphasis on their potential to drive
            positive change in developing countries.
        </p>

        <a href="{{ asset('Call4Papers-26.pdf') }}"
           target="_blank"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
            📄 Download Call for Papers
        </a>
    </div>

    <!-- Submission Guidelines -->
    <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-cyan-50 p-10 rounded-2xl border-2 border-blue-300 mb-8">
        <h3 class="text-2xl font-bold text-blue-900 mb-6">📋 Submission Guidelines</h3>

        <div class="space-y-4 text-gray-700">
            <p>• Contributions should not have been published elsewhere or be under consideration for publication.</p>
            <p>• Contributions should be written in English and formatted using Springer style template.</p>
            <p>• Contributions should be submitted in full length, between 8 and 15 pages, via the submission system.</p>
            <p>• Contributions will be rigorously peer reviewed and checked against any kind of plagiarism.</p>
        </div>
<div class="mt-8">
    <a href="{{ asset('\Microsoft+Word+LaTeX2e+Proceedings+Templates (3).zip
') }}"
       download
       class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-purple-700 transition-all shadow-md hover:shadow-lg">
        📥 Download Paper Template
    </a>
</div>
        {{-- <div class="mt-8">
            <a href="{{ asset('storage/PaperTemplates/Microsoft_Word_Proceedings_Templates.zip') }}"
               target="_blank"
               class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-purple-700 transition">
                📥 Download Paper Template
            </a>
        </div> --}}
    </div>


<!-- Submit Button -->
    <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-cyan-50 p-10 rounded-2xl border-2 border-blue-300 mb-8 text-center">
        <h3 class="text-2xl font-bold text-blue-900 mb-4">📤 Submit Your Paper</h3>

        <p class="text-gray-700 mb-8">
            Please submit your paper through the official EasyChair submission system.
        </p>

        @if ($enabled && $submissionOpen)
            <a href="https://easychair.org/conferences/?conf=i2comsapp26"
               target="_blank"
               class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-xl font-bold hover:shadow-lg transition-all">
                📤 Click to Submit Your Paper
            </a>
        @else
            <div class="p-8 bg-red-50 border border-red-200 rounded-lg">
                <p class="text-red-800 font-bold mb-2">Submissions are currently closed.</p>
                @if (! $enabled)
                    <p class="text-gray-700">The conference administrators have disabled submissions. Please check back later.</p>
                @elseif ($abstractDeadline)
                    <p class="text-gray-700">Submission deadline was {{ $abstractDeadline->toFormattedDateString() }}.</p>
                @else
                    <p class="text-gray-700">Submissions are not open at this time.</p>
                @endif
            </div>
        @endif
    </div>
    <!-- Publication -->
    <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-cyan-50 p-10 rounded-2xl border-2 border-blue-300 mb-8">
        <h3 class="text-2xl font-bold text-blue-900 mb-6">📚 Publication</h3>

        <p class="text-gray-700 mb-6">
            I2COMSAPP proceedings will be published by Springer.
        </p>

        <div class="bg-yellow-100 border-l-4 border-yellow-500 p-6 rounded-lg mb-8">
            <p class="text-yellow-900 font-bold mb-2">✅ Springer LNNS Book Series</p>
            <p class="text-yellow-800">
                All accepted and presented papers will be included in the Conference Proceedings and published by
                Springer in its indexed LNNS book series: Scopus, Web of Science, SCImago, INSPEC, etc.
            </p>
        </div>

        <a href="https://www.springer.com/series/15179"
           target="_blank"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition">
            🔗 About Springer LNNS Series
        </a>
    </div>

    

</div>


      @endif
</main>
@endsection


