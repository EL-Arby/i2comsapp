@extends('base')

@section('title', 'Registration')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-16 text-center">
            <h1 class="text-6xl font-black tracking-tighter mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Join the Conference</h1>
            <p class="text-xl text-gray-600 font-medium max-w-3xl mx-auto">
                Secure your spot at I2COMSAPP 2026 and be part of the AI revolution in Africa
            </p>
        </div>

        <!-- Registration Tiers -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <!-- Early Bird -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl border-2 border-blue-300 relative overflow-hidden">
                <div class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-1 rounded-full text-sm font-bold">Early Bird</div>
                <h3 class="text-2xl font-bold text-blue-900 mb-2">Student/Early</h3>
                <p class="text-gray-600 mb-6">Limited time offer</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-blue-600">$99</span>
                    <p class="text-gray-600 text-sm">Until June 30, 2026</p>
                </div>
                <ul class="space-y-2 text-sm text-gray-700 mb-8">
                    <li>✓ Access all 3 days</li>
                    <li>✓ Conference materials</li>
                    <li>✓ Lunch & beverages</li>
                    <li>✓ Digital certificate</li>
                </ul>
                <button class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">Register Now</button>
            </div>

            <!-- Standard -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl border-2 border-purple-600 relative overflow-hidden ring-2 ring-purple-300">
                <div class="absolute top-4 right-4 bg-purple-600 text-white px-4 py-1 rounded-full text-sm font-bold">Popular</div>
                <h3 class="text-2xl font-bold text-purple-900 mb-2">Professional</h3>
                <p class="text-gray-600 mb-6">Most popular choice</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-purple-600">$199</span>
                    <p class="text-gray-600 text-sm">Standard rate</p>
                </div>
                <ul class="space-y-2 text-sm text-gray-700 mb-8">
                    <li>✓ Access all 3 days</li>
                    <li>✓ Conference materials</li>
                    <li>✓ Networking dinner</li>
                    <li>✓ Certificate of participation</li>
                </ul>
                <button class="w-full bg-purple-600 text-white py-3 rounded-xl font-bold hover:bg-purple-700 transition">Register Now</button>
            </div>

            <!-- VIP -->
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-8 rounded-2xl border-2 border-cyan-300 relative overflow-hidden">
                <div class="absolute top-4 right-4 bg-cyan-600 text-white px-4 py-1 rounded-full text-sm font-bold">VIP Access</div>
                <h3 class="text-2xl font-bold text-cyan-900 mb-2">VIP</h3>
                <p class="text-gray-600 mb-6">Premium experience</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-cyan-600">$399</span>
                    <p class="text-gray-600 text-sm">All-inclusive</p>
                </div>
                <ul class="space-y-2 text-sm text-gray-700 mb-8">
                    <li>✓ Premium seating</li>
                    <li>✓ VIP reception</li>
                    <li>✓ One-on-one mentoring</li>
                    <li>✓ Exclusive materials</li>
                </ul>
                <button class="w-full bg-cyan-600 text-white py-3 rounded-xl font-bold hover:bg-cyan-700 transition">Register Now</button>
            </div>
        </div>

        <!-- Registration Form -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-12 rounded-2xl border border-blue-200 mb-12">
            <h2 class="text-3xl font-bold text-blue-900 mb-8">Registration Form</h2>
            <form action="{{ route('registration.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="full_name" placeholder="Full Name" class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <input type="email" name="email" placeholder="Email Address" class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="institution" placeholder="Institution / Organization" class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <input type="text" name="country" placeholder="Country" class="rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <select name="registration_type" class="w-full rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-700" required>
                    <option value="">Select Registration Type</option>
                    <option value="student">🎓 Student - $99</option>
                    <option value="professional">👨‍💼 Professional - $199</option>
                    <option value="vip">⭐ VIP - $399</option>
                </select>

                <textarea name="notes" rows="3" placeholder="Any special requirements or notes?" class="w-full rounded-lg bg-white border border-blue-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>

                <div class="flex gap-4">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all">
                        🎟️ Complete Registration
                    </button>
                    <a href="{{ route('home') }}" class="bg-white text-blue-600 border border-blue-600 px-8 py-3 rounded-xl font-bold hover:bg-blue-50 transition-all">
                        Back
                    </a>
                </div>
            </form>
        </div>

        <!-- FAQ -->
        <div class="bg-white">
            <h2 class="text-3xl font-bold text-blue-900 mb-6">❓ Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="font-bold text-blue-900 mb-2">What's included in the registration?</h3>
                    <p class="text-gray-600">All registrations include access to all conference sessions, conference materials, lunch, and digital certificate. VIP packages include additional benefits.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="font-bold text-blue-900 mb-2">Can I get a refund?</h3>
                    <p class="text-gray-600">Refunds are available up to October 1, 2026. After that date, registrations are non-refundable but transferable.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="font-bold text-blue-900 mb-2">Is accommodation included?</h3>
                    <p class="text-gray-600">Accommodation is not included. We have negotiated special rates with partner hotels available on a separate page.</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
