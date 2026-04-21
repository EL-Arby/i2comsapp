<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Speaker;
use App\Models\Workshop;
use App\Models\Hotel;
use App\Models\Sponsor;

class PageController extends Controller
{
    public function callForPapers()
    {
        return view('pages.call-for-papers');
    }

    public function committees()
    {
        $committees = Committee::published()->ordered()->with('members')->get();
        $workshops = Workshop::published()->ordered()->get();
        return view('pages.committees', compact('committees', 'workshops'));
    }

    public function speakers()
    {
        $speakers = Speaker::published()->ordered()->get();
        return view('pages.speakers', compact('speakers'));
    }

    public function workshops()
    {
        $workshops = Workshop::published()->ordered()->get();
        return view('pages.workshops', compact('workshops'));
    }

    public function hotels()
    {
        $hotels = Hotel::published()->ordered()->with('roomRates')->get();
        return view('pages.hotels', compact('hotels'));
    }

    public function sponsors()
    {
        $collaborators = Sponsor::published()->where('level', 'collaborator')->ordered()->get();
        $platinumSponsors = Sponsor::published()->where('level', 'platinum')->ordered()->get();
        $goldSponsors = Sponsor::published()->where('level', 'gold')->ordered()->get();
        $silverSponsors = Sponsor::published()->where('level', 'silver')->ordered()->get();
        $bronzeSponsors = Sponsor::published()->where('level', 'bronze')->ordered()->get();
        
        return view('pages.sponsors', compact('collaborators', 'platinumSponsors', 'goldSponsors', 'silverSponsors', 'bronzeSponsors'));
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
