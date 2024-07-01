<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VendorApplication>
 */
class VendorApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => random_int(1, 200),
            'business_name' => $this->faker->company(),
            'phone_number' => $this->faker->phoneNumber(),
            'website' => $this->faker->url(),
            'facebook' => $this->faker->url(),
            'instagram' => $this->faker->url(),
            'stand_type' => array_rand(['standard', 'electricity']),
            'uses_gas' => array_rand([0, 1]),
            'user_id' => random_int(1, 100),
            'status' => array_rand(['pending', 'rejected', 'approved']),
        ];
    }

    public function attachUser(int $user_id): static
    {
        return $this->state(function (array $attributes) use ($user_id) {
            return [
                'user_id' => $user_id,
            ];
        });
    }
}
