<?php

namespace Modules\CRM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CRM\Services\EmailTrackingService;

class EmailTrackingController extends Controller
{
    public function __construct(
        protected EmailTrackingService $emailTrackingService
    ) {}

    public function trackOpen(string $trackingId)
    {
        $this->emailTrackingService->trackOpen($trackingId);

        // Return 1x1 transparent pixel
        return response()->file(public_path('images/tracking.gif'));
    }

    public function trackClick(Request $request, string $trackingId, string $linkId)
    {
        $this->emailTrackingService->trackClick($trackingId);

        // Redirect to the actual link (you'd need to store the actual URL)
        $redirectUrl = $request->query('url', '/');
        return redirect($redirectUrl);
    }
}
