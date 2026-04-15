@extends('base')

@section('title', 'Call for Papers')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-5xl font-black tracking-tighter mb-8">Call for Papers</h1>
        <p class="text-lg text-on-surface-variant mb-10">
            Submit your abstracts and research papers related to AI, digital transformation, ethics, and practical applications.
        </p>

        <form action="{{ route('paper.submit') }}" method="POST" class="grid gap-6 bg-white p-8 rounded-xl shadow-lg">
            @csrf

            <input type="text" name="author_name" placeholder="Author Name" class="rounded-lg border-gray-300">
            <input type="email" name="email" placeholder="Email" class="rounded-lg border-gray-300">
            <input type="text" name="paper_title" placeholder="Paper Title" class="rounded-lg border-gray-300">
            <textarea name="abstract" rows="6" placeholder="Abstract" class="rounded-lg border-gray-300"></textarea>

            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-xl font-bold">
                Submit Abstract
            </button>
        </form>
    </div>
</main>
@endsection


