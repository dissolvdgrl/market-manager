<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RoleEnum;


class Role extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
    ];

    protected $casts = [
        'name' => RoleEnum::class,
    ];
}
