<?php

namespace App\Filament\Resources\Registrations\Pages;

use App\Exports\RegistrationsExport;
use App\Filament\Resources\Registrations\RegistrationResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListRegistrations extends ListRecords
{
    protected static string $resource = RegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('export')
                ->label('Exporter en Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->action('exportRegistrations'),
        ];
    }

    public function exportRegistrations()
    {
        return Excel::download(new RegistrationsExport, 'inscriptions.xlsx');
    }
}
