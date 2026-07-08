@php
    $currentUser = auth()->user();
    $defaultFirstName = old('first_name');
    $defaultLastName = old('last_name');
    if (! $defaultFirstName && $currentUser) {
        $nameParts = explode(' ', trim($currentUser->name));
        $defaultFirstName = $nameParts[0] ?? '';
        $defaultLastName = implode(' ', array_slice($nameParts, 1));
    }
    $defaultEmail = old('email', $currentUser->email ?? '');
    $defaultPhone = old('phone', $currentUser->phone ?? '');

    $allowedTypes = ['author', 'attendee', 'workshop'];
    $requestedType = old('registration_type', $selectedType ?? request()->query('type', 'attendee'));

    if (! in_array($requestedType, $allowedTypes, true)) {
        $requestedType = 'attendee';
    }

    $selectedType = $requestedType;
    $badgeLabel = match ($selectedType) {
        'author' => 'Author',
        'workshop' => 'Workshop',
        default => 'Attendee',
    };
    $descriptionText = match ($selectedType) {
        'author' => 'Register as an author and secure your place at the conference.',
        'workshop' => 'Register for one of the workshops and enrich your experience.',
        default => 'Register as a conference attendee and join the sessions.',
    };
@endphp

<section id="registration-form" class="mt-0 rounded-3xl border border-blue-200 bg-gradient-to-br from-blue-50 via-white to-purple-50 p-0 shadow-sm md:p-0">
    <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
            {{-- <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-700">Registration form</p> --}}
            {{-- <h2 id="registrationFormTitle" class="mt-2 text-3xl font-bold text-blue-950">{{ $meta['title'] }}</h2> --}}
            <p id="registrationTypeDescription" class="mt-3 max-w-2xl text-gray-600">{{ $descriptionText }}</p>
        </div>

        <div id="registrationTypeBadge" class="rounded-full border border-blue-300 bg-white px-4 py-2 text-sm font-semibold text-blue-700 shadow-sm">
            Selected: {{ $badgeLabel }}
        </div>
    </div>

    @if (session('success'))
        <div class="mt-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <ul class="list-disc space-y-1 pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registration.store') }}" method="POST" class="mt-8 grid gap-6" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="mb-2 block text-sm font-semibold text-gray-700">First name</label>
                <input id="first_name" name="first_name" type="text" value="{{ $defaultFirstName }}" required class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                @error('first_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="mb-2 block text-sm font-semibold text-gray-700">Last name</label>
                <input id="last_name" name="last_name" type="text" value="{{ $defaultLastName }}" required class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                @error('last_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email address</label>
                <input id="email" name="email" type="email" value="{{ $defaultEmail }}" required class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">Phone</label>
                <input id="phone" name="phone" type="text" value="{{ $defaultPhone }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="organization" class="mb-2 block text-sm font-semibold text-gray-700">Institution / organization</label>
                <input id="organization" name="organization" type="text" value="{{ old('organization') }}" required class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                @error('organization')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="job_title" class="mb-2 block text-sm font-semibold text-gray-700">Job title</label>
                <input id="job_title" name="job_title" type="text" value="{{ old('job_title') }}" class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                @error('job_title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="registration_type" class="mb-2 block text-sm font-semibold text-gray-700">Registration category</label>
                <select id="registration_type" name="registration_type" required class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="author" {{ old('registration_type', $selectedType) === 'author' ? 'selected' : '' }}>Author</option>
                    <option value="attendee" {{ old('registration_type', $selectedType) === 'attendee' ? 'selected' : '' }}>Attendee</option>
                    <option value="workshop" {{ old('registration_type', $selectedType) === 'workshop' ? 'selected' : '' }}>Workshop</option>
                </select>
                @error('registration_type')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div id="workshop_container" class="hidden">
    <label for="workshop_id" class="mb-2 block text-sm font-semibold text-gray-700">
        Workshop
    </label>

    <select
        id="workshop_id"
        name="workshop_id"
        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-800 shadow-sm">

        <option value="">Select a workshop</option>

        @if (!empty($workshops) && $workshops->isNotEmpty())
            @foreach ($workshops as $workshop)
                <option value="{{ $workshop->id }}" {{ old('workshop_id') == $workshop->id ? 'selected' : '' }}>
                    {{ $workshop->title }}
                </option>
            @endforeach
        @else
            <option value="" disabled>No workshop available</option>
        @endif

    </select>
</div>

            <div>
                <label for="participant_type" class="mb-2 block text-sm font-semibold text-gray-700">Participant type</label>
                <select id="participant_type" name="participant_type" required class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="student" {{ old('participant_type') === 'student' ? 'selected' : '' }}>Student</option>
                    <option value="non_student" {{ old('participant_type') === 'non_student' ? 'selected' : '' }}>Non-student</option>
                </select>
                @error('participant_type')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2 items-start">
            <div class="flex items-center gap-3">
                <input id="payment_received" name="payment_received" type="checkbox" value="1" {{ old('payment_received') ? 'checked' : '' }} required class="h-4 w-4 mt-1">
                <label for="payment_received" class="text-sm font-medium text-gray-700">Payment received</label>
            </div>

            <div>
                <label for="amount_paid" class="mb-2 block text-sm font-semibold text-gray-700">Amount paid (USD)</label>
                <select id="amount_paid" name="amount_paid" class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="">Select amount</option>
                </select>
                @error('amount_paid')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <label for="payment_method" class="mb-2 block text-sm font-semibold text-gray-700 mt-4">Payment method</label>
                <select id="payment_method" name="payment_method" class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="">Select payment method</option>
                    <option value="Bankily">Bankily</option>
                    <option value="Sedad">Sedad</option>
                    <option value="Masriv">Masriv</option>
                    <option value="BIMBAC">BIMBAC</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Other">Other</option>
                </select>
                @error('payment_method')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <input type="hidden" name="is_active" value="1">

        <div class="mt-4">
            <label for="payment_proof" class="mb-2 block text-sm font-semibold text-gray-700">Payment proof (PDF or image)</label>
            <input id="payment_proof" name="payment_proof" type="file" accept=".pdf,.jpg,.jpeg,.png" class="w-full rounded-xl border border-gray-300 px-4 py-2">
            @error('payment_proof')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="notes" class="mb-2 block text-sm font-semibold text-gray-700">Additional notes</label>
            <textarea id="notes" name="notes" rows="4" class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-800 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">{{ old('notes') }}</textarea>
            @error('notes')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                {{-- <p class="text-sm text-gray-600">Once submitted, we will contact you with the next steps for payment and confirmation.</p> --}}
                @if ($currentUser)
                    <a href="{{ route('user.dashboard') }}" class="inline-flex items-center rounded-full border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 transition hover:border-blue-400 hover:text-blue-700">
                        Back to dashboard
                    </a>
                @endif
            </div>
            <button type="submit" class="rounded-full bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-3 text-sm font-semibold text-white shadow-md transition hover:opacity-90">
                Submit registration
            </button>
        </div>
    </form>
    <script>
        (function(){
            const amountSelect = document.getElementById('amount_paid');
            const regType = document.getElementById('registration_type');
            const participantType = document.getElementById('participant_type');

            const amounts = {
                author: {
                    // Student authors: FREE and remote presenters option (50)
                    student: [0, 50],
                    // Non-student authors: 100 USD
                    non_student: [100]
                },
                attendee: {
                    // Attendee students: 75 USD
                    student: [75],
                    // Attendee non-students: 150 USD
                    non_student: [150]
                },
                workshop: {
                    // Workshop students: 50 USD
                    student: [50],
                    // Workshop non-students: 100 USD
                    non_student: [100]
                }
            };

            function formatOptions(list){
                return list.map(v => ({ value: v, label: (Number(v) === 0 ? 'FREE' : v + ' USD') }));
            }

            function populateAmounts(){
                if(!amountSelect || !regType || !participantType) return;
                const r = regType.value || '{{ $selectedType ?? 'attendee' }}';
                const p = participantType.value || 'non_student';
                const list = (amounts[r] && amounts[r][p]) ? amounts[r][p] : [];

                // save current value
                const current = amountSelect.value;
                amountSelect.innerHTML = '';
                const placeholder = document.createElement('option');
                placeholder.value = '';
                placeholder.text = 'Select amount';
                amountSelect.appendChild(placeholder);

                formatOptions(list).forEach(opt=>{
                    const o = document.createElement('option');
                    o.value = opt.value;
                    o.text = opt.label;
                    if(String(opt.value) === String(current) || String(opt.value) === String('{{ old('amount_paid') }}')){
                        o.selected = true;
                    }
                    amountSelect.appendChild(o);
                });
            }

            regType && regType.addEventListener('change', populateAmounts);
            participantType && participantType.addEventListener('change', populateAmounts);

            // initial populate
            document.addEventListener('DOMContentLoaded', function(){ populateAmounts(); });
            // also run immediately in case DOMContentLoaded already fired
            populateAmounts();
        })();





    </script>

    <script>
(function () {

    const amountSelect = document.getElementById('amount_paid');
    const regType = document.getElementById('registration_type');
    const participantType = document.getElementById('participant_type');
    const workshopContainer = document.getElementById('workshop_container');
    const workshopSelect = document.getElementById('workshop_id');
    const badge = document.getElementById('registrationTypeBadge');
    const description = document.getElementById('registrationTypeDescription');

    const amounts = {
        author: {
            student: [0, 50],
            non_student: [100]
        },
        attendee: {
            student: [75],
            non_student: [150]
        },
        workshop: {
            student: [50],
            non_student: [100]
        }
    };

    function formatOptions(list) {
        return list.map(v => ({
            value: v,
            label: Number(v) === 0 ? 'FREE' : v + ' USD'
        }));
    }

    function populateAmounts() {

        const r = regType.value;
        const p = participantType.value;

        const list = amounts[r][p] || [];

        amountSelect.innerHTML = '<option value="">Select amount</option>';

        formatOptions(list).forEach(opt => {

            amountSelect.innerHTML += `
                <option value="${opt.value}">
                    ${opt.label}
                </option>
            `;

        });

    }

    function toggleWorkshop() {

        if (regType.value === "workshop") {

            workshopContainer.classList.remove("hidden");

        } else {

            workshopContainer.classList.add("hidden");

            workshopSelect.value = "";

        }

    }

    function updateTypeUi() {
        const value = regType.value || 'attendee';
        const label = value === 'author' ? 'Author' : value === 'workshop' ? 'Workshop' : 'Attendee';
        const text = value === 'author'
            ? 'Register as an author and secure your place at the conference.'
            : value === 'workshop'
                ? 'Register for one of the workshops and enrich your experience.'
                : 'Register as a conference attendee and join the sessions.';

        if (badge) {
            badge.textContent = 'Selected: ' + label;
        }

        if (description) {
            description.textContent = text;
        }
    }

    regType.addEventListener("change", function () {

        populateAmounts();

        toggleWorkshop();
        updateTypeUi();

    });

    participantType.addEventListener("change", populateAmounts);

    populateAmounts();
    toggleWorkshop();
    updateTypeUi();

})();
</script>


</section>
