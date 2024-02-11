<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('shows the dashboard page', function () {

    actingAs($user = User::factory()->create());

    get(route('dashboard'))->assertSeeText('Dashboard');
});

it('redirects to the login page if user is not authenticated', function () {
        get(route('dashboard'))->assertRedirect(route('login'));
    });

it('shows an account verification message if the user has not verified their email', function ($url) {
    // Add more routes as app grows
    actingAs($user = User::factory()->create());

    get($url)->assertSeeText('Please verify your email address to continue using the app.');
})->with(['/user/profile']);

it('doesn\'t show an account verification reminder if the user has verified their email address', function ($url) {
    actingAs($user = User::factory()->create());
    get($url)->assertDontSeeText('Please verify your email address to continue using the app.');
})->with(['/user/profile']);


it('shows the profile page', function () {
    actingAs($user = User::factory()->create());
    get('/user/profile')->assertOk();
});

it('shows the market calendar overview page', function () {
    actingAs($user = User::factory()->create());
    get('/market-calendar')->assertOk();
});

it('shows the application form page', function () {
    actingAs($user = User::factory()->create());
    get('/apply')->assertOk();
});

it('shows the bookings page', function () {
    actingAs($user = User::factory()->create());
    get('/bookings')->assertOk();
});

it('shows a user\'s receipts page', function () {
    actingAs($user = User::factory()->create());
    get('/receipts')->assertOk();
});
