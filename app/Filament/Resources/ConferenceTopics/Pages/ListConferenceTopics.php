<?php

namespace App\Filament\Resources\ConferenceTopics\Pages;

use App\Filament\Resources\ConferenceTopics\ConferenceTopicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConferenceTopics extends ListRecords
{
    protected static string $resource = ConferenceTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
