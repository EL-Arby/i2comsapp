<?php

namespace App\Http\Controllers;

use App\Models\ConferenceMilestone;
use App\Models\ConferenceTopic;
use App\Models\NewsItem;
use App\Models\SiteSetting;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Support\HeroBackground;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::query()->pluck('value', 'key')->all();

        $collaborators = Sponsor::published()->where('level', 'collaborator')->ordered()->get();
        $platinumSponsors = Sponsor::published()->where('level', 'platinum')->ordered()->get();
        $goldSponsors = Sponsor::published()->where('level', 'gold')->ordered()->get();
        $silverSponsors = Sponsor::published()->where('level', 'silver')->ordered()->get();
        $bronzeSponsors = Sponsor::published()->where('level', 'bronze')->ordered()->get();

        $homeSponsorsSettings = [
            'enabled' => filter_var(SiteSetting::getValue('home_sponsors_enabled', '1'), FILTER_VALIDATE_BOOLEAN),
            'title' => SiteSetting::getValue('home_sponsors_title', 'Featured Sponsors'),
            'subtitle' => SiteSetting::getValue('home_sponsors_subtitle', 'Supporting the advancement of AI innovation'),
            'supportedByLabel' => SiteSetting::getValue('home_supported_by_label', 'Strategic partners:'),
        ];

        return view('home', [
            'newsItems' => NewsItem::query()->active()->ordered()->get(),
            'speakers' => Speaker::query()->published()->ordered()->get(),
            'milestones' => ConferenceMilestone::query()->published()->ordered()->get(),
            'topics' => ConferenceTopic::query()->published()->ordered()->get(),
            'settings' => $settings,
            'heroBackground' => HeroBackground::viewData($settings),
            'collaborators' => $collaborators,
            'platinumSponsors' => $platinumSponsors,
            'goldSponsors' => $goldSponsors,
            'silverSponsors' => $silverSponsors,
            'bronzeSponsors' => $bronzeSponsors,
            'homeSponsorsSettings' => $homeSponsorsSettings,
        ]);
    }
}
