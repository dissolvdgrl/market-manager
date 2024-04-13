<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VendorApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'phone_number',
        'website',
        'facebook',
        'instagram',
        'stand_type',
        'electricity_details',
        'uses_gas',
        'products'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
