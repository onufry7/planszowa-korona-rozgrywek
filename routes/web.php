<?php

use App\Http\Controllers\AccessTokenController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\RoutePath;

Route::get('/', fn () => view('welcome'))->name('welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::middleware(['can:isAdmin'])->group(function () {

        Route::view('admin', 'admin.dashboard')->name('admin.dashboard');

        Route::resource('admin/access-token', AccessTokenController::class, [
            'parameters' => ['access-token' => 'accessToken'],
        ]);

    });
});

/* Register routs */
Route::get(RoutePath::for('register', '/rejestracja'), [RegisteredUserController::class, 'create'])
    ->middleware(['guest:'.config('fortify.guard'), 'access.token'])->name('register');
Route::post(RoutePath::for('register', '/rejestracja'), [RegisteredUserController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard'), 'access.token'])->name('register.store');
