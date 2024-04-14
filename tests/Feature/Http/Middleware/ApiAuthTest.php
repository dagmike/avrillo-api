<?php

namespace Tests\Feature\Http\Middleware;

use Tests\TestCase;

class ApiAuthTest extends TestCase
{
    private const AUTH_ROUTES = [
        'kanye.quotes',
        'kanye.refresh'
    ];

    public function test_the_application_returns_unauthorized_with_invalid_key(): void
    {
        foreach (self::AUTH_ROUTES as $route) {
            $response = $this->get(route($route), ['Authorization' => 'Bearer invalid']);
            $response->assertStatus(401);
        }
    }

    public function test_the_application_returns_okay_response_with_valid_key(): void
    {
        foreach (self::AUTH_ROUTES as $route) {
            $response = $this->get(route($route), ['Authorization' => 'Bearer ' . env('API_TOKEN')]);
            $response->assertStatus(200);
        }
    }
}
