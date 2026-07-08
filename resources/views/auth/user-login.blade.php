@extends('base')

@section('title', 'User Login')

@section('content')
<main class="pt-24 px-6 md:px-16 pb-24 bg-white">
    <div class="mx-auto max-w-3xl rounded-3xl border border-gray-200 bg-white p-8 shadow-sm">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Login / Register</h1>
        <p class="text-gray-600 mb-6">Use your email and password to log in, or create an account if you are new.</p>

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.login.submit') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="registration_type" value="{{ $registrationType }}">

            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Login details</h2>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full rounded-2xl border border-gray-300 bg-white px-4 py-3 text-gray-900 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    </div>
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required class="w-full rounded-2xl border border-gray-300 bg-white px-4 py-3 text-gray-900 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    </div>
                </div>
                <p class="mt-4 text-sm text-gray-600">If you already have an account, use your email and password to sign in.</p>
            </div>

            <div class="rounded-3xl border border-gray-200 bg-gray-50 p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Register details (new users)</h2>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">Full Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="w-full rounded-2xl border border-gray-300 bg-white px-4 py-3 text-gray-900 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    </div>
                    <div>
                        <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">Phone</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="w-full rounded-2xl border border-gray-300 bg-white px-4 py-3 text-gray-900 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    </div>
                </div>
                <p class="mt-4 text-sm text-gray-600">If you are new, provide your name and phone to create your account automatically.</p>
            </div>

            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <input id="remember" name="remember" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="remember" class="text-sm text-gray-700">Stay signed in</label>
                </div>
                <p class="text-sm text-gray-500">Don’t have an account? The form will create one automatically with your email and password.</p>
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:justify-between">
                <a href="{{ route('registration', ['type' => $registrationType]) }}" class="inline-flex items-center justify-center rounded-2xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50">Back</a>
                <button type="submit" class="rounded-2xl bg-gradient-to-r from-blue-600 to-purple-600 px-8 py-3 text-sm font-semibold text-white shadow-sm hover:opacity-90">Log In / Register</button>
            </div>
        </form>
    </div>
</main>
@endsection
