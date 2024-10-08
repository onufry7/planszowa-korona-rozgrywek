<?php

namespace Tests\Feature\AccessToken;

use App\Models\AccessToken;

class AccessTokenRoutsTest extends AccessTokenTestCase
{
    public function test_access_token_index_path_check_accessed(): void
    {
        $route = route($this->routeIndex);

        $this->get($route)->assertStatus(302);
        $this->actingAs($this->gamer)->get($route)->assertStatus(403);
        $this->actingAs($this->judge)->get($route)->assertStatus(403);
        $this->actingAs($this->admin)->get($route)->assertStatus(200);
    }

    public function test_access_token_show_path_check_accessed(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeShow, $accessToken);

        $this->get($route)->assertStatus(302);
        $this->actingAs($this->gamer)->get($route)->assertStatus(403);
        $this->actingAs($this->judge)->get($route)->assertStatus(403);
        $this->actingAs($this->admin)->get($route)->assertStatus(200);
    }

    public function test_access_token_create_path_check_accessed(): void
    {
        $route = route($this->routeCreate);

        $this->get($route)->assertStatus(302);
        $this->actingAs($this->gamer)->get($route)->assertStatus(403);
        $this->actingAs($this->judge)->get($route)->assertStatus(403);
        $this->actingAs($this->admin)->get($route)->assertStatus(200);
    }

    public function test_access_token_store_path_check_accessed(): void
    {
        $accessToken = AccessToken::factory(1)->make()->first()->toArray();
        $route = route($this->routeStore);

        $this->post($route, $accessToken)->assertStatus(302);
        $this->actingAs($this->gamer)->post($route, $accessToken)->assertStatus(403);
        $this->actingAs($this->judge)->post($route, $accessToken)->assertStatus(403);
        $this->actingAs($this->admin)->post($route, $accessToken)->assertStatus(302);
    }

    public function test_access_token_edit_path_check_accessed(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeEdit, $accessToken);

        $this->get($route)->assertStatus(302);
        $this->actingAs($this->gamer)->get($route)->assertStatus(403);
        $this->actingAs($this->judge)->get($route)->assertStatus(403);
        $this->actingAs($this->admin)->get($route)->assertStatus(200);
    }

    public function test_access_token_update_path_check_accessed(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeUpdate, $accessToken);

        $this->put($route)->assertStatus(302);
        $this->actingAs($this->gamer)->put($route)->assertStatus(403);
        $this->actingAs($this->judge)->put($route)->assertStatus(403);
        $this->actingAs($this->admin)->put($route)->assertStatus(302);
    }

    public function test_access_token_destroy_path_check_accessed(): void
    {
        $accessToken = AccessToken::factory(1)->create()->first();
        $route = route($this->routeDestroy, $accessToken);

        $this->delete($route)->assertStatus(302);
        $this->actingAs($this->gamer)->delete($route)->assertStatus(403);
        $this->actingAs($this->judge)->delete($route)->assertStatus(403);
        $this->actingAs($this->admin)->delete($route)->assertStatus(302);
    }
}
