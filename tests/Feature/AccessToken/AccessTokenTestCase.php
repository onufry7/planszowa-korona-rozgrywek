<?php

namespace Tests\Feature\AccessToken;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\AuthenticatedTestCase;

class AccessTokenTestCase extends AuthenticatedTestCase
{
    use RefreshDatabase;

    protected string $routeIndex = 'admin.access-token.index';

    protected string $routeCreate = 'admin.access-token.create';

    protected string $routeStore = 'admin.access-token.store';

    protected string $routeShow = 'admin.access-token.show';

    protected string $routeEdit = 'admin.access-token.edit';

    protected string $routeUpdate = 'admin.access-token.update';

    protected string $routeDestroy = 'admin.access-token.destroy';


    public function setUp(): Void
    {
        parent::setUp();

        if (!env('REGISTER_TOKEN', false)) {
            $this->markTestSkipped('Register token system not enabled.');
        }
    }
}
