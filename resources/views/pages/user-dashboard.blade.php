@extends('base')

@section('title', 'My Dashboard')

@section('content')
<main class="pt-24 px-6 md:px-16 pb-24 bg-white">
    <div class="mx-auto max-w-6xl">

        {{-- Header --}}
        <div class="mb-8 rounded-3xl border border-gray-200 bg-white p-8 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900">
                        Hello, {{ trim((string) auth()->user()->name) ?: (Illuminate\Support\Str::before(auth()->user()->email, '@') ?: 'Utilisateur') }}
                    </h1>
                    <p class="text-gray-600">
                        Here is the status of your registrations and payments.
                    </p>
                </div>

                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="rounded-2xl bg-red-600 px-6 py-3 text-sm font-semibold text-white hover:bg-red-700">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        {{-- Timeline --}}
        <div class="mb-8 rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="mb-6 text-2xl font-bold text-gray-900">Registration Timeline</h2>

            <div class="grid gap-6 md:grid-cols-3">

                <div class="rounded-2xl border border-green-200 bg-green-50 p-6">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-green-600 text-white font-bold">
                        1
                    </div>
                    <h3 class="text-lg font-bold text-green-900">Connection</h3>
                    <p class="mt-2 text-sm text-green-700">
                        You are connected to your dashboard.
                    </p>
                    <span class="mt-4 inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                        Completed
                    </span>
                </div>

                <div class="rounded-2xl border border-yellow-200 bg-yellow-50 p-6">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-yellow-500 text-white font-bold">
                        2
                    </div>
                    <h3 class="text-lg font-bold text-yellow-900">Payment Fees</h3>
                    <p class="mt-2 text-sm text-yellow-700">
                        Pay your registration fees before final validation.
                    </p>

                    <button type="button"
                            onclick="openPaymentSection()"
                            class="mt-4 inline-flex rounded-full bg-yellow-500 px-5 py-2 text-sm font-bold text-white hover:bg-yellow-600">
                        Proceed to payment
                    </button>
                </div>

                <div class="rounded-2xl border border-blue-200 bg-blue-50 p-6">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white font-bold">
                        3
                    </div>
                    <h3 class="text-lg font-bold text-blue-900">Register</h3>
                    <p class="mt-2 text-sm text-blue-700">
                        Complete or create a new conference registration.
                    </p>

                    <a href="{{ route('registration', ['type' => 'attendee', 'from' => 'dashboard']) }}"
                       class="mt-4 inline-flex rounded-full bg-blue-600 px-5 py-2 text-sm font-bold text-white hover:bg-blue-700">
                        New registration
                    </a>
                </div>

            </div>
        </div>

        {{-- Payment Section --}}
        <section id="paymentSection" class="mb-8 hidden rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-900">Payment Fees</h2>
                <p class="mt-2 text-gray-600">
                    Select your payment method and complete the payment information.
                </p>
            </div>

            <div id="view-select">
                {{-- <h3 class="text-xl font-semibold text-gray-900 text-center">
                    Select your payment method
                </h3> --}}

                <div class="mt-6 flex flex-wrap justify-center gap-5">
                    <div class="bank-logo w-full max-w-[180px] cursor-pointer rounded-2xl border border-transparent bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:border-gray-300 hover:shadow-lg"
                         onclick="selectBank('BimBank')">
                        <img src="https://via.placeholder.com/150x80.png?text=Logo+BimBank" alt="BimBank" class="mx-auto mb-2 block h-auto w-full">
                        <div class="text-sm text-gray-600">Bank transfer</div>
                    </div>

                    <div class="bank-logo w-full max-w-[180px] cursor-pointer rounded-2xl border border-transparent bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:border-gray-300 hover:shadow-lg"
                         onclick="selectBank('BciPay')">
                        <img src="https://via.placeholder.com/150x80.png?text=Logo+BciPay" alt="BciPay" class="mx-auto mb-2 block h-auto w-full">
                        <div class="text-sm text-gray-600">Bank transfer</div>
                    </div>

                    <div class="bank-logo w-full max-w-[180px] cursor-pointer rounded-2xl border border-transparent bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:border-gray-300 hover:shadow-lg"
                         onclick="selectBank('SEDAD')">
                        <img src="https://via.placeholder.com/150x80.png?text=Logo+SEDAD" alt="SEDAD" class="mx-auto mb-2 block h-auto w-full">
                        <div class="text-sm text-gray-600">Bank transfer</div>
                    </div>

                    <div class="w-full max-w-[180px] cursor-not-allowed rounded-2xl border border-transparent bg-gray-50 p-4 text-center opacity-70"
                         onclick="cardSoon()">
                        <img src="https://via.placeholder.com/150x80.png?text=Card" alt="Card payment" class="mx-auto mb-2 block h-auto w-full">
                        <div class="text-sm text-gray-600">Card payment – Soon</div>
                    </div>
                </div>

                <p class="mt-4 text-center text-sm text-gray-500">
                   Click a logo to continue.
                </p>
            </div>

            <div id="view-form" class="hidden">
                <h3 class="text-xl font-semibold text-gray-900">
                    Payment
                    <span id="bankChip" class="ml-2 inline-flex rounded-full bg-indigo-100 px-3 py-1 text-sm font-medium text-indigo-700"></span>
                </h3>

                <form id="paymentForm" class="mt-6 grid gap-4 md:grid-cols-2" novalidate>
                    <div class="md:col-span-2">
                        <label for="paymentEmail" class="mb-2 block text-sm font-semibold text-gray-700">Email</label>
                        <input type="email" id="paymentEmail" placeholder="e.g. client@example.com" required class="w-full rounded-xl border border-gray-300 px-3 py-2">
                    </div>

                    <div class="md:col-span-2">
                        <label for="paymentFullName" class="mb-2 block text-sm font-semibold text-gray-700">Full name</label>
                        <input type="text" id="paymentFullName" placeholder="e.g. Mohamed AHMED" required class="w-full rounded-xl border border-gray-300 px-3 py-2">
                    </div>

                    <div>
                        <label for="paymentPhone" class="mb-2 block text-sm font-semibold text-gray-700">Phone</label>
                        <input type="tel" id="paymentPhone" placeholder="e.g. +22244112233" required class="w-full rounded-xl border border-gray-300 px-3 py-2">
                    </div>

                    <div>
                        <label for="paymentAmount" class="mb-2 block text-sm font-semibold text-gray-700">Amount</label>
                        <select id="paymentAmount" required class="w-full rounded-xl border border-gray-300 px-3 py-2">
                            <option value="">Select amount</option>
                            <option value="50">50 USD</option>
                            <option value="75">75 USD</option>
                            <option value="100">100 USD</option>
                            <option value="150">150 USD</option>
                        </select>
                    </div>
                </form>

                <div class="mt-6 flex flex-wrap justify-end gap-3">
                    <button type="button" onclick="goBack()" class="rounded-xl border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                        Change method
                    </button>

                    <button id="payBtn" class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700" type="button">
                        Pay now
                    </button>

                    <button type="button" disabled class="rounded-xl border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 opacity-70">
                        Pay by card Soon
                    </button>
                </div>

                <div id="result" class="mt-6 hidden rounded-xl p-4 text-sm"></div>
            </div>
        </section>

        {{-- Stats --}}
        <div class="grid gap-6 md:grid-cols-3 mb-8">
            <div class="rounded-3xl border border-gray-200 bg-gradient-to-br from-blue-50 to-white p-6 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-blue-700">Total</p>
                <p class="mt-4 text-4xl font-bold text-blue-900">{{ $total }}</p>
                <p class="mt-2 text-sm text-gray-600">Number of registrations</p>
            </div>

            <div class="rounded-3xl border border-gray-200 bg-gradient-to-br from-emerald-50 to-white p-6 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-700">Payments received</p>
                <p class="mt-4 text-4xl font-bold text-emerald-900">{{ $paid }}</p>
                <p class="mt-2 text-sm text-gray-600">Paid registration(s)</p>
            </div>

            <div class="rounded-3xl border border-gray-200 bg-gradient-to-br from-yellow-50 to-white p-6 shadow-sm">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-yellow-700">Pending</p>
                <p class="mt-4 text-4xl font-bold text-yellow-900">{{ $pending }}</p>
                <p class="mt-2 text-sm text-gray-600">Pending payment(s)</p>
            </div>
        </div>

        {{-- Registrations Table --}}
        <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">My registrations</h2>
                    <p class="text-gray-600">Review the status of each registration.</p>
                </div>

                {{-- <a href="{{ route('registration', ['type' => 'attendee', 'from' => 'dashboard']) }}" class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white hover:bg-blue-700">
                    New registration
                </a> --}}
            </div>

            @if ($registrations->isEmpty())
                <div class="rounded-3xl border border-dashed border-gray-300 bg-blue-50 p-8 text-center text-gray-700">
                    You do not have any registration yet. Click “New registration” to get started.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-700">
                        <thead class="border-b border-gray-200 bg-gray-50 text-gray-900">
                            <tr>
                                <th class="px-4 py-3">Type</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Workshop</th>
                                <th class="px-4 py-3">Paid</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Created at</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-4">{{ ucfirst($registration->registration_type) }}</td>
                                    <td class="px-4 py-4">{{ $registration->first_name }} {{ $registration->last_name }}</td>
                                    <td class="px-4 py-4">{{ $registration->email }}</td>
                                    <td class="px-4 py-4">{{ $registration->workshop?->title ?? ($registration->workshop_id ? 'Workshop #' . $registration->workshop_id : '—') }}</td>
                                    <td class="px-4 py-4">{{ $registration->payment_received ? 'Yes' : 'No' }}</td>
                                    <td class="px-4 py-4">{{ $registration->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td class="px-4 py-4">{{ $registration->created_at?->format('d/m/Y H:i') }}</td>
                                    <td class="px-4 py-4">
                                        @if (! $registration->payment_received)
                                            <button type="button"
                                                    onclick="openPaymentSectionWithData('{{ $registration->email }}', '{{ trim($registration->first_name . ' ' . $registration->last_name) }}', '{{ $registration->phone }}', '{{ $registration->amount_paid ?? '' }}')"
                                                    class="inline-flex rounded-full bg-yellow-500 px-4 py-2 text-xs font-semibold text-white hover:bg-yellow-600">
                                                Pay
                                            </button>
                                        @else
                                            <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800">
                                                Already paid
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>
</main>
@endsection

@push('scripts')
<script>
const API_URL = "https://nexpay-653e0b7d7b24.herokuapp.com/api/demande_paiement";
const PUBLIC_API_KEY = "2PxB3fNU.zC5pSp2cPyaoySVEcmjyEt6WrmKTEzeR";

const CODE_ABO_BY_BANK = {
    BimBank: "5fe45292-d7cb-4e6e-8aae-048a083e5403",
    BciPay: "d0d53001-4a21-4ae4-be04-3ed206350708",
    SEDAD: "81c6abaa-874e-4a40-bfbb-6adb4c5a549e"
};

function openPaymentSection() {
    const section = document.getElementById("paymentSection");

    if (!section) {
        console.error("paymentSection introuvable");
        return;
    }

    section.classList.remove("hidden");
    section.scrollIntoView({ behavior: "smooth", block: "start" });
}

function selectBank(bank) {
    const viewSelect = document.getElementById("view-select");
    const viewForm = document.getElementById("view-form");
    const bankChip = document.getElementById("bankChip");
    const resultBox = document.getElementById("result");

    localStorage.setItem("selectedBank", bank);

    bankChip.textContent = bank;
    viewSelect.classList.add("hidden");
    viewForm.classList.remove("hidden");

    resultBox.className = "mt-6 hidden rounded-xl p-4 text-sm";
    resultBox.innerHTML = "";

    document.getElementById("paymentEmail").value = @json(auth()->user()->email);
    document.getElementById("paymentFullName").value = @json(trim((string) auth()->user()->name) ?: (Illuminate\Support\Str::before(auth()->user()->email, '@') ?: 'Utilisateur'));
}

function goBack() {
    document.getElementById("view-form").classList.add("hidden");
    document.getElementById("view-select").classList.remove("hidden");
    document.getElementById("result").className = "mt-6 hidden rounded-xl p-4 text-sm";
}

function cardSoon() {
    alert("Card payments are coming soon.");
}

function openPaymentSectionWithData(email, fullName, phone, amount) {
    openPaymentSection();

    document.getElementById("paymentEmail").value = email || @json(auth()->user()->email);
    document.getElementById("paymentFullName").value = fullName || @json(trim((string) auth()->user()->name) ?: (Illuminate\Support\Str::before(auth()->user()->email, '@') ?: 'Utilisateur'));
    document.getElementById("paymentPhone").value = phone || "";
    document.getElementById("paymentAmount").value = amount || "";
}

function validateForm() {
    const email = document.getElementById("paymentEmail").value.trim();
    const fullName = document.getElementById("paymentFullName").value.trim();
    const phone = document.getElementById("paymentPhone").value.trim();
    const amount = document.getElementById("paymentAmount").value.trim();
    const bank = localStorage.getItem("selectedBank");

    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        return { ok: false, message: "Please enter a valid email." };
    }

    if (!fullName || fullName.length < 3) {
        return { ok: false, message: "Please enter a valid full name." };
    }

    if (!phone || phone.length < 6) {
        return { ok: false, message: "Please enter a valid phone number." };
    }

    if (!amount || Number(amount) <= 0) {
        return { ok: false, message: "Please select a valid amount." };
    }

    if (!bank || !CODE_ABO_BY_BANK[bank]) {
        return { ok: false, message: "Please select a valid payment method." };
    }

    return {
        ok: true,
        data: {
            email,
            fullName,
            phone,
            amount,
            bank,
            codeAbo: CODE_ABO_BY_BANK[bank]
        }
    };
}

async function initiatePayment(payload) {
    const body = {
        id_facture: payload.email,
        montant: String(payload.amount),
        nom_payeur: payload.fullName,
        date: new Date().toISOString(),
        code_abonnement: payload.codeAbo
    };

    const response = await fetch(API_URL, {
        method: "POST",
        headers: {
            "Authorization": "Api-Key " + PUBLIC_API_KEY,
            "Content-Type": "application/json"
        },
        body: JSON.stringify(body)
    });

    if (!response.ok) {
        throw new Error("API error");
    }

    return response.json();
}

document.addEventListener("DOMContentLoaded", function () {
    const payBtn = document.getElementById("payBtn");

    if (!payBtn) return;

    payBtn.addEventListener("click", async function () {
        const resultBox = document.getElementById("result");
        resultBox.className = "mt-6 hidden rounded-xl p-4 text-sm";
        resultBox.innerHTML = "";

        const check = validateForm();

        if (!check.ok) {
            resultBox.textContent = check.message;
            resultBox.className = "mt-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800";
            return;
        }

        try {
            payBtn.disabled = true;
            payBtn.textContent = "Processing...";

            const data = await initiatePayment(check.data);
            const code = data?.data?.code_paiement;

            if (!code) {
                resultBox.textContent = "Payment started, but no payment code was returned.";
                resultBox.className = "mt-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800";
                return;
            }

            resultBox.innerHTML = `
                <h3 class="mb-2 font-bold">Payment Successfully Initiated</h3>
                Payment code: <b>${code}</b><br>
                Method: <b>${check.data.bank}</b><br>
                Amount: <b>${check.data.amount} USD</b><br>
                Full name: <b>${check.data.fullName}</b><br>
                Phone: <b>${check.data.phone}</b><br><br>
                <a href="{{ route('registration', ['type' => 'attendee', 'from' => 'dashboard']) }}"
                   class="inline-flex rounded-full bg-blue-600 px-5 py-2 text-sm font-bold text-white hover:bg-blue-700">
                    Continue Registration
                </a>
            `;

            resultBox.className = "mt-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800";

        } catch (error) {
            console.error(error);
            resultBox.textContent = "Error while initiating payment.";
            resultBox.className = "mt-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800";
        } finally {
            payBtn.disabled = false;
            payBtn.textContent = "Pay now";
        }
    });
});
</script>
@endpush
