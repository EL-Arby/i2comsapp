<?php

namespace App\Filament\Resources\Registrations\Pages;

use App\Filament\Resources\Registrations\RegistrationResource;
use App\Models\Registration;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegistrations extends ListRecords
{
    protected static string $resource = RegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('export')
                ->label('Exporter en Excel')
                ->icon('heroicon-o-download')
                ->action('exportRegistrations'),
        ];
    }

    public function exportRegistrations()
    {
        $registrations = Registration::orderBy('created_at', 'desc')->get();

        $columns = [
            'registration_date',
            'first_name',
            'last_name',
            'email',
            'phone',
            'organization',
            'job_title',
            'registration_type',
            'amount_paid',
            'payment_received',
            'payment_method',
            'notes',
            'is_active',
            'created_at',
        ];

        $html = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body>';
        $html .= '<table border="1"><thead><tr>';

        foreach ($columns as $column) {
            $html .= '<th>' . e(str_replace('_', ' ', ucfirst($column))) . '</th>';
        }

        $html .= '</tr></thead><tbody>';

        foreach ($registrations as $registration) {
            $html .= '<tr>';
            $html .= '<td>' . e($registration->registration_date?->format('Y-m-d H:i:s')) . '</td>';
            $html .= '<td>' . e($registration->first_name) . '</td>';
            $html .= '<td>' . e($registration->last_name) . '</td>';
            $html .= '<td>' . e($registration->email) . '</td>';
            $html .= '<td>' . e($registration->phone) . '</td>';
            $html .= '<td>' . e($registration->organization) . '</td>';
            $html .= '<td>' . e($registration->job_title) . '</td>';
            $html .= '<td>' . e($registration->registration_type) . '</td>';
            $html .= '<td>' . e($registration->amount_paid) . '</td>';
            $html .= '<td>' . e($registration->payment_received ? 'Oui' : 'Non') . '</td>';
            $html .= '<td>' . e($registration->payment_method) . '</td>';
            $html .= '<td>' . e($registration->notes) . '</td>';
            $html .= '<td>' . e($registration->is_active ? 'Oui' : 'Non') . '</td>';
            $html .= '<td>' . e($registration->created_at?->format('Y-m-d H:i:s')) . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
        $html .= '</body></html>';

        return response($html, 200, [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="inscriptions.xls"',
        ]);
    }
}
