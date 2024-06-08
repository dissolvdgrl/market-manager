<?php

namespace Tests\Feature;

use App\Enums\RoleEnum;
use App\Models\MarketDay;
use App\Models\Role;
use App\Models\User;
use function Pest\Laravel\actingAs;

function addRole(User $user, RoleEnum $role)
{
    $role = Role::factory()->setRole($role)->make();
    $user->role()->associate($role);
}

it('shows the market calendar page for an admin', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::ADMIN);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});
