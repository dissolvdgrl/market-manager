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
        $stand_types = [StandTypeEnum::ELECTRICITY, StandTypeEnum::STANDARD];

        foreach ($stand_types as $type) {
            $new_type = new StandType([
                'name' => $type->value,
                'price' => 0,
            ]);
            $new_type->save();
        }
    }
}
