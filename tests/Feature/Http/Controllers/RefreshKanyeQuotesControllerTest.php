<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class RefreshKanyeQuotesControllerTest extends TestCase
{
    public function test_the_application_returns_correct_quotes(): void
    {
        $initialResponse = $this->get(route('kanye.quotes'), ['Authorization' => 'Bearer ' . env('API_TOKEN')])
            ->json();

        // Call refresh and check is different quotes
        $refreshResponse = $this->get(route('kanye.refresh'), ['Authorization' => 'Bearer ' . env('API_TOKEN')])
            ->json();

        $this->assertIsArray($refreshResponse);
        $this->assertCount(5, $refreshResponse);

        $this->assertNotEquals($initialResponse, $refreshResponse);
    }
}
