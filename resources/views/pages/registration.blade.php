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


            <!-- Visa & Registration Info -->
<div class="bg-yellow-100 border-l-4 border-yellow-200 p-6 rounded-lg mb-8">

    <p class="text-yellow-800 mb-4">
        For your visa application, please proceed through the following link as soon as you receive the official supporting letter from the conference organizers:
    </p>

    <p class="text-yellow-900 font-semibold mb-4">
        🔗 <a href="https://anrpts.gov.mr/fr/visa/requestvisa" class="underline hover:text-yellow-700">Application link</a>
    </p>

    <p class="text-yellow-800 mb-4">
        Once you’ve submitted your application, kindly share the tracking number with us so we can assist with the follow-up process.
    </p>

    <p class="text-yellow-900 font-bold mb-4">
        At least one author of each paper must be registered to the I2COMSAPP Conference.
    </p>

    <div class="bg-white p-4 rounded-lg border border-yellow-300 mb-4">
        <p class="font-bold text-gray-800 mb-2">📧 Registration Contact</p>
        <p class="text-gray-700">Email: i2comm2025@gmail.com</p>
        <p class="text-gray-700">WhatsApp: +222 46 76 88 11</p>
    </div>

    <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded-lg">
        <p class="text-red-900 font-bold mb-2">📅 Important Deadlines</p>
        <p class="text-red-800">• Registration deadline: September 30, 2025</p>
        <p class="text-red-800">• Authors’ registration deadline: September 15, 2025 (extended to September 20, 2025)</p>
    </div>

</div>



<div class="grid md:grid-cols-3 gap-8 mb-16">

    <!-- Authors -->
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl border-2 border-blue-300 relative overflow-hidden">
        <div class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-1 rounded-full text-sm font-bold">
            Authors
        </div>

        <h3 class="text-2xl font-bold text-blue-900 mb-6">Authors</h3>

        <div class="mb-6">
            <p class="text-gray-700 font-bold mb-2">Student</p>
            <p class="text-3xl font-bold text-green-600">FREE</p>
            <p class="text-gray-600 text-sm">For those attending the conference</p>

            <p class="text-2xl font-bold text-blue-600 mt-4">50 USD</p>
            <p class="text-gray-600 text-sm">For those presenting remotely</p>
        </div>

        <hr class="my-6">

        <div class="mb-6">
            <p class="text-gray-700 font-bold mb-2">Non-student</p>
            <p class="text-3xl font-bold text-blue-600">100 USD</p>
            <p class="text-gray-600 text-sm">(≈ 4000 MRU)</p>
        </div>

        <ul class="space-y-2 text-sm text-gray-700 mb-8">
            <li>✓ Conference Daily Lunch</li>
            <li>✓ Coffee Breaks</li>
            <li>✓ Attendance certificate in Arabic and English</li>
        </ul>

        <a href="#"
           target="_blank"
           class="block text-center bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">
            Register Now
        </a>
    </div>

    <!-- Attendees -->
    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl border-2 border-purple-600 relative overflow-hidden ring-2 ring-purple-300">
        <div class="absolute top-4 right-4 bg-purple-600 text-white px-4 py-1 rounded-full text-sm font-bold">
            Attendees
        </div>

        <h3 class="text-2xl font-bold text-purple-900 mb-6">Attendees (Non-authors)</h3>

        <div class="mb-6">
            <p class="text-gray-700 font-bold mb-2">Student</p>
            <p class="text-3xl font-bold text-purple-600">75 USD</p>
            <p class="text-gray-600 text-sm">(≈ 3000 MRU)</p>
        </div>

        <hr class="my-6">

        <div class="mb-6">
            <p class="text-gray-700 font-bold mb-2">Non-student</p>
            <p class="text-3xl font-bold text-purple-600">150 USD</p>
            <p class="text-gray-600 text-sm">(≈ 6000 MRU)</p>
        </div>

        <ul class="space-y-2 text-sm text-gray-700 mb-8">
            <li>✓ Conference access</li>
            <li>✓ Conference Daily Lunch</li>
            <li>✓ Coffee Breaks</li>
            <li>✓ Attendance certificate in Arabic and English</li>
        </ul>

        <a href="#"
           target="_blank"
           class="block text-center bg-purple-600 text-white py-3 rounded-xl font-bold hover:bg-purple-700 transition">
            Register Now
        </a>
    </div>

    <!-- Workshops Registration -->
    <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-8 rounded-2xl border-2 border-cyan-300 relative overflow-hidden">
        <div class="absolute top-4 right-4 bg-cyan-600 text-white px-4 py-1 rounded-full text-sm font-bold">
            Workshops
        </div>

        <h3 class="text-2xl font-bold text-cyan-900 mb-6">Workshops Registration</h3>

        <div class="mb-6">
            <p class="text-gray-700 font-bold mb-2">Student</p>
            <p class="text-3xl font-bold text-cyan-600">50 USD</p>
            <p class="text-gray-600 text-sm">(≈ 2000 MRU)</p>
        </div>

        <hr class="my-6">

        <div class="mb-6">
            <p class="text-gray-700 font-bold mb-2">Non-student</p>
            <p class="text-3xl font-bold text-cyan-600">100 USD</p>
            <p class="text-gray-600 text-sm">(≈ 4000 MRU)</p>
        </div>

        <ul class="space-y-2 text-sm text-gray-700 mb-8">
            <li>✓ Conference Daily Lunch</li>
            <li>✓ Coffee Breaks</li>
            <li>✓ Attendance certificate in Arabic and English</li>
        </ul>

        <a href="#"
           target="_blank"
           class="block text-center bg-cyan-600 text-white py-3 rounded-xl font-bold hover:bg-cyan-700 transition">
            Register Now
        </a>
    </div>

</div>

<p class="text-gray-700 font-semibold mb-8">
            For I2COMSAPP registration fee payment, please make the relevant amount transfer to the following account:
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl border-2 border-blue-200">
                <h4 class="text-xl font-bold text-blue-700 mb-4">From outside Mauritania</h4>
                <p class="text-gray-700"><strong>Bank name:</strong> Banque Islamique de Mauritanie (BIM)</p>
                <p class="text-gray-700"><strong>Bank address:</strong> Zone Universitaire N° : 0333 TVZ, Nouakchott, Mauritania</p>
                <p class="text-gray-700"><strong>Bank holder name:</strong> Association Ibtikar</p>
                <p class="text-gray-700"><strong>Compte RIB:</strong> 00015 00001 210 095093 01 88</p>
                <p class="text-gray-700"><strong>IBAN:</strong> MR1300015 00001 210 095093 01 88</p>
                <p class="text-gray-700"><strong>SWIFT:</strong> BIMMMRMRXXX</p>
            </div>

            <div class="bg-white p-6 rounded-xl border-2 border-green-200">
                <h4 class="text-xl font-bold text-green-700 mb-4">From inside Mauritania</h4>
                <p class="text-gray-700">
                    Transfer to the following Bankily or Sedad number:
                    <strong class="text-green-800 text-lg">44808416</strong>
                </p>
            </div>
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
