@extends('base')

@section('title', 'Registration')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-5xl font-black tracking-tighter mb-8">Registration</h1>
        <p class="text-lg text-on-surface-variant mb-10">
            Register to attend I2COMSAPP 2026.
        </p>

        <form action="{{ route('registration.store') }}" method="POST" class="grid gap-6 bg-white p-8 rounded-xl shadow-lg">
            @csrf

            <input type="text" name="full_name" placeholder="Full Name" class="rounded-lg border-gray-300" required>
            <input type="email" name="email" placeholder="Email Address" class="rounded-lg border-gray-300" required>
            <input type="text" name="institution" placeholder="Institution" class="rounded-lg border-gray-300" required>
            <input type="text" name="country" placeholder="Country" class="rounded-lg border-gray-300">

            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-xl font-bold">
                Submit Registration
            </button>
        </form>
    </div>
</main>
@endsection
