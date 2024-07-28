<?php

namespace Database\Seeders;


use App\Enums\StandTypeEnum;
use App\Models\StandType;
use Illuminate\Database\Seeder;

class StandTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stand_types = [
            [
                'type' => StandTypeEnum::ELECTRICITY,
                'price' => 400.00,
            ],
            [
                'type' => StandTypeEnum::STANDARD,
                'price' => 320.00,
            ]
        ];

        foreach ($stand_types as $stand_type) {
            $new_type = new StandType([
                'name' => $stand_type['type']->value,
                'price' => $stand_type['price']
            ]);
            $new_type->save();
        }
    }
}
