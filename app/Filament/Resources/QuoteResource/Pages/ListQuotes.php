<?php

namespace Modules\CRM\Filament\Resources\QuoteResource\Pages;

use Modules\CRM\Filament\Resources\QuoteResource;
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
