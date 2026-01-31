<?php

namespace Modules\CRM\app\Filament\Resources\CustomerResource\Pages;

use Modules\CRM\app\Filament\Resources\CustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
}
