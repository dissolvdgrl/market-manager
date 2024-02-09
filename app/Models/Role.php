<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Role extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
    ];

    protected $casts = [
        'name' => RoleEnum::class,
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
