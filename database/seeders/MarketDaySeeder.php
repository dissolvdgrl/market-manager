<?php

namespace Database\Seeders;

use App\Models\MarketDay;
use Database\Factories\MarketDayFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketDaySeeder extends Seeder
{
    public function run(): void
    {
        MarketDay::factory()->count(12)->create();
    }
}
