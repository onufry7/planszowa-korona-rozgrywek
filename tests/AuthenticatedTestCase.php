<?php

namespace Tests;

use App\Enums\UserRole;
use App\Models\User;

class AuthenticatedTestCase extends TestCase
{
    protected User $gamer;

    protected User $judge;

    protected User $admin;

    public function setUp(): void
    {
        parent::setUp();

        $this->gamer = User::factory()->create(['role' => UserRole::Gamer->value]);
        $this->judge = User::factory()->create(['role' => UserRole::Judge->value]);
        $this->admin = User::factory()->create(['role' => UserRole::Admin->value]);
    }
}
