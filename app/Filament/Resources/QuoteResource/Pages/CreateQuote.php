<?php

namespace Modules\CRM\Filament\Resources\QuoteResource\Pages;

use Modules\CRM\Filament\Resources\QuoteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQuote extends CreateRecord
{
    protected static string $resource = QuoteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Calculate totals
        $subtotal = 0;
        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $subtotal += $item['total'] ?? 0;
            }
        }
        
        $data['subtotal'] = $subtotal;
        $data['total'] = $subtotal - ($data['discount'] ?? 0) + ($data['tax'] ?? 0);
        
        return $data;
    }
}
