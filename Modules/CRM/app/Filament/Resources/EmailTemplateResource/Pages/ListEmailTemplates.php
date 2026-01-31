<?php

namespace Modules\CRM\app\Filament\Resources\EmailTemplateResource\Pages;

use Modules\CRM\app\Filament\Resources\EmailTemplateResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListEmailTemplates extends ListRecords
{
    protected static string $resource = EmailTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
