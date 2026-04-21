<?php

namespace App\Filament\Resources\ConferenceMilestones\Pages;

use App\Filament\Resources\ConferenceMilestones\ConferenceMilestoneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConferenceMilestones extends ListRecords
{
    protected static string $resource = ConferenceMilestoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
