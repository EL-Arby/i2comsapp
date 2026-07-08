<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $registrationType = $request->query('type', 'attendee');
        $allowedTypes = ['author', 'attendee', 'workshop'];

        if (! in_array($registrationType, $allowedTypes, true)) {
            $registrationType = 'attendee';
        }

        return view('auth.user-login', compact('registrationType'));
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:6'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            $normalizedName = trim((string) $user->name);

            if ($normalizedName === '') {
                $user->name = $this->resolveDisplayName(null, $user->email);
                $user->save();
            }

            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], $validated['remember'] ?? false)) {
                $request->session()->regenerate();
                return redirect()->intended(route('user.dashboard'));
            }

            return back()->withErrors(['password' => 'Identifiants invalides, veuillez réessayer.'])->withInput();
        }

        $displayName = $this->resolveDisplayName($validated['name'] ?? null, $validated['email'] ?? null);

        $user = User::create([
            'name' => $displayName,
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $user->phone = $validated['phone'] ?? null;
        $user->save();

        Auth::login($user, $validated['remember'] ?? false);
        $request->session()->regenerate();

        return redirect()->route('user.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $registrations = Registration::query()
            ->with('workshop')
            ->where('user_id', $user->id)
            ->orWhere('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->get();

        $total = $registrations->count();
        $paid = $registrations->where('payment_received', true)->count();
        $pending = $registrations->where('payment_received', false)->count();

        return view('pages.user-dashboard', compact('registrations', 'total', 'paid', 'pending'));
    }

    public function paymentPage(Request $request)
    {
        return view('pages.payment-page', [
            'registrationId' => $request->query('registration_id'),
        ]);
    }

    private function resolveDisplayName(?string $name, ?string $email): string
    {
        $normalizedName = trim((string) $name);

        if ($normalizedName !== '') {
            return $normalizedName;
        }

        $normalizedEmail = trim((string) $email);

        if ($normalizedEmail !== '') {
            $localPart = Str::before($normalizedEmail, '@');
            $localPart = trim((string) $localPart);

            if ($localPart !== '') {
                return $localPart;
            }
        }

        return 'Utilisateur';
    }
}
