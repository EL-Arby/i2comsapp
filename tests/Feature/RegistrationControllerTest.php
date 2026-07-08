<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_can_be_created_with_valid_data(): void
    {
        $response = $this->post(route('registration.store'), [
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'email' => 'ada@example.com',
            'organization' => 'ACME',
            'registration_type' => 'attendee',
            'amount_paid' => 75,
            'payment_received' => '1',
            'payment_method' => 'Bankily',
            'notes' => 'Test registration',
            'is_active' => '1',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('registrations', [
            'email' => 'ada@example.com',
            'organization' => 'ACME',
            'registration_type' => 'attendee',
        ]);
    }
}
