<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [RoleEnum::PRE_APPROVED, ROleEnum::APPROVED, RoleEnum::EARLY_ACCESS, RoleEnum::ADMIN, RoleEnum::SUPER_ADMIN];
        foreach ($roles as $role) {
            $new_role = new Role([
                'name' => $role->value,
            ]);
            $new_role->save();
        }
    }
}
