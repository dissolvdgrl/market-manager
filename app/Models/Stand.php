<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stand extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'stand_number',
        'stand_type_id',
    ];

    public function standType(): BelongsTo
    {
        return $this->belongsTo(StandType::class);
    }
}
