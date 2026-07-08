@extends('base')

@section('title', 'Registration')

@section('content')
<main class="pt-32 px-8 md:px-16 pb-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-16 text-center">
            <h1 class="text-6xl font-black text-zinc-950 mb-4 bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Join the Conference</h1>
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
        At least one author of each paper must be registered to the I2COMSAPP'26 Conference.
    </p>

    <div class="bg-white p-4 rounded-lg border border-yellow-300 mb-4">
        <p class="font-bold text-gray-800 mb-2">📧 Registration Contact</p>
        <p class="text-gray-700">Email: i2comsappconf@gmail.com</p>
        <p class="text-gray-700">WhatsApp: +222 46 76 88 11</p>
    </div>

    <div class="bg-red-100 border-l-4 border-red-500 p-4 rounded-lg">
        {{-- <p class="text-red-900 font-bold mb-2">📅 Important Deadlines</p> --}}
        {{-- <p class="text-red-800">• Registration deadline: September 30, 2025</p>
        <p class="text-red-800">• Authors’ registration deadline: September 15, 2025 (extended to September 20, 2025)</p> --}}
    </div>

</div>

{{-- Success Message --}}
@if(session('success'))
<div id="successMessage"
     class="mb-8 rounded-xl border border-green-300 bg-green-50 p-5 shadow">

    <div class="flex items-center">
        <svg class="w-6 h-6 text-green-600 mr-3"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7"/>
        </svg>

        <div>
            <h3 class="font-bold text-green-700">
                Registration Successful
            </h3>

            <p class="text-green-600">
                {{ session('success') }}
            </p>
        </div>
    </div>
</div>
@endif


{{-- Validation Errors --}}
@if ($errors->any())
<div class="mb-8 rounded-xl border border-red-300 bg-red-50 p-5 shadow">

    <h3 class="font-bold text-red-700 mb-3">
        Please correct the following errors:
    </h3>

    <ul class="list-disc ml-6 text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>
@endif

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

        <button type="button"
                onclick="handleRegisterNow('author')"
                class="block w-full text-center bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">
            Register Now
        </button>
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

        <button type="button"
                onclick="handleRegisterNow('attendee')"
                class="block w-full text-center bg-purple-600 text-white py-3 rounded-xl font-bold hover:bg-purple-700 transition">
            Register Now
        </button>
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

        <button type="button"
                onclick="handleRegisterNow('workshop')"
                class="block w-full text-center bg-cyan-600 text-white py-3 rounded-xl font-bold hover:bg-cyan-700 transition">
            Register Now
        </button>
    </div>

</div>

<!--<p class="text-gray-700 font-semibold mb-8">-->
<!--            For I2COMSAPP registration fee payment, please make the relevant amount transfer to the following account:-->
<!--        </p>-->

<!--<p class="text-blue-700 font-semibold mb-8">-->
<!--Will appear here-->
<!--        </p>-->
        {{-- <div class="grid md:grid-cols-2 gap-6">
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
        </div> --}}
        {{-- </div> --}}

        <!-- Registration Form -->
        {{-- <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-12 rounded-2xl border border-blue-200 mb-12">
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
        </div> --}}

<!-- Registration Modal -->
<div id="registrationModal"
     class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-6">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl relative max-h-[90vh] overflow-y-auto">

        <div class="flex items-center justify-between px-8 py-6 border-b">
            <div>
                <h2 class="text-3xl font-bold text-blue-900">Registration Form</h2>
                <p id="registrationType" class="text-blue-600 mt-2 font-semibold"></p>
            </div>

            <button type="button"
                    onclick="closeRegistrationModal()"
                    class="text-3xl text-gray-500 hover:text-red-600">
                &times;
            </button>
        </div>

        <div class="p-6 md:p-8">
            @include('partials.registration-form', ['selectedType' => $selectedType ?? 'attendee'])
        </div>
    </div>
</div>

        {{-- <!-- Registration Modal -->
<div id="registrationModal"
     class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-6">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl relative max-h-[90vh] overflow-y-auto">

        <!-- Header -->
        <div class="flex items-center justify-between px-8 py-6 border-b">
            <div>
                <h2 class="text-3xl font-bold text-blue-900">
                    Registration Form
                </h2>

                <p id="registrationType"
                   class="text-blue-600 mt-2 font-semibold"></p>
            </div>

            <button onclick="closeRegistrationModal()"
                    class="text-3xl text-gray-500 hover:text-red-600">
                &times;
            </button>
        </div>

        <!-- Form -->
        <div class="p-8">

            <form action="{{ route('registration.store') }}"
                  method="POST"
                  class="space-y-6">

                @csrf

                <input
                    type="hidden"
                    name="category"
                    id="category">

                <div class="grid md:grid-cols-2 gap-6">

                    <input
                        type="text"
                        name="full_name"
                        placeholder="Full Name"
                        required
                        class="rounded-lg border px-4 py-3 w-full">

                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        required
                        class="rounded-lg border px-4 py-3 w-full">

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <input
                        type="text"
                        name="institution"
                        placeholder="Institution"
                        class="rounded-lg border px-4 py-3 w-full">

                    <input
                        type="text"
                        name="country"
                        placeholder="Country"
                        class="rounded-lg border px-4 py-3 w-full">

                </div>

                <textarea
                    name="notes"
                    rows="4"
                    placeholder="Special requirements..."
                    class="rounded-lg border px-4 py-3 w-full"></textarea>

                <div class="flex justify-end gap-4">

                    <button
                        type="button"
                        onclick="closeRegistrationModal()"
                        class="px-6 py-3 rounded-lg border">
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">
                        Submit Registration
                    </button>

                </div>

            </form>

        </div>

    </div>
</div> --}}
        {{-- @include('partials.registration-form', ['selectedType' => $selectedType ?? 'attendee']) --}}

        <!-- FAQ -->
        <div class="bg-white">
            <h2 class="text-3xl font-bold text-blue-900 mb-6">❓ Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="font-bold text-blue-900 mb-2">What's included in the registration?</h3>
                    <p class="text-gray-600">All registrations include access to all conference sessions, conference materials, lunch, and digital certificate.</p>
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


<script>
const userLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
const userLoginRoute = '{{ route('user.login') }}';
const userDashboardRoute = '{{ route('user.dashboard') }}';

function handleRegisterNow(type) {
    if (!userLoggedIn) {
        window.location.href = `${userLoginRoute}?type=${encodeURIComponent(type)}`;
        return;
    }

    window.location.href = userDashboardRoute;
}

function openRegistrationModal(type) {
    const modal = document.getElementById('registrationModal');
    const normalizedType = (type || 'attendee').toLowerCase();
    const typeMap = {
        author: 'author',
        attendee: 'attendee',
        att: 'attendee',
        workshop: 'workshop'
    };
    const value = typeMap[normalizedType] || normalizedType;
    const labels = {
        author: 'Author',
        attendee: 'Attendee',
        workshop: 'Workshop'
    };
    const descriptions = {
        author: 'Register as an author and secure your place at the conference.',
        attendee: 'Register as a conference attendee and join the sessions.',
        workshop: 'Register for one of the workshops and enrich your experience.'
    };

    document.getElementById('registrationType').innerText = labels[value] + ' Registration';

    const select = document.getElementById('registration_type');
    if (select) {
        select.value = value;
    }

    const badge = document.getElementById('registrationTypeBadge');
    const description = document.getElementById('registrationTypeDescription');
    if (badge) {
        badge.textContent = 'Selected: ' + labels[value];
    }
    if (description) {
        description.textContent = descriptions[value] || descriptions.attendee;
    }

    const details = document.getElementById('registrationTypeBadge');
    if (details) {
        details.textContent = 'Selected: ' + labels[value];
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.classList.add('overflow-hidden');
}

function closeRegistrationModal() {
    const modal = document.getElementById('registrationModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
}

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('registrationModal');
    const params = new URLSearchParams(window.location.search);
    const requestedType = params.get('type');
    const fromDashboard = params.get('from') === 'dashboard';

    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeRegistrationModal();
            }
        });
    }

    if (fromDashboard && requestedType) {
        openRegistrationModal(requestedType);
    }
});


@if($errors->any())
document.addEventListener('DOMContentLoaded', function () {
    openRegistrationModal('{{ old('registration_type') }}');
});
@endif

@if(session('success'))
setTimeout(function () {
    let msg = document.getElementById('successMessage');
    if(msg){
        msg.style.transition = "0.5s";
        msg.style.opacity = "0";
        setTimeout(() => msg.remove(), 500);
    }
}, 5000);
@endif
</script>



</main>
@endsection
