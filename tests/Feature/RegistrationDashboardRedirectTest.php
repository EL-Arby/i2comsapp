<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationDashboardRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_is_redirected_to_dashboard_after_registration(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('registration.store'), [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'phone' => '+22212345678',
            'organization' => 'Test Org',
            'job_title' => 'Engineer',
            'registration_type' => 'attendee',
            'participant_type' => 'student',
            'amount_paid' => 75,
            'payment_received' => '1',
            'payment_method' => 'Bankily',
            'notes' => 'Test note',
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('user.dashboard'));
        $this->assertDatabaseHas('registrations', [
            'email' => 'jane@example.com',
            'user_id' => $user->id,
        ]);
    }

    public function test_new_user_without_name_uses_default_display_name(): void
    {
        $response = $this->post(route('user.login.submit'), [
            'email' => 'newuser@example.com',
            'password' => 'password123',
            'name' => '   ',
            'phone' => '+22212345678',
        ]);

        $response->assertRedirect(route('user.dashboard'));

        $user = User::query()->where('email', 'newuser@example.com')->first();

        $this->assertNotNull($user);
        $this->assertSame('newuser', $user->name);
    }
}
