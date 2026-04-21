<?php

namespace App\Filament\Resources\ConferenceMilestones\Pages;

use App\Filament\Resources\ConferenceMilestones\ConferenceMilestoneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditConferenceMilestone extends EditRecord
{
    protected static string $resource = ConferenceMilestoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
