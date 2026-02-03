<?php

namespace Modules\CRM\Filament\Resources\CustomerResource\Pages;

use Modules\CRM\Filament\Resources\CustomerResource;
use Modules\CRM\Models\Customer;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Model;

class KanbanCustomers extends Page
{
    protected static string $resource = CustomerResource::class;
    protected static string $view = 'crm::filament.pages.kanban-customers';

    public function getTitle(): string
    {
        return 'Customer Kanban Board';
    }

    public function getStages(): array
    {
        return [
            'lead' => 'Lead',
            'contacted' => 'Contacted',
            'qualified' => 'Qualified',
            'proposal' => 'Proposal Sent',
            'negotiation' => 'Negotiation',
            'won' => 'Won',
            'lost' => 'Lost',
        ];
    }

    public function getCustomersByStage(string $stage): \Illuminate\Database\Eloquent\Collection
    {
        return Customer::where('stage', $stage)
            ->orderBy('priority')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function updateCustomerStage(int $customerId, string $newStage): void
    {
        $customer = Customer::findOrFail($customerId);
        $customer->update(['stage' => $newStage]);
    }
}
