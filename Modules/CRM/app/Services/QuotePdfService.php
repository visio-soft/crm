<?php

namespace Modules\CRM\app\Services;

use Modules\CRM\app\Models\Quote;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class QuotePdfService
{
    public function generate(Quote $quote): string
    {
        $pdf = Pdf::loadView('crm::pdf.quote', [
            'quote' => $quote->load(['customer', 'items.product']),
        ]);

        $filename = 'quotes/quote-' . $quote->quote_number . '.pdf';
        Storage::put($filename, $pdf->output());

        return $filename;
    }

    public function download(Quote $quote)
    {
        $pdf = Pdf::loadView('crm::pdf.quote', [
            'quote' => $quote->load(['customer', 'items.product']),
        ]);

        return $pdf->download('quote-' . $quote->quote_number . '.pdf');
    }

    public function stream(Quote $quote)
    {
        $pdf = Pdf::loadView('crm::pdf.quote', [
            'quote' => $quote->load(['customer', 'items.product']),
        ]);

        return $pdf->stream('quote-' . $quote->quote_number . '.pdf');
    }
}
