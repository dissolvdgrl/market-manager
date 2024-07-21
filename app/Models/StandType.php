<?php

namespace App\Models;

use App\Enums\StandTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandType extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'number',
        'price',
    ];

    protected $casts = [
        'name' => StandTypeEnum::class,
    ];
}
