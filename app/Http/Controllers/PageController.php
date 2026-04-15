<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function callForPapers()
    {
        return view('pages.call-for-papers');
    }

    public function committees()
    {
        return view('pages.committees');
    }

    public function program()
    {
        return view('pages.program');
    }

    public function registration()
    {
        return view('pages.registration');
    }
}
