<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'paper_title' => ['required', 'string', 'max:255'],
            'abstract' => ['required', 'string'],
        ]);

        return back()->with('success', 'Abstract submitted successfully.');
    }
}
