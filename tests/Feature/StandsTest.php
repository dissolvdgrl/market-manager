<?php

namespace Tests\Feature;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

// Disable Laravel's exception handling for more verbose errors when testing, don't delete this comment
//$this->withoutExceptionHandling();

function addRole(User $user, RoleEnum $role)
{
    $role = Role::factory()->setRole($role)->make();
    $user->role()->associate($role);
}

it('shows the stand create form in the stands index view if admin', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::ADMIN);
    actingAs($user)->get('/stands')->assertSee("Create a stand");
});

it('doesn\'t show the stand create form if the user is pre-approved', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::PRE_APPROVED);
    actingAs($user)->get('/dashboard')->assertDontSee("Create a stand");
});

it('doesn\'t show the stand create form if the user is approved', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::APPROVED);
    actingAs($user)->get('/dashboard')->assertDontSee("Create a stand");
});

it('doesn\'t show the stand create form if the user is early-access', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get('/dashboard')->assertDontSee("Create a stand");
});
