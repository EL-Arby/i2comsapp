<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'I2COMSAPP 2026')</title>

    <link href="{{ asset('css/templatemo-topic-listing.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;900&family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-container": "#eaf0e6",
                        "surface-container-high": "#e4eae1",
                        "surface-dim": "#d6dcd3",
                        "surface-tint": "#006d35",
                        "on-primary-fixed": "#00210c",
                        "tertiary-fixed-dim": "#2ddbde",
                        "tertiary-container": "#008284",
                        "surface-bright": "#f5fbf2",
                        "on-tertiary": "#ffffff",
                        "inverse-primary": "#6edd8d",
                        "tertiary": "#006768",
                        "secondary-fixed": "#dae2ff",
                        "on-primary-fixed-variant": "#005227",
                        "on-background": "#171d18",
                        "on-error": "#ffffff",
                        "outline-variant": "#bdcabc",
                        "secondary-fixed-dim": "#b2c5ff",
                        "primary": "#006b34",
                        "tertiary-fixed": "#5af8fb",
                        "secondary": "#0054cd",
                        "outline": "#6e7a6e",
                        "on-secondary-fixed-variant": "#0040a1",
                        "background": "#f5fbf2",
                        "surface-container-low": "#eff5ec",
                        "error": "#ba1a1a",
                        "inverse-on-surface": "#ecf3e9",
                        "surface-container-lowest": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-primary": "#ffffff",
                        "on-surface": "#171d18",
                        "on-surface-variant": "#3e4a3f",
                        "inverse-surface": "#2c322c",
                        "on-secondary": "#ffffff",
                        "surface": "#f5fbf2",
                        "primary-fixed": "#8afaa7",
                        "on-secondary-container": "#fefcff",
                        "secondary-container": "#316ee9",
                        "on-error-container": "#93000a",
                        "on-secondary-fixed": "#001847",
                        "surface-variant": "#dee4db",
                        "primary-container": "#008643",
                        "surface-container-highest": "#dee4db",
                        "on-primary-container": "#f6fff3",
                        "on-tertiary-container": "#f3fffe",
                        "on-tertiary-fixed": "#002020",
                        "on-tertiary-fixed-variant": "#004f51",
                        "primary-fixed-dim": "#6edd8d",
                        "brand-blue": "#77b",
                        "brand-dark": "#000",
                        "brand-light": "#ccd",
                        "brand-accent": "#448",
                        "brand-hover": "#fff"
                    },
                    borderRadius: {
                        DEFAULT: "0.125rem",
                        lg: "0.25rem",
                        xl: "0.5rem",
                        full: "0.75rem"
                    },
                    fontFamily: {
                        headline: ["Space Grotesk"],
                        body: ["Manrope"],
                        label: ["Manrope"]
                    }
                }
            }
        }
    </script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="bg-surface text-on-surface selection:bg-primary selection:text-on-primary">

    @include('partials.navbar')

    @if (session('success'))
        <div class="fixed top-24 right-6 z-50 bg-green-600 text-white px-4 py-3 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif
    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
