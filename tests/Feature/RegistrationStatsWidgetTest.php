<?php

namespace Tests\Feature;

use App\Filament\Widgets\RegistrationStatsWidget;
use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationStatsWidgetTest extends TestCase
{
    use RefreshDatabase;

    public function test_widget_returns_registration_statistics(): void
    {
        Registration::create([
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'email' => 'ada@example.com',
            'registration_type' => 'attendee',
            'amount_paid' => 120,
            'payment_received' => true,
            'payment_method' => 'Bank Transfer',
            'is_active' => true,
        ]);

        Registration::create([
            'first_name' => 'Grace',
            'last_name' => 'Hopper',
            'email' => 'grace@example.com',
            'registration_type' => 'author',
            'amount_paid' => 80,
            'payment_received' => false,
            'payment_method' => 'Bankily',
            'is_active' => true,
        ]);

        $widget = new RegistrationStatsWidget();
        $stats = $widget->getStats();

        $this->assertCount(4, $stats);
        $this->assertSame('Total inscriptions', $stats[0]->getLabel());
        $this->assertSame('2', $stats[0]->getValue());
    }
}
