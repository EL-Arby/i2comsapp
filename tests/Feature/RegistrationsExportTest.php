<?php

namespace Tests\Feature;

use App\Exports\RegistrationsExport;
use App\Models\Registration;
use App\Models\Workshop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RegistrationsExportTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_export_contains_expected_headings_and_values(): void
    {
        $workshop = Workshop::create([
            'title' => 'AI Basics',
            'slug' => 'ai-basics',
            'description' => 'Workshop description',
            'abstract' => 'Workshop abstract',
            'presenters' => 'Jane Doe',
            'is_published' => true,
            'sort_order' => 1,
        ]);

        Registration::create([
            'first_name' => 'Ada',
            'last_name' => 'Lovelace',
            'email' => 'ada@example.com',
            'registration_type' => 'attendee',
            'workshop_id' => $workshop->id,
            'payment_received' => true,
            'is_active' => true,
        ]);

        $export = new RegistrationsExport();

        $this->assertSame([
            'Date d\'inscription',
            'Prénom',
            'Nom',
            'Email',
            'Téléphone',
            'Organisation',
            'Poste',
            'Type d\'inscription',
            'Workshop',
            'Montant payé',
            'Paiement reçu',
            'Méthode de paiement',
            'Notes',
            'Actif',
            'Date de création',
        ], $export->headings());

        $collection = $export->collection();

        $this->assertCount(1, $collection);
        $this->assertSame('Ada', $collection->first()['Prénom']);
        $this->assertSame('Lovelace', $collection->first()['Nom']);
        $this->assertSame('ada@example.com', $collection->first()['Email']);
        $this->assertSame($workshop->title, $collection->first()['Workshop']);
    }
}
