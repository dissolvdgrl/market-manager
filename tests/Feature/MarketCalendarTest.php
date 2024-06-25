<?php

namespace Tests\Feature;

use App\Enums\RoleEnum;
use App\Models\MarketDay;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use function Pest\Laravel\actingAs;
use Livewire\Livewire;
use App\Livewire\MarketDayEditForm;

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

it('shows the add market day widget in the calendar dashboard page for an admin user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::ADMIN);
    actingAs($user)->get('/market-calendar')->assertSee('Add a new date');
});

it('does not show the add market day widget in the calendar dashboard page for a pre-approved user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::PRE_APPROVED);
    actingAs($user)->get('/market-calendar')->assertDontSee('Add a new date');
});

it('does not show the add market day widget in the calendar dashboard page for an approved user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::APPROVED);
    actingAs($user)->get('/market-calendar')->assertDontSee('Add a new date');
});

it('does not show the add market day widget in the calendar dashboard page for an early-access user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get('/market-calendar')->assertDontSee('Add a new date');
});

it('can see the edit a market day page as admin', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::ADMIN);
    actingAs($user)->get("/market-calendar/$market_day->id/edit")->assertStatus(200);
});

it('can see the edit a market day page as super admin', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::SUPER_ADMIN);
    actingAs($user)->get("/market-calendar/$market_day->id/edit")->assertStatus(200);
});

it('cannot see the edit a market day page as pre-approved user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::PRE_APPROVED);
    actingAs($user)->get("/market-calendar/$market_day->id/edit")->assertStatus(403);
});

it('cannot see the edit a market day page as approved user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::APPROVED);
    actingAs($user)->get("/market-calendar/$market_day->id/edit")->assertStatus(403);
});

it('cannot see the edit a market day page as early-access user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get("/market-calendar/$market_day->id/edit")->assertStatus(403);
});

// Edit Form method
it('cannot call the store method on the Market Day Edit Form Livewire component as a admin user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::ADMIN);

    Livewire::actingAs($user)
        ->test(MarketDayEditForm::class, [
            'id' => $market_day->id,
            'start' => $market_day->start_time,
            'end' => $market_day->end_time,
            'date' =>  $market_day->date,
        ])
        ->set('date', now()->format('Y-m-d'))
        ->call('store', $market_day->id)
        ->assertStatus(200);
});

it('cannot call the store method on the Market Day Edit Form Livewire component as a super admin user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::SUPER_ADMIN);

    Livewire::actingAs($user)
        ->test(MarketDayEditForm::class, [
            'id' => $market_day->id,
            'start' => $market_day->start_time,
            'end' => $market_day->end_time,
            'date' =>  $market_day->date,
        ])
        ->set('date', now()->format('Y-m-d'))
        ->call('store', $market_day->id)
        ->assertStatus(200);
});

it('cannot call the store method on the Market Day Edit Form Livewire component as a pre-approved user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::PRE_APPROVED);

    Livewire::actingAs($user)
        ->test(MarketDayEditForm::class, [
            'id' => $market_day->id,
            'start' => $market_day->start_time,
            'end' => $market_day->end_time,
            'date' =>  $market_day->date,
        ])
        ->set('date', now()->format('Y-m-d'))
        ->call('store', $market_day->id)
        ->assertStatus(403);
});

it('cannot call the store method on the Market Day Edit Form Livewire component as a approved user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::APPROVED);

    Livewire::actingAs($user)
        ->test(MarketDayEditForm::class, [
            'id' => $market_day->id,
            'start' => $market_day->start_time,
            'end' => $market_day->end_time,
            'date' =>  $market_day->date,
        ])
        ->set('date', now()->format('Y-m-d'))
        ->call('store', $market_day->id)
        ->assertStatus(403);
});

it('cannot call the store method on the Market Day Edit Form Livewire component as a early-access user', function () {
    $user = User::factory()->create();
    $market_day = MarketDay::factory()->create();
    addRole($user, RoleEnum::EARLY_ACCESS);

    Livewire::actingAs($user)
        ->test(MarketDayEditForm::class, [
            'id' => $market_day->id,
            'start' => $market_day->start_time,
            'end' => $market_day->end_time,
            'date' =>  $market_day->date,
        ])
        ->set('date', now()->format('Y-m-d'))
        ->call('store', $market_day->id)
        ->assertStatus(403);
});
