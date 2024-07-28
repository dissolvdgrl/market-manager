<?php

namespace Database\Seeders;

use App\Enums\StandTypeEnum;
use App\Models\Stand;
use App\Models\StandType;
use Illuminate\Database\Seeder;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount_of_stands = 50;
        $standard_stand = StandType::select('id')->where('name', StandTypeEnum::STANDARD)->first();

        for ($i = $amount_of_stands; $i > 0; $i--) {
            $new_stand = new Stand([
                'number' => $i,
                'stand_type_id' => $standard_stand->id,
            ]);
            $new_stand->save();
        }
    }
}
