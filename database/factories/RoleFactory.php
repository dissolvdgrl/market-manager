<?php

namespace Database\Factories;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => RoleEnum::PRE_APPROVED,
        ];
    }

    public function setRole(RoleEnum $role): Factory
    {
        return $this->state(function (array $attributes) use ($role) {
            return [
                'id' => rand(1,4),
                'name' => $role,
            ];
        });
    }
}
