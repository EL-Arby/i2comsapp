<?php

namespace Tests\Feature;

use App\Models\Registration;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDashboardWorkshopDisplayTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_displays_the_selected_workshop_title_for_a_registration(): void
    {
        $user = User::factory()->create();
        $workshop = Workshop::create([
            'title' => 'AI for Developers',
            'slug' => 'ai-for-developers',
            'description' => 'Workshop description',
            'abstract' => 'Workshop abstract',
            'presenters' => 'Jane Doe',
            'is_published' => true,
            'sort_order' => 1,
        ]);

        Registration::create([
            'user_id' => $user->id,
            'registration_date' => now(),
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'email' => $user->email,
            'organization' => 'ACME',
            'registration_type' => 'workshop',
            'workshop_id' => $workshop->id,
            'payment_received' => false,
            'is_active' => true,
        ]);

        $response = $this->actingAs($user)->get(route('user.dashboard'));

        $response->assertOk();
        $response->assertSee($workshop->title);
    }
}
