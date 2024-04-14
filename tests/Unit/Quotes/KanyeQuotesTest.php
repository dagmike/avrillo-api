<?php

namespace Tests\Unit\Quotes;

use App\Quotes\KanyeQuotes;
use Tests\TestCase;

class KanyeQuotesTest extends TestCase
{
    public function test_api_call_retrieves_array_of_five_quotes()
    {
        $kanye = new KanyeQuotes();

        $quotes = $kanye->get();

        $this->assertIsArray($quotes);
        $this->assertCount(5, $quotes);
    }
}