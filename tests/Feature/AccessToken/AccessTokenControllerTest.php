<?php

namespace Tests\Feature\AccessToken;

use App\Mail\AccessTokenRegisterMail;
use App\Models\AccessToken;
use Illuminate\Support\Facades\Mail;

class AccessTokenControllerTest extends AccessTokenTestCase
{
    public function test_access_token_index_method_render_correct_view_and_info_if_does_not_have_records(): void
    {
        $route = route($this->routeIndex);

        $this->actingAs($this->admin)->get($route)->assertOk()
            ->assertViewIs($this->routeIndex)
            ->assertSeeText(__('No access tokens'));
    }

    public function test_access_token_index_method_render_correct_view_and_info_if_have_records(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeIndex);

        $this->actingAs($this->admin)->get($route)->assertOk()
            ->assertViewIs($this->routeIndex)
            ->assertSeeText($accessToken->token)
            ->assertDontSeeText(__('No access tokens'));
    }

    public function test_access_token_show_method_render_correct_view(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeShow, $accessToken);

        $this->actingAs($this->admin)->get($route)->assertOk()
            ->assertViewIs($this->routeShow);
    }

    public function test_access_token_create_method_render_correct_view(): void
    {
        $route = route($this->routeCreate);

        $this->actingAs($this->admin)->get($route)->assertOk()
            ->assertViewIs($this->routeCreate);
    }

    public function test_access_token_edit_method_render_correct_view(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeEdit, $accessToken);

        $this->actingAs($this->admin)->get($route)->assertOk()
            ->assertViewIs($this->routeEdit);
    }

    public function test_access_token_store_method_creates_a_record(): void
    {
        Mail::fake();
        $newAccessToken = AccessToken::factory(1)->make()->first()->toArray();
        $route = route($this->routeStore);

        $response = $this->actingAs($this->admin)->post($route, $newAccessToken);

        $response->assertRedirectToRoute($this->routeIndex)->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('access_tokens', [
            'url' => $newAccessToken['url'],
            'expires_at' => $newAccessToken['expires_at'],
        ]);
        Mail::assertSent(AccessTokenRegisterMail::class, 1);
    }

    public function test_access_token_update_method_updates_the_record(): void
    {
        $accessToken = AccessToken::factory(1)->create([
            'url' => 'http://www.kaczmarczyk.pl/',
        ])->first();
        $updateAccessToken = AccessToken::factory(1)->make([
            'url' => 'http://www.czerwinski.com.pl/',
        ])->first()->toArray();
        $route = route($this->routeUpdate, $accessToken);

        $response = $this->actingAs($this->admin)->put($route, $updateAccessToken);

        $response->assertRedirectToRoute($this->routeIndex)->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('access_tokens', [
            'url' => $updateAccessToken['url'],
        ])->assertDatabaseMissing('access_tokens', [
            'url' => $accessToken->url,
        ]);
    }

    public function test_access_token_destroy_method_deletes_the_record(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeDestroy, $accessToken);

        $response = $this->actingAs($this->admin)->delete($route);

        $response->assertRedirectToRoute($this->routeIndex)->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing('access_tokens', ['id' => $accessToken->id]);
    }
}
