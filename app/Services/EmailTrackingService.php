<?php

namespace Modules\CRM\Services;

use Modules\CRM\Models\EmailTracking;
use Modules\CRM\Models\Quote;
use Modules\CRM\Models\Customer;
use Illuminate\Support\Str;

class EmailTrackingService
{
    public function createTracking(Customer $customer, Quote $quote = null, string $emailType = 'quote'): EmailTracking
    {
        return EmailTracking::create([
            'customer_id' => $customer->id,
            'quote_id' => $quote?->id,
            'tracking_id' => Str::uuid(),
            'email_type' => $emailType,
        ]);
    }

    public function trackOpen(string $trackingId): void
    {
        $tracking = EmailTracking::where('tracking_id', $trackingId)->first();
        
        if ($tracking) {
            $tracking->increment('open_count');
            
            if (!$tracking->opened_at) {
                $tracking->update(['opened_at' => now()]);
            }
        }
    }

    public function trackClick(string $trackingId): void
    {
        $tracking = EmailTracking::where('tracking_id', $trackingId)->first();
        
        if ($tracking) {
            $tracking->increment('click_count');
            
            if (!$tracking->clicked_at) {
                $tracking->update(['clicked_at' => now()]);
            }
        }
    }

    public function getTrackingPixelUrl(string $trackingId): string
    {
        return route('api.crm.track.email', ['tracking_id' => $trackingId]);
    }

    public function getTrackingLinkUrl(string $trackingId, string $linkId): string
    {
        return route('api.crm.track.link', [
            'tracking_id' => $trackingId,
            'link_id' => $linkId,
        ]);
    }
}
