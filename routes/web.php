<?php

use App\Http\Controllers\AccessTokenController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\RoutePath;

Route::get('/', fn () => view('welcome'))->name('welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', fn () => view('user.dashboard'))->name('user-dashboard');

    Route::middleware(['can:isAdminOrJudge'])->prefix('admin')->group(function () {
        Route::view('dashboard', 'admin.dashboard')->name('admin-dashboard');
    });

    Route::middleware(['can:isAdmin'])->prefix('admin')->group(function () {

        Route::resource('access-token', AccessTokenController::class, [
            'parameters' => ['access-token' => 'accessToken'],
        ]);

    });
});

/* Register routs */
Route::get(RoutePath::for('register', '/rejestracja'), [RegisteredUserController::class, 'create'])
    ->middleware(['guest:'.config('fortify.guard'), 'access.token'])->name('register');
Route::post(RoutePath::for('register', '/rejestracja'), [RegisteredUserController::class, 'store'])
    ->middleware(['guest:'.config('fortify.guard'), 'access.token'])->name('register.store');
