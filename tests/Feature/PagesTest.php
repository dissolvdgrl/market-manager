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

it('shows the dashboard page for a pre-approved user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::PRE_APPROVED);
    actingAs($user)->get('/dashboard')->assertStatus(200);
});

it('shows the dashboard page for an admin user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::ADMIN);
    actingAs($user)->get('/dashboard')->assertStatus(200);
});

it('shows the dashboard page for an approved user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::APPROVED);
    actingAs($user)->get('/dashboard')->assertStatus(200);
});

it('shows the dashboard page for an early-access user', function () {
    $user = User::factory()->make();
    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get('/dashboard')->assertStatus(200);
});

it('redirects to the login page if user is not authenticated', function () {
    get(route('dashboard'))->assertRedirect(route('login'));
});

it('shows an account verification message if the user has not verified their email', function ($url) {
    $user = User::factory()->unverified()->create();

    addRole($user, RoleEnum::ADMIN);

    actingAs($user)->get($url)->assertSeeText('Please verify your email address to continue using the app.');
})->with(['/user/profile']);

it('doesn\'t show an account verification reminder if a pre-approved user has verified their email address', function ($url) {
    $user = User::factory()->create();

    addRole($user, RoleEnum::PRE_APPROVED);
    actingAs($user)->get($url)->assertDontSeeText('Please verify your email address to continue using the app.');
})->with(['/user/profile']);


it('shows the profile page for an approved user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::APPROVED);

    actingAs($user)->get('/user/profile')->assertStatus(200);
});

it('shows the profile page for an pre-approved user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::PRE_APPROVED);

    actingAs($user)->get('/user/profile')->assertStatus(200);
});

it('shows the profile page for an admin user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::ADMIN);

    actingAs($user)->get('/user/profile')->assertStatus(200);
});

it('shows the profile page for an early access user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::EARLY_ACCESS);

    actingAs($user)->get('/user/profile')->assertStatus(200);
});

it('shows the market calendar overview page for a pre-approved user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::PRE_APPROVED);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});

it('shows the market calendar overview page for an approved user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::APPROVED);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});

it('shows the market calendar overview page for an early access user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});

it('shows the market calendar overview page for an admin user', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::ADMIN);
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});

it('shows the application form page', function () {
    $user = User::factory()->create();

    addRole($user, RoleEnum::PRE_APPROVED);
    $user = User::factory()->create();
    actingAs($user);
    get('/apply')->assertSee('Bookings');
});

it('shows the bookings page', function () {
    actingAs($user = User::factory()->create());
    get('/bookings')->assertSee('Bookings');
});

it('shows the vendors page as an admin', function () {
    $user = User::factory()->create();
    addRole($user, RoleEnum::SUPER_ADMIN);
    actingAs($user)->get('/vendors')->assertStatus(200);
});

it('throws a 403 when the user is not an admin', function () {
    $user = User::factory()->create();
    addRole($user, RoleEnum::EARLY_ACCESS);
    actingAs($user)->get('/vendors')->assertStatus(403);
});

it('shows a pre-approved vendor\'s detail page to an admin', function () {
    $user = User::factory()->create();
    $vendor = User::factory()->create();

    addRole($user, RoleEnum::ADMIN);
    addRole($vendor, RoleEnum::PRE_APPROVED);

    actingAs($user)->get("/vendors/$vendor->id")->assertStatus(200);
});

/*it('shows a user\'s receipts page', function () {
    actingAs($user = User::factory()->create());
    get('/receipts')->assertOk();
});*/

/*it('can see the market calendar overview page', function () {
    $user = User::factory()->create();
    actingAs($user)->get('/market-calendar')->assertStatus(200);
});*/
