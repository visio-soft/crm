<?php

namespace Modules\CRM\Filament\Resources\FollowUpResource\Pages;

use Modules\CRM\Filament\Resources\FollowUpResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListFollowUps extends ListRecords
{
    protected static string $resource = FollowUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
