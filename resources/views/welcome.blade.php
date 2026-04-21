{{--
    Deprecated duplicate of the public landing experience.
    The application uses resources/views/home.blade.php for /. This file is kept only so
    old references in docs or tooling do not break; it is not routed by default.
--}}
@extends('base')

@section('title', 'I2COMSAPP 2026')

@section('content')
<main class="pt-28 px-6 max-w-lg mx-auto text-center">
    <p class="text-on-surface text-lg mb-6">
        The conference site lives on the <a href="{{ route('home') }}" class="text-primary font-semibold underline">home page</a>.
        Workshop highlights are under <strong>Hands-on Workshops</strong> there.
    </p>
    <p class="text-sm text-on-surface-variant">
        <a href="{{ route('home') }}#hands-on-workshops" class="underline">Jump to Hands-on Workshops</a>
        ·
        <a href="{{ route('workshops') }}" class="underline">Workshop listings (CMS)</a>
    </p>
</main>
@endsection
