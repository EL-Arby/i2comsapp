<?php

namespace App\Filament\Resources\ConferenceTopics\Pages;

use App\Filament\Resources\ConferenceTopics\ConferenceTopicResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditConferenceTopic extends EditRecord
{
    protected static string $resource = ConferenceTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
