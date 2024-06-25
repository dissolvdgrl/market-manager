<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketDay>
 */
class MarketDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => rand(1,15),
            'date' => now()->addDays(rand(1, 365)),
            'start_time' => now()->addDays(rand(1, 365)),
            'end_time' => now()->addDays(rand(1, 365)),
        ];
    }
}
