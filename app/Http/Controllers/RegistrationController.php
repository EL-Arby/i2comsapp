<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'organization' => ['required', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'registration_type' => ['required', 'in:author,attendee,workshop'],
            'participant_type' => ['nullable', 'in:student,non_student'],
            'amount_paid' => ['nullable', 'numeric'],
            'payment_received' => ['accepted'],
            'payment_method' => ['nullable', 'string', 'max:255'],
            'payment_proof' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'is_active' => ['nullable', 'boolean'],
            'workshop_id' => [
                'nullable',
                'required_if:registration_type,workshop',
                'integer',
                'exists:workshops,id',
            ],
        ]);

        try {
            // handle file upload
            $paymentProofPath = null;
            if ($request->hasFile('payment_proof')) {
                $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
            }

$registration = Registration::create([
    'user_id' => auth()->id(),
    'registration_date' => now(),
    'first_name' => $validated['first_name'],
    'last_name' => $validated['last_name'],
    'email' => $validated['email'],
    'phone' => $validated['phone'] ?? null,
    'organization' => $validated['organization'],
    'job_title' => $validated['job_title'] ?? null,
    'registration_type' => $validated['registration_type'],
    'workshop_id' => $validated['workshop_id'] ?? null,
    'participant_type' => $validated['participant_type'] ?? null,
    'amount_paid' => $validated['amount_paid'] ?? 0,
    'payment_received' => ! empty($validated['payment_received']),
    'payment_method' => $validated['payment_method'] ?? null,
    'payment_proof' => $paymentProofPath,
    'notes' => $validated['notes'] ?? null,
    'is_active' => isset($validated['is_active']) ? (bool) $validated['is_active'] : true,
]);

            $successMessage = 'Registration submitted successfully. We will contact you shortly.';

            if (auth()->check()) {
                return redirect()->route('user.dashboard')->with('success', $successMessage);
            }

            return back()->with('success', $successMessage);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $e) {
            Log::error('Registration store error: ' . $e->getMessage());
            return back()->withErrors(['registration' => 'Unable to save registration, please try again later.'])->withInput();
        }
    }
}
