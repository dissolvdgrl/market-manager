<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\MarketDayController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Approved;
use App\Http\Middleware\EarlyAccess;
use App\Http\Middleware\PreApproved;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    Admin::class,
    Approved::class,
    EarlyAccess::class
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('market-calendar', MarketDayController::class)->names([
        'index' => 'market-calendar.index',
        'edit' => 'market-calendar.edit',
    ]);
    Route::get('/apply', [ApplicationsController::class, 'index'])->name('apply');
    Route::get('/applications/{id}', [ApplicationsController::class, 'show'])->name('apply.show');
    Route::view('/bookings', 'bookings')->middleware(PreApproved::class)->name('bookings');
    Route::view('/receipts', 'receipts')->name('receipts');
});
