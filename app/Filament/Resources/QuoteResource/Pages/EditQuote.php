<?php

namespace Modules\CRM\Filament\Resources\QuoteResource\Pages;

use Modules\CRM\Filament\Resources\QuoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuote extends EditRecord
{
    protected static string $resource = QuoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('download_pdf')
                ->label('Download PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(function () {
                    $service = app(\Modules\CRM\Services\QuotePdfService::class);
                    return $service->download($this->record);
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
