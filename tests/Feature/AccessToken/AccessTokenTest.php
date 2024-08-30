<?php

namespace Tests\Feature\AccessToken;

use App\Models\AccessToken;
use Illuminate\Support\Carbon;

class AccessTokenTest extends AccessTokenTestCase
{
    public function test_access_token_check_active_method(): void
    {
        $token1 = AccessToken::factory(1)->create([
            'expires_at' => Carbon::yesterday()->format('Y-m-d H:i'),
            'is_used' => 1,
        ])->first();
        $token2 = AccessToken::factory(1)->create([
            'expires_at' => Carbon::tomorrow()->format('Y-m-d H:i'),
            'is_used' => 0,
        ])->first();
        $token3 = AccessToken::factory(1)->create([
            'expires_at' => Carbon::yesterday()->format('Y-m-d H:i'),
            'is_used' => 0,
        ])->first();
        $token4 = AccessToken::factory(1)->create([
            'expires_at' => Carbon::tomorrow()->format('Y-m-d H:i'),
            'is_used' => 1,
        ])->first();

        $this->assertFalse($token1->isActive());
        $this->assertTrue($token2->isActive());
        $this->assertFalse($token3->isActive());
        $this->assertFalse($token4->isActive());
    }

    public function test_access_token_check_expired_method(): void
    {
        $token1 = AccessToken::factory(1)->create(['expires_at' => Carbon::yesterday()->format('Y-m-d H:i')])->first();
        $token2 = AccessToken::factory(1)->create(['expires_at' => Carbon::tomorrow()->format('Y-m-d H:i')])->first();

        $this->assertTrue($token1->isExpired());
        $this->assertFalse($token2->isExpired());
    }

    public function test_access_token_mark_as_used_method(): void
    {
        $token = AccessToken::factory(1)->create(['is_used' => false])->first();
        $token->markAsUsed();

        $this->assertTrue($token->is_used);
    }
}
