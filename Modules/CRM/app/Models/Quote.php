<?php

namespace Modules\CRM\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'quote_number',
        'title',
        'description',
        'subtotal',
        'tax',
        'discount',
        'total',
        'status',
        'valid_until',
        'notes',
        'terms_conditions',
        'catalog_pdf_path',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
        'valid_until' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(QuoteItem::class);
    }

    public function emailTracking(): HasMany
    {
        return $this->hasMany(EmailTracking::class);
    }
}
