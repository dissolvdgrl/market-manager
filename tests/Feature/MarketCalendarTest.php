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

it('shows the market calendar page for a pre-approved user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::PRE_APPROVED);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});

it('shows the market calendar page for an approved user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::APPROVED);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});

it('shows the market calendar page for a early-access user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});

it('does not show the add market day widget in the calendar dashboard page for a non-admin user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get('/market-calendar')->assertDontSee('Add a new date');
});
