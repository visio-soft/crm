<?php

namespace Modules\CRM\app\Filament\Resources\QuoteResource\Pages;

use Modules\CRM\app\Filament\Resources\QuoteResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListQuotes extends ListRecords
{
    protected static string $resource = QuoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
