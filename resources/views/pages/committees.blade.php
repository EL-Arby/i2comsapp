@extends('base')

@section('title', 'Committees')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-5xl font-black tracking-tighter mb-10">Committees</h1>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow">
                <h2 class="text-2xl font-bold mb-4">Scientific Committee</h2>
                <ul class="space-y-3 text-on-surface-variant">
                    <li>Prof. Member 1</li>
                    <li>Prof. Member 2</li>
                    <li>Prof. Member 3</li>
                </ul>
            </div>

            <div class="bg-white p-8 rounded-xl shadow">
                <h2 class="text-2xl font-bold mb-4">Organizing Committee</h2>
                <ul class="space-y-3 text-on-surface-variant">
                    <li>Chairperson 1</li>
                    <li>Coordinator 2</li>
                    <li>Secretary 3</li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection
