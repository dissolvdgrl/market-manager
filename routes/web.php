<?php

use App\Http\Controllers\ApplicationsController;
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
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/market-calendar', 'market-calendar')->name('market-calendar');
    Route::get('/apply', [ApplicationsController::class, 'index'])->name('apply');
    Route::get('/applications/{id}', [ApplicationsController::class, 'show'])->name('apply.show');
    Route::view('/bookings', 'bookings')->middleware(PreApproved::class)->name('bookings');
    Route::view('/receipts', 'receipts')->name('receipts');
});
