<?php

namespace Modules\CRM\Filament\Resources\FollowUpResource\Pages;

use Modules\CRM\Filament\Resources\FollowUpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFollowUp extends EditRecord
{
    protected static string $resource = FollowUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
