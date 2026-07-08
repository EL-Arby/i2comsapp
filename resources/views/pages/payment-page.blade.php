@extends('base')

@section('title', 'Payment')

@section('content')
<main class="min-h-screen bg-[#f4f4f9] px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto flex max-w-6xl flex-col gap-6">
        <div class="flex flex-wrap items-center justify-between gap-4 rounded-2xl bg-white p-5 shadow-sm">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Payment</h1>
                <p class="text-sm text-gray-600">Choose a payment method and complete your transaction securely.</p>
            </div>
            <form action="{{ route('user.logout') }}" method="POST" class="flex items-center gap-3">
                @csrf
                <span class="text-sm text-gray-600">Connected as {{ trim((string) auth()->user()->name) ?: (Illuminate\Support\Str::before(auth()->user()->email, '@') ?: 'Utilisateur') }}</span>
                <button type="submit" class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">Logout</button>
            </form>
        </div>

        <div class="rounded-3xl bg-white p-8 shadow-sm">
            <div id="view-select">
                <h2 class="text-2xl font-semibold text-gray-900">Select your payment method</h2>
                <div class="mt-6 flex flex-wrap justify-center gap-5">
                    <div class="bank-logo w-full max-w-[180px] cursor-pointer rounded-2xl border border-transparent bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:border-gray-300 hover:shadow-lg" role="button" tabindex="0" aria-label="Choose BimBank" onclick="selectBank('BimBank')" onkeypress="if(event.key==='Enter'){selectBank('BimBank')}">
                        <img src="https://via.placeholder.com/150x80.png?text=Logo+BimBank" alt="BimBank" class="mx-auto mb-2 block h-auto w-full" />
                        <div class="text-sm text-gray-600">Bank transfer</div>
                    </div>
                    <div class="bank-logo w-full max-w-[180px] cursor-pointer rounded-2xl border border-transparent bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:border-gray-300 hover:shadow-lg" role="button" tabindex="0" aria-label="Choose BciPay" onclick="selectBank('BciPay')" onkeypress="if(event.key==='Enter'){selectBank('BciPay')}">
                        <img src="https://via.placeholder.com/150x80.png?text=Logo+BciPay" alt="BciPay" class="mx-auto mb-2 block h-auto w-full" />
                        <div class="text-sm text-gray-600">Bank transfer</div>
                    </div>
                    <div class="bank-logo w-full max-w-[180px] cursor-pointer rounded-2xl border border-transparent bg-gray-50 p-4 text-center transition hover:-translate-y-1 hover:border-gray-300 hover:shadow-lg" role="button" tabindex="0" aria-label="Choose SEDAD" onclick="selectBank('SEDAD')" onkeypress="if(event.key==='Enter'){selectBank('SEDAD')}">
                        <img src="https://via.placeholder.com/150x80.png?text=Logo+SEDAD" alt="SEDAD" class="mx-auto mb-2 block h-auto w-full" />
                        <div class="text-sm text-gray-600">Bank transfer</div>
                    </div>
                    <div class="w-full max-w-[180px] cursor-not-allowed rounded-2xl border border-transparent bg-gray-50 p-4 text-center opacity-70" role="button" tabindex="0" aria-label="Card payment coming soon" onclick="cardSoon()" onkeypress="if(event.key==='Enter'){cardSoon()}">
                        <img src="https://via.placeholder.com/150x80.png?text=Card" alt="Card payment" class="mx-auto mb-2 block h-auto w-full" />
                        <div class="text-sm text-gray-600">Card (Visa/Mastercard) – Soon</div>
                    </div>
                </div>
                <p class="mt-4 text-sm text-gray-500">Click a logo to continue.</p>
            </div>

            <div id="view-form" class="hidden">
                <h2 class="text-2xl font-semibold text-gray-900">Payment <span id="bankChip" class="ml-2 inline-flex rounded-full bg-indigo-100 px-3 py-1 text-sm font-medium text-indigo-700"></span></h2>
                <form id="paymentForm" class="mt-6 grid gap-4 md:grid-cols-2" novalidate>
                    <input type="hidden" id="registrationId" value="{{ $registrationId ?? '' }}" />
                    <div class="md:col-span-2">
                        <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email</label>
                        <input type="email" id="email" value="{{ auth()->user()->email }}" placeholder="e.g. client@example.com" required class="w-full rounded-xl border border-gray-300 px-3 py-2" />
                    </div>
                    <div class="md:col-span-2">
                        <label for="fullName" class="mb-2 block text-sm font-semibold text-gray-700">Full name</label>
                        <input type="text" id="fullName" value="{{ trim((string) auth()->user()->name) ?: (Illuminate\Support\Str::before(auth()->user()->email, '@') ?: 'Utilisateur') }}" placeholder="e.g. Mohamed AHMED" required class="w-full rounded-xl border border-gray-300 px-3 py-2" />
                    </div>
                    <div>
                        <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">Phone</label>
                        <input type="tel" id="phone" value="{{ auth()->user()->phone ?? '' }}" placeholder="e.g. +22244112233" required class="w-full rounded-xl border border-gray-300 px-3 py-2" />
                    </div>
                    <div>
                        <label for="amount" class="mb-2 block text-sm font-semibold text-gray-700">Amount</label>
                        <input type="number" id="amount" min="1" step="1" placeholder="e.g. 150" required class="w-full rounded-xl border border-gray-300 px-3 py-2" />
                    </div>
                </form>
                <div class="mt-6 flex flex-wrap justify-end gap-3">
                    <button type="button" onclick="goBack()" class="rounded-xl border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">Change method</button>
                    <button id="payBtn" class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700" type="button">Pay now</button>
                    <button type="button" disabled title="Coming soon" class="rounded-xl border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 opacity-70">Pay by card (Soon)</button>
                </div>
                <div id="result" class="mt-6 hidden rounded-xl border border-indigo-100 bg-indigo-50 p-4 text-sm text-indigo-900"></div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
    const API_URL = 'https://nexpay-653e0b7d7b24.herokuapp.com/api/demande_paiement';
    const PUBLIC_API_KEY = '2PxB3fNU.zC5pSp2cPyaoySVEcmjyEt6WrmKTEzeR';

    const CODE_ABO_BY_BANK = {
        BimBank: '5fe45292-d7cb-4e6e-8aae-048a083e5403',
        BciPay: 'd0d53001-4a21-4ae4-be04-3ed206350708',
        SEDAD: '81c6abaa-874e-4a40-bfbb-6adb4c5a549e'
    };

    const viewSelect = document.getElementById('view-select');
    const viewForm = document.getElementById('view-form');
    const bankChip = document.getElementById('bankChip');
    const resultBox = document.getElementById('result');
    const payBtn = document.getElementById('payBtn');

    function cardSoon() {
        alert('Card payments (Mastercard/Visa) are coming soon.');
    }

    function selectBank(bank) {
        try { localStorage.setItem('selectedBank', bank); } catch (e) {}
        bankChip.textContent = bank;
        viewSelect.classList.add('hidden');
        viewForm.classList.remove('hidden');
        resultBox.classList.add('hidden');
        resultBox.textContent = '';
    }

    function goBack() {
        viewForm.classList.add('hidden');
        viewSelect.classList.remove('hidden');
        resultBox.classList.add('hidden');
        resultBox.textContent = '';
    }

    function getSelectedBank() {
        try { return localStorage.getItem('selectedBank'); } catch (e) { return null; }
    }

    function validateForm() {
        const email = document.getElementById('email').value.trim();
        const fullName = document.getElementById('fullName').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const amount = document.getElementById('amount').value.trim();

        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            return { ok: false, message: 'Please enter a valid email.' };
        }
        if (!fullName || fullName.length < 3) {
            return { ok: false, message: 'Please enter a valid full name.' };
        }
        if (!phone || phone.length < 6) {
            return { ok: false, message: 'Please enter a valid phone number.' };
        }
        if (!amount || isNaN(Number(amount)) || Number(amount) <= 0) {
            return { ok: false, message: 'Please enter a valid amount (> 0).' };
        }
        const bank = getSelectedBank();
        if (!bank) {
            return { ok: false, message: 'No payment method selected.' };
        }
        const codeAbo = CODE_ABO_BY_BANK[bank];
        if (!codeAbo) {
            return { ok: false, message: 'Missing subscription code for the selected method.' };
        }
        return {
            ok: true,
            data: { email, fullName, phone, amount, bank, codeAbo }
        };
    }

    async function initiatePayment(payload) {
        const body = {
            id_facture: payload.email,
            montant: String(payload.amount),
            nom_payeur: payload.fullName,
            date: payload.dateISO || new Date().toISOString(),
            code_abonnement: payload.codeAbo
        };

        const response = await fetch(API_URL, {
            method: 'POST',
            headers: {
                Authorization: 'Api-Key ' + PUBLIC_API_KEY,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body)
        });

        if (!response.ok) {
            throw new Error('API error: ' + response.status);
        }
        return response.json();
    }

    function setLoading(isLoading) {
        payBtn.disabled = isLoading;
        payBtn.textContent = isLoading ? 'Processing...' : 'Pay now';
    }

    payBtn.addEventListener('click', async () => {
        resultBox.classList.remove('error', 'success');
        resultBox.classList.add('hidden');
        resultBox.textContent = '';

        const check = validateForm();
        if (!check.ok) {
            resultBox.textContent = check.message;
            resultBox.classList.remove('hidden');
            resultBox.classList.add('error');
            return;
        }

        try {
            setLoading(true);
            const now = new Date();
            const displayDate = now.toLocaleString('en-GB');
            const data = await initiatePayment({ ...check.data, dateISO: now.toISOString() });
            const code = data && data.data ? data.data.code_paiement : null;

            if (!code) {
                resultBox.innerHTML = 'Payment started, but no payment code was returned.';
                resultBox.classList.remove('hidden');
                resultBox.classList.add('error');
                return;
            }

            resultBox.innerHTML =
                '<h3 class="mb-2 font-semibold">Use the following code to complete the payment</h3>' +
                'Payment code: <b>' + code + '</b><br>' +
                'Transaction date: <b>' + displayDate + '</b><br>' +
                'Method: <b>' + check.data.bank + '</b><br>' +
                'Amount: <b>' + check.data.amount + '</b><br>' +
                'Full name: <b>' + check.data.fullName + '</b><br>' +
                'Phone: <b>' + check.data.phone + '</b>';
            resultBox.classList.remove('hidden');
            resultBox.classList.add('success');
        } catch (err) {
            console.error(err);
            resultBox.textContent = 'Error while initiating payment.';
            resultBox.classList.remove('hidden');
            resultBox.classList.add('error');
        } finally {
            setLoading(false);
        }
    });

    (function boot() {
        const bank = getSelectedBank();
        if (bank) {
            bankChip.textContent = bank;
            viewSelect.classList.add('hidden');
            viewForm.classList.remove('hidden');
        }
    })();
</script>
@endsection
