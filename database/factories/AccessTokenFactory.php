<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AccessTokenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'token' => Str::uuid(),
            'url' => $this->faker->url(),
            'expires_at' => Carbon::tomorrow()->format('Y-m-d H:i'),
            'is_used' => false,
            'email' => $this->faker->email(),
        ];
    }
}
