<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:100'],
        ]);

        return back()->with('success', 'Registration submitted successfully.');
    }
}
