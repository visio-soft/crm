<?php

namespace Modules\CRM\app\Filament\Resources\CustomerResource\Pages;

use Modules\CRM\app\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('kanban')
                ->label('Kanban Board')
                ->icon('heroicon-o-view-columns')
                ->url(route('filament.admin.resources.customers.kanban')),
            Actions\CreateAction::make(),
        ];
    }
}
