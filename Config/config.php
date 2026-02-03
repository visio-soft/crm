<?php

return [
    'name' => 'CRM',
    'kanban_stages' => [
        'lead' => 'Lead',
        'contacted' => 'Contacted',
        'qualified' => 'Qualified',
        'proposal' => 'Proposal Sent',
        'negotiation' => 'Negotiation',
        'won' => 'Won',
        'lost' => 'Lost',
    ],
    'follow_up_types' => [
        'call' => 'Phone Call',
        'email' => 'Email',
        'meeting' => 'Meeting',
        'demo' => 'Product Demo',
        'other' => 'Other',
    ],
    'quote_validity_days' => 30,
];
