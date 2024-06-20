<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class UserRoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->definedUserRoleGate('isAdmin', UserRole::Admin->value);
        $this->definedUserRoleGate('isJudge', UserRole::Judge->value);
        $this->definedUserRoleGate('isGamer', UserRole::Gamer->value);
    }

    private function definedUserRoleGate(string $name, string $role): void
    {
        Gate::define($name, fn (User $user) => ($user->role == $role));
    }
}
