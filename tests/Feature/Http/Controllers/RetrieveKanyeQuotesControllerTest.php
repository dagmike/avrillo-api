<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class RetrieveKanyeQuotesControllerTest extends TestCase
{
    private function callEndpoint()
    {
        return $this->get(route('kanye.quotes'), ['Authorization' => 'Bearer ' . env('API_TOKEN')])
            ->json();
    }

    public function test_the_application_returns_correct_quotes(): void
    {
        $response = $this->callEndpoint();

        $this->assertIsArray($response);
        $this->assertCount(5, $response);

        // Call again to see if the response is the same
        $secondResponse = $this->callEndpoint();

        $this->assertEquals($response, $secondResponse);
    }
}
