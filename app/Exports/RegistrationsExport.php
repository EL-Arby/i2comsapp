<?php

namespace App\Exports;

use App\Models\Registration;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrationsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Registration::query()
            ->with('workshop')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function (Registration $registration): array {
                return [
                    'Date d\'inscription' => $registration->registration_date?->format('Y-m-d H:i:s'),
                    'Prénom' => $registration->first_name,
                    'Nom' => $registration->last_name,
                    'Email' => $registration->email,
                    'Téléphone' => $registration->phone,
                    'Organisation' => $registration->organization,
                    'Poste' => $registration->job_title,
                    'Type d\'inscription' => $registration->registration_type,
                    'Workshop' => $registration->workshop?->title ?? '—',
                    'Montant payé' => $registration->amount_paid,
                    'Paiement reçu' => $registration->payment_received ? 'Oui' : 'Non',
                    'Méthode de paiement' => $registration->payment_method,
                    'Notes' => $registration->notes,
                    'Actif' => $registration->is_active ? 'Oui' : 'Non',
                    'Date de création' => $registration->created_at?->format('Y-m-d H:i:s'),
                ];
            });
    }

    public function headings(): array
    {
        return [
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
        ];
    }
}
